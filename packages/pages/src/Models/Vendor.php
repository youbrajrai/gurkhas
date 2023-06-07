<?php

namespace Pages\Models;

use App\Models\Media;
use App\RelationshipsTrait;
use Admin\Models\VendorType;
use Admin\Models\VendorCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Model
{
    use HasFactory,RelationshipsTrait;
    protected $table = 'vendors';
    protected $fillable = [
        'name',
        'vendor_category_id',
        'vendor_type_id',
        'address',
        'contact_person',
        'contact_details',
        'contract_start_date',
        'contract_expiry_date'
    ];
    public function vendor_category()
    {
        return $this->belongsTo(VendorCategory::class);
    }

    public function vendor_type()
    {
        return $this->belongsTo(VendorType::class);
    }
    public function media()
    {
        return $this->morphOne(Media::class, 'mediable');
    }
}
