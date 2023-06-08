<?php
namespace Theme;

use App\Models\User;
use Auth;
use Carbon\Carbon;
use DB;
use Nilambar\NepaliDate\NepaliDate;
use Pages\Models\LoanDeposit;
use Pages\Models\Rate;
use Pages\Models\Board;
use Pages\Models\Leave;
use User\Models\Branch;
use Pages\Models\Notice;
use Pages\Models\Vendor;
use Pages\Models\Document;
use Pages\Models\Committee;
use User\Models\Department;
use Pages\Models\Outstation;
use Admin\Models\DocumentType;
use Admin\Models\InterestHead;
use Admin\Models\CommitteeLevel;
use Admin\Models\SubDocumentType;
use Admin\Models\StandardTerrifHead;

class Get
{
    public static function getTotalUsers()
    {
        $totalUsers = User::all()->count();
        return $totalUsers;
    }
    public static function getTotalAdmins()
    {
        $totalAdmins = User::whereHas('roles', function ($query) {
            $query->where('title', 'admin');
        })->count();
        return $totalAdmins;
    }
    public static function getTotalLeaves()
    {

        $currentDateTime = Carbon::now()->startOfDay();
        if (Auth::user()->isAdmin) {
            $totalLeaves = Leave::distinct("user_id")->whereDate('leave_from', '<=', $currentDateTime)
                ->whereDate('leave_to', '>=', $currentDateTime)
                ->count();
        } else {
            $branch = Auth::user()->employeeDetails->branch->id;
            $totalLeaves = Leave::distinct("user_id")->where('leave_from', '<=', $currentDateTime)
                ->where('leave_to', '>=', $currentDateTime)->whereHas('user.employeeDetails.branch', function ($query) use ($branch) {
                    $query->where('id', $branch);
                })->count();
        }
        return $totalLeaves;
    }
    public static function getTotalOutstation()
    {
        $currentDateTime = Carbon::now();
        if (Auth::user()->isAdmin) {
            $totalOutstation = Outstation::distinct("user_id")->where('outtime', '<=', $currentDateTime)
                ->where('estimated_return_time', '>=', $currentDateTime)->count();
        } else {
            $branch = Auth::user()->employeeDetails->branch->id;
            $totalOutstation = Outstation::distinct("user_id")->where('outtime', '<=', $currentDateTime)
                ->where('estimated_return_time', '>=', $currentDateTime)->whereHas('user.employeeDetails.branch', function ($query) use ($branch) {
                    $query->where('id', $branch);
                })->count();
        }
        return $totalOutstation;
    }
    public static function getTotalLeaveTaken()
    {
        $totalLeaveTaken = Leave::distinct("user_id")->where('user_id', Auth::user()->id)->count();
        return $totalLeaveTaken;
    }
    public static function getTotalOutstationTaken()
    {
        $totalOutstationTaken = Outstation::distinct("user_id")->where('user_id', Auth::user()->id)->count();
        return $totalOutstationTaken;
    }
    public static function rates()
    {
        return Rate::orderBy('year', 'desc')->orderBY('month', 'desc')->get();
    }
    public static function ratesFilter($filterBY)
    {
        $current_date = toNepaliDate(now()->format('Y-m-d'));
        $date = Carbon::parse($current_date);
        $year = $date->year;
        $month = $date->month;
        $day = $date->day;
        if ($filterBY == "month") {
            $rates = Rate::where('year', $year)->where('month', $month)->get();
        } else if ($filterBY == "year") {
            $rates = Rate::where('year', $year)->get();
        } else {
            $rates = Rate::orderBy('year', 'desc')->orderBy('month')->get();
        }
        return $rates;
    }
    public static function circularsType($paginate = 5)
    {
        $circular_types = SubDocumentType::whereHas('document_type', function ($query) {
            $query->where('title', 'circulars');
        })->paginate($paginate, ["*"]);
        return $circular_types;
    }
    public static function circulars($paginate = 5)
    {
        $documents = Document::whereHas('sub_document_type.document_type', function ($query) {
            $query->where('title', 'circulars');
        })->paginate($paginate, ["*"]);
        return $documents;
    }
    public static function notices($paginate = 5)
    {
        return Notice::whereDate('on_date', '>=', carbon::now())->orderBy('created_at', 'desc')->paginate($paginate, ["*"]);
    }
    public static function leaves()
    {
        return Leave::distinct("user_id")->whereDate('leave_from', '<=', carbon::now())->whereDate('leave_to', '>=', carbon::now())->orderBY('created_at', 'desc')->get();
    }
    public static function outstations()
    {
        $currentDateTime = Carbon::now();
        $totalOutstation = Outstation::distinct("user_id")->whereDate('outtime', '<=', $currentDateTime)
            ->whereDate('estimated_return_time', '>=', $currentDateTime)->get();
        return $totalOutstation;
    }
    public static function branches()
    {
        return Branch::all();
    }
    public static function teams()
    {
        return User::all();
    }

