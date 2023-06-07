<?php

namespace App\Imports;

use Carbon\Carbon;
use Pages\Models\LoanDeposit;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class LoanDepositImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new LoanDeposit([
            'branch_id' => $row[0],
            'loan_issued' => $row[1],
            'deposit' => $row[2],
            'created_date' => Date::excelToDateTimeObject($row[3])
        ]);
    }
}
