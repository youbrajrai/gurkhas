<?php

namespace Admin\Models;

use Pages\Models\Charge;
use App\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChargeType extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'chargeType';
    protected $fillable = [
        'title'
    ];
    public function Charge(){
        return $this->belongsToMany(Charge::class,'charges_chargeType','charge_id','chargeType_id');
    }

}
