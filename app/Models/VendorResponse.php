<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorResponse extends Model
{
    protected $fillable = [
        'request_item_id',
        'vendor_id',
        'quoted_price',
        'contact_details',
        'notes',
        'status'
    ];

    public function requestItem()
    {
        return $this->belongsTo(RequestItem::class);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function clientRequest()
    {
        return $this->hasOneThrough(
            ClientRequest::class,
            RequestItem::class,
            'id',
            'id',
            'request_item_id',
            'client_request_id'
        );
    }
}
