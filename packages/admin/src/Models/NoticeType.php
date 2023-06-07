<?php

namespace Admin\Models;

use Pages\Models\Notice;
use Pages\Models\Document;
use App\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NoticeType extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'notice_types';
    protected $fillable = [
        'title'
    ];
    public function getPathAttribute()
    {
        return url('circular/'.$this->id);
    }
    public function notices(){
        return $this->hasMany(Notice::class,'notice_type_id');
    }
}
