<?php

namespace Admin\Models;

use App\RelationshipsTrait;
use Admin\Models\FiscalYear;
use Pages\Models\StandardTerrif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StandardTerrifHead extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'standard_terrif_heads';
    protected $fillable = [
        'title',
        'month',
        'fiscal_year_id'
    ];
    public function standard_terrif(){
        return $this->hasMany(StandardTerrif::class);
    }
    public function fiscal_year()
    {
        return $this->belongsTo(FiscalYear::class);
    }
}
