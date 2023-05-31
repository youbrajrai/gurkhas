<?php

namespace Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\RelationshipsTrait;
class Outstation extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'outstations';
    protected $fillable = [
        'user_id',
        'travel_place',
        'outtime',
        'estimated_return_time',
        'actual_return_time',
        'remarks'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
