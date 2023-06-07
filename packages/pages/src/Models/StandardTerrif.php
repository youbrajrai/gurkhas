<?php

namespace Pages\Models;


use App\RelationshipsTrait;
use Admin\Models\StandardTerrifHead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StandardTerrif extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'standard_terrifs';
    protected $fillable = [
        'standard_terrif_head_id',
        'type',
        'particulars',
        'rate',

    ];
    public function standard_terrif_head()
    {
        return $this->belongsTo(StandardTerrifHead::class);
    }
}
