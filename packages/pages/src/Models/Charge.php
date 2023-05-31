<?php

namespace Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Admin\Models\ChargeType;
use App\RelationshipsTrait;
class Charge extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'charges';
    protected $fillable = [
        'title',
        'rate'
    ];
    public function chargetype()
    {
        return $this->belongsToMany(ChargeType::class,'charges_chargeType','charge_id','chargeType_id');
    }
}
