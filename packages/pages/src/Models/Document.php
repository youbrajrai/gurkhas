<?php

namespace Pages\Models;

use Admin\Models\SubDocumentType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Admin\Models\DocumentType;
use App\Models\Media;
use App\RelationshipsTrait;

class Document extends Model
{
    use HasFactory, RelationshipsTrait;
    protected $table = 'documents';
    protected $fillable = [
        'title',
        'sub_document_type_id'
    ];
    public function sub_document_type()
    {
        return $this->belongsTo(SubDocumentType::class, 'sub_document_type_id');
    }
    public function media()
    {
        return $this->morphMany(Media::class, 'mediable');
    }
    // public function getPathAttribute()
    // {
    //     return url('documents/' . $this->id);
    // }
}
