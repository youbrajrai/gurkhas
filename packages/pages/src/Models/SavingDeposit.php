<?php

namespace Pages\Models;

use App\RelationshipsTrait;
use Admin\Models\InterestHead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SavingDeposit extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'saving_deposits';
    protected $fillable = [
        'interest_head_id',
        'particulars',
        'min_balance',
        'interest_rate',
    ];
    public function interest_head()
    {
        return $this->belongsTo(InterestHead::class);
    }
}
