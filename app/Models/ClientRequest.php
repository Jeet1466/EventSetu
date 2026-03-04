<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientRequest extends Model
{
    protected $fillable = ['user_id', 'event_date', 'status'];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requestItems()
    {
        return $this->hasMany(RequestItem::class);
    }

    public function vendorResponses()
    {
        return $this->hasManyThrough(VendorResponse::class, RequestItem::class);
    }
}
