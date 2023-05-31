<?php

namespace Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\RelationshipsTrait;
class Rate extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'rates';
    protected $fillable = [
        'base_rate',
        'spread_rate',
        'cost_fund',
        'yield_rate',
        'month',
        'year'
    ];
}
