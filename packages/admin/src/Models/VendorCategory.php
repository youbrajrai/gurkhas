<?php

namespace Admin\Models;

use Pages\Models\Vendor;
use App\RelationshipsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorCategory extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'vendor_categories';
    protected $fillable = [
        'title'
    ];
    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

}
