<?php

namespace Admin\Models;

use Pages\Models\Document;
use App\RelationshipsTrait;
use Admin\Models\SubDocumentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentType extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'document_types';
    protected $fillable = [
        'title'
    ];
    // public function getPathAttribute()
    // {
    //     return url('documents/'.$this->id);
    // }
    public function sub_document_types(){
        return $this->hasMany(SubDocumentType::class,'document_type_id');
    }
    public function documents(){
        return $this->hasManyThrough(Document::class,SubDocumentType::class);
    }
}
