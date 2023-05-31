<?php

namespace Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;
use App\RelationshipsTrait;
class Policy extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'policy';
    protected $fillable = [
        'title',
        'description',
    ];
    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}
