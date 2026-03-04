<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceRange extends Model
{
    protected $fillable = ['label', 'min_amount', 'max_amount'];

    public function requestItems()
    {
        return $this->hasMany(RequestItem::class);
    }

    public function vendors()
    {
        return $this->hasMany(User::class, 'price_range_id');
    }
}
