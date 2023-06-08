<?php

namespace App\Imports;

use Carbon\Carbon;
use Pages\Models\LoanDeposit;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class LoanDepositImport implements ToModel, WithValidation
{
    use Importable;
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
    public function rules(): array
    {
        return [
            '0' => [
                'required',
                'integer',
            ],

            '1' => [
                'required',
                'numeric',
            ],

            '2' => [
                'required',
                'numeric',
            ],

            '3' => [
                'required',
            ],
        ];
    }
}
