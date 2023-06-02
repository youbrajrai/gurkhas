<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueUserIdWithinTimeFrame implements ValidationRule
{
    private $outtime;
    private $estimated_return_time;
    private $id;

    public function __construct($outtime, $estimated_return_time, $id = null)
    {
        $this->outtime = $outtime;
        $this->estimated_return_time = $estimated_return_time;
        $this->id = $id;
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = DB::table('outstations')
            ->where('user_id', $value)
            ->where(function ($query) {
                $query->whereBetween('outtime', [$this->outtime, $this->estimated_return_time])
                    ->orWhereBetween('estimated_return_time', [$this->outtime, $this->estimated_return_time]);
            });
        if ($this->id > 0) {
            $query->where("id", "<>", $this->id);
        }
        $conflictingRecords = $query->exists();

        if ($conflictingRecords) {
            $fail('The User is not unique within the specified time frame.');
        }
    }
}
