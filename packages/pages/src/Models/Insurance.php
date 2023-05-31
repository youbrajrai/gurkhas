<?php

namespace Pages\Models;

use App\Models\Media;
use User\Models\Branch;
use App\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Insurance extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'insurances';
    protected $fillable = [
        'name',
        'branch_id',
        'insurance_amount',
        'insurance_company',
        'insurance_start_date',
        'insurance_expiry_date'

    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}
