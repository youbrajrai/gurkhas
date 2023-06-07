<?php

namespace Admin\Models;

use App\RelationshipsTrait;
use Pages\Models\Committee;
use Admin\Models\CommitteeLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCommitteeLevel extends Model
{
    use HasFactory, RelationshipsTrait;
    protected $table = 'sub_committee_levels';
    protected $fillable = [
        'title',
        'committee_level_id'
    ];

    // public function committees()
    // {
    //     return $this->hasMany(Committee::class, 'sub_committee_level_id');
    // }
    public function committee_level()
    {
        return $this->belongsTo(CommitteeLevel::class);
    }
    public function getPathAttribute()
    {
        return url('single-committee/' . $this->id);
    }
}
