<?php

namespace Admin\Models;

use Pages\Models\Document;
use App\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDocumentType extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'sub_document_types';
    protected $fillable = [
        'title',
        'document_type_id'
    ];
    public function getPathAttribute()
    {
        return url('circular/'.$this->id);
    }
    public function getDocumentPathAttribute()
    {
        return url('documents/' . $this->id);
    }
    public function documents(){
        return $this->hasMany(Document::class,'sub_document_type_id');
    }
    public function document_type(){
        return $this->belongsTo(DocumentType::class);
    }
}
