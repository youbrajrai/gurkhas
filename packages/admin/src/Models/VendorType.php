<?php

namespace Admin\Models;

use Pages\Models\Vendor;
use App\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorType extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'vendor_types';
    protected $fillable = [
        'title'
    ];
    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }
}
