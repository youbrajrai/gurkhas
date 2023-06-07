<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UniqueUserIdWithinDate implements ValidationRule
{
    private $leave_from;
    private $leave_to;
    private $id;

    public function __construct($leave_from, $leave_to, $id = null)
    {
        $this->leave_from = $leave_from;
        $this->leave_to = $leave_to;
        $this->id = $id;
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = DB::table('leaves')
            ->where('user_id', $value)
            ->where(function ($query) {
                $query->whereBetween('leave_from', [$this->leave_from, $this->leave_to])
                    ->orWhereBetween('leave_to', [$this->leave_from, $this->leave_to]);
            });
        if ($this->id > 0) {
            $query->where("id", "<>", $this->id);
        }
        $conflictingRecords = $query->exists();

        if ($conflictingRecords) {
            $fail('The User is not unique within the specified Date.');
        }
    }
}
