<?php

namespace Admin\Models;

use Pages\Models\Charge;
use App\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChargeType extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'charge_types';
    protected $fillable = [
        'title'
    ];
    public function Charge(){
        return $this->belongsToMany(Charge::class,'charges_charge_type','charge_id','charge_type_id');
    }

}
