<?php

namespace Pages\Models;


use App\RelationshipsTrait;
use Admin\Models\InterestHead;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FixedInterest extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'fixed_interests';
    protected $fillable = [
        'interest_head_id',
        'particulars',
        'upto5years',
        'fivetotenyears',
        'above10years',
    ];
    public function interest_head()
    {
        return $this->belongsTo(InterestHead::class);
    }
}
