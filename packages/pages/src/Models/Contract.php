<?php

namespace Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\RelationshipsTrait;
class Contract extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'contracts';
    protected $fillable = [
        'name',
        'agreement_date',
        'expiry_date',
        'remarks'

    ];
}
