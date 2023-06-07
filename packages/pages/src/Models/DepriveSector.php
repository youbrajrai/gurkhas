<?php

namespace Pages\Models;


use App\RelationshipsTrait;
use Admin\Models\InterestHead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DepriveSector extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'deprive_sectors';
    protected $fillable = [
        'interest_head_id',
        'particulars',
        'interest_rate',

    ];
    public function interest_head()
    {
        return $this->belongsTo(InterestHead::class);
    }
}
