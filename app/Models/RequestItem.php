<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    protected $fillable = ['client_request_id', 'vendor_category_id', 'price_range_id'];

    public function clientRequest()
    {
        return $this->belongsTo(ClientRequest::class);
    }

    public function vendorCategory()
    {
        return $this->belongsTo(VendorCategory::class);
    }

    public function priceRange()
    {
        return $this->belongsTo(PriceRange::class);
    }

    public function vendorResponses()
    {
        return $this->hasMany(VendorResponse::class);
    }
}