    public static function teamsFilter($province, $branchId)
    {
        // Post::doesntHave('comments')->get();
        $users = User::doesntHave("boards");
        if ($province != null) {
            $users->whereHas('employeeDetails', function ($query) use ($province) {
                $query->where('status', '1')
                    ->whereHas('branch', function ($query) use ($province) {
                        $query->where('province', $province);
                    });
            });
        }
        if ($branchId > 0) {
            $users->whereHas('employeeDetails', function ($query) use ($branchId) {
                $query->where('branch_id', $branchId);
            });
        }

        return $users->get();
    }
    public static function branchFilter($province = null)
    {
        $branches = Branch::query();
        if ($province > 0) {
            $branches->where('province', $province);
        }
        return $branches->get();
    }
    public static function getBoardChairman()
    {
        $chairMan = Board::whereHas('user.employeeDetails', function ($query) {
            $query->whereHas('position', function ($query) {
                $query->where('title', 'Chairman');
            })->orderBy('updated_at', 'desc');
        })->first();
        return $chairMan;
    }
    public static function getBoards()
    {
        $boards = Board::whereHas('user.employeeDetails', function ($query) {
            $query->where('status', '1')->whereHas('position', function ($query) {
                $query->where('title', '<>', 'Chairman');
            })->orderBy('order');
        })->get();
        return $boards;
    }
    public static function document_types()
    {
        $document_types = DocumentType::where('title', '<>', 'circulars')->get();
        return $document_types;
    }
    public static function latest_soc()
    {
        $standard_terrif_head = StandardTerrifHead::join('fiscal_years', 'standard_terrif_heads.fiscal_year_id', '=', 'fiscal_years.id')
            ->orderBy('fiscal_years.start_date', 'desc')
            ->orderBy('standard_terrif_heads.month', 'desc')
            ->select('standard_terrif_heads.*')
            ->first();

        return $standard_terrif_head;
    }
    public static function soc()
    {
        $standard_terrif_head = StandardTerrifHead::join('fiscal_years', 'standard_terrif_heads.fiscal_year_id', '=', 'fiscal_years.id')
            ->orderBy('fiscal_years.start_date', 'desc')
            ->orderBy('standard_terrif_heads.month', 'desc')
            ->select('standard_terrif_heads.*')
            ->get();
        $standard_terrif_head->splice(0, 1);
        return $standard_terrif_head;
    }

