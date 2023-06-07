<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name', 'file_path','mediable_type','mediable_id'
    ];
    protected $table = 'medias';
    // public function setMediaAttribute()
    // {
    //     $this->attributes['mediable_id'] = $this->id;
    // // }
    // public function getMediaUrlAttribute()
    // {
    //     return $this->mediable ? Storage::disk('public')->url($this->media->file_path) : null;
    // }
    public function mediable()
    {
        return $this->morphTo();
    }
}
