<?php

namespace Pages\Models;

use App\Models\User;
use App\RelationshipsTrait;
use Admin\Models\InterestHead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FixedDeposit extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'fixed_deposits';
    protected $fillable = [
        'interest_head_id',
        'particulars',
        'individual',
        'individual_remit',
        'institutional',
        'institutional_renew'

    ];
    public function interest_head()
    {
        return $this->belongsTo(InterestHead::class);
    }
}
