<?php

namespace User\Models;

use App\Models\User;
use App\Models\Media;
use App\RelationshipsTrait;
use Pages\Models\Insurance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Pages\Models\LoanDeposit;

class Branch extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = "branches";
    protected $fillable = [
        'branch_code',
        'title',
        'province',
        'district',
        'local_body',
        'ward_no',
        'link',
        'contact_no',
        'fax_no',
        'email'
    ];
    public function employee_details(){
        return $this->hasMany(Employee::class);
    }
    public function insurances(){
        return $this->hasMany(Insurance::class);
    }
    // public function media()
    // {
    //     return $this->morphOne(Media::class, 'mediable');
    // }
    public function getBranchManagerAttribute(){
        return $this->employee_details()->whereHas('position',function($query){
            $query->where('title','Branch Manager');
        })->orderBy('updated_at','desc')->first();
    }

    public function loanDeposite(){
        return $this->hasMany(LoanDeposit::class);
    }
}
