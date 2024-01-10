<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'liga_id',
    ];

    protected $guarded = [];

    public function liga()
    {
        return $this->belongsTo(Liga::class,'liga_id','id');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class,'product_id','id');
    }
}
