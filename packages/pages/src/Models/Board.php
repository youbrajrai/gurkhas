<?php

namespace Pages\Models;

use App\Models\User;
use App\RelationshipsTrait;
use Admin\Models\CommitteeLevel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Board extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'boards';
    protected $fillable = [
        'user_id',
        'joined_date'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
