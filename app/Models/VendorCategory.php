<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorCategory extends Model
{
    protected $fillable = ['name', 'description'];

    public function requestItems()
    {
        return $this->hasMany(RequestItem::class);
    }

    public function vendors()
    {
        return $this->hasMany(User::class, 'vendor_category_id');
    }
}
