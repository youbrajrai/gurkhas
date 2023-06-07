<?php

namespace Admin\Models;

use App\RelationshipsTrait;
use Admin\Models\SubCommitteeLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommitteeLevel extends Model
{
    use HasFactory, RelationshipsTrait;
    protected $table = 'committee_levels';
    protected $fillable = [
        'title'
    ];
    public function sub_committee_levels()
    {
        return $this->hasMany(SubCommitteeLevel::class);
    }
    // public function getPathAttribute(){
    //     return url('single-committee/'.$this->id);
    // }

}
