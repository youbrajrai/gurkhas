<?php

namespace Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\RelationshipsTrait;
class Leave extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'leaves';
    protected $fillable = [
        'user_id',
        'leave_from',
        'leave_to',
        'leave_type'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
