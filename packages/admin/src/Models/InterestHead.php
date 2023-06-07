<?php

namespace Admin\Models;

use Pages\Models\Loan;
use App\RelationshipsTrait;
use Admin\Models\FiscalYear;
use Pages\Models\FixedDeposit;
use Pages\Models\DepriveSector;
use Pages\Models\FixedInterest;
use Pages\Models\SavingDeposit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InterestHead extends Model
{
    use HasFactory, RelationshipsTrait;
    protected $table = 'interest_heads';
    protected $fillable = [
        'title',
        'month',
        'fiscal_year_id'
    ];
    public function fixed_deposit()
    {
        return $this->hasOne(FixedDeposit::class);
    }
    public function saving_deposit()
    {
        return $this->hasOne(SavingDeposit::class);
    }
    public function loan()
    {
        return $this->hasOne(Loan::class);
    }
    public function deprive_sector()
    {
        return $this->hasOne(DepriveSector::class);
    }
    public function fixed_interest()
    {
        return $this->hasOne(FixedInterest::class);
    }
    public function fiscal_year()
    {
        return $this->belongsTo(FiscalYear::class);
    }
}
