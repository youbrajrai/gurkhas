<?php

namespace Pages\Models;

use User\Models\Branch;
use App\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanDeposit extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'loan_deposits';
    protected $fillable = [
        'branch_id',
        'loan_issued',
        'deposit',
        'created_date'
    ];
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
