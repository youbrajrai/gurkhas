<?php

namespace Admin\Models;


use App\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FiscalYear extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'fiscal_years';
    protected $fillable = [
        'title',
        'start_date',
        'end_date'
    ];
}