    public static function latest_interest()
    {
        $interest_head = InterestHead::join('fiscal_years', 'interest_heads.fiscal_year_id', '=', 'fiscal_years.id')
            ->orderBy('fiscal_years.start_date', 'desc')
            ->orderBy('interest_heads.month', 'desc')
            ->select('interest_heads.*')
            ->first();

        // dd($interest_head);
        return $interest_head;
    }
    public static function interest()
    {
        $interest_head = InterestHead::join('fiscal_years', 'interest_heads.fiscal_year_id', '=', 'fiscal_years.id')
            ->orderBy('fiscal_years.start_date', 'desc')
            ->orderBy('interest_heads.month', 'desc')
            ->select('interest_heads.*')
            ->get();
        $interest_head->splice(0, 1);
        return $interest_head;
    }
    public static function vendors()
    {
        return Vendor::orderBy('created_at', 'desc')->get();
    }
    public static function committee_levels()
    {
        $committee_levels = CommitteeLevel::all();
        return $committee_levels;
    }
    public static function committee_departments($sub_committee_levels_id)
    {
        // $committee_levels_ids = CommitteeLevel::get("id")->pluck("id");
        $departments = Department::whereHas("employee_details.user.committees.subcommitteelevel", function ($query) use ($sub_committee_levels_id) {
            $query->where("id", $sub_committee_levels_id);
        })->get();
        return $departments;
    }
    public static function committeeFilter($sub_committee_level_id, $department = null)
    {
        $committees = Committee::query();
        $committees->whereHas('subcommitteelevel', function ($query) use ($sub_committee_level_id) {
            $query->where('id', $sub_committee_level_id);
        });
        if ($department != null) {
            $committees->whereHas('user.employeeDetails', function ($query) use ($department) {
                $query->where('status', '1')
                    ->whereHas('department', function ($query) use ($department) {
                        $query->where('id', $department);
                    });
            });
        }
        return $committees->get();
    }
    public static function latest_rate()
    {
        $rate = Rate::orderBy('year', 'desc')->orderBY('month', 'desc')->first();
        return $rate;
    }

    public static function cash_in_cash_out()
    {
        $branches = Branch::get()->chunk(5);
        $data = [];
        foreach ($branches as $k => $branch) {
            $data[$k] = [
                "branch_name" => [],
                "loan_issued" => [],
                "deposit" => [],
            ];
            foreach ($branch as $val) {
                $fd = $val->loanDeposite()->orderBY("created_date", "DESC")->first();
                $data[$k]["branch_name"][] = $val->title;
                $data[$k]['loan_issued'][] = $fd?->loan_issued ?? 0;
                $data[$k]['deposit'][] = $fd?->deposit ?? 0;
            }

        }
        return collect($data);

    }
    public static function loanDepositFilter()
    {
        $date = now();
        $dc = new NepaliDate();
        $nd = $dc->convertAdToBs($date->year, $date->month, $date->day);

        $data = [];
        foreach (config("nepali-months") as $m) {
            $data["time"][] = $m["name"];
            $y = $nd["year"];
            $dt = $dc->convertBsToAd($y, $m["value"], 1);
            $start = ($dt["year"] . "-" . $dt["month"] . "-" . $dt["day"]);

            if ($m["value"] == 12) {
                $dt = $dc->convertBsToAd(1 + $y, 1, 1);
                $nextStart = ($dt["year"] . "-" . $dt["month"] . "-" . $dt["day"]);

            } else {
                $dt = $dc->convertBsToAd($y, 1 + $m["value"], 1);
                $nextStart = ($dt["year"] . "-" . $dt["month"] . "-" . $dt["day"]);
            }

            $d = LoanDeposit::whereHas('branch', function ($query) {
                $query->where('id', Auth::user()->employeeDetails->branch->id);
            })->where("created_date", ">=", $start)
                ->where("created_date", "<", $nextStart)
                ->get();
            $data["loan_issued"][] = $d->reduce(function ($carry, $item) {
                return $carry + $item->loan_issued;
            }, 0);

            $data["deposit"][] = $d->reduce(function ($carry, $item) {
                return $carry + $item->deposit;
            }, 0);
            // dump($nextStart);
        }
        return $data;
    }
    public static function get_branches()
    {
        return Branch::all();
    }
}
