<?php

namespace User\Models;

use App\RelationshipsTrait;
use Pages\Models\Committee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $fillable = [
        'title'
    ];
    public function employee_details(){
        return $this->hasMany(Employee::class);
    }
    public function committee()
    {
        return $this->belongsToMany(Committee::class, 'committeeLevel_committee_department_position', 'committee_id', 'committeeLevel_id', 'department_id', 'position_id');
    }
}
