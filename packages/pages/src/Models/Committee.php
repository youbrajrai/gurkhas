<?php

namespace Pages\Models;

use App\Models\User;
use App\RelationshipsTrait;
use Admin\Models\CommitteeLevel;
use Admin\Models\SubCommitteeLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Committee extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'committees';
    protected $fillable = [
        'user_id',
        'sub_committee_level_id',
        'joined_date'
    ];
    public function subcommitteelevel()
    {
        return $this->belongsTo(SubCommitteeLevel::class,'sub_committee_level_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
