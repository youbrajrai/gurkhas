<?php

namespace Pages\Models;

use Admin\Models\NoticeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;
use App\RelationshipsTrait;
class Notice extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'notices';
    protected $fillable = [
        'notice_type_id',
        'title',
        'description',
        'on_date'
    ];
    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
    public function notice_type(){
        return $this->belongsTo(NoticeType::class);
    }
}
