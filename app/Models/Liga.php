<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country',
        'image',
        'region_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'liga_id','id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class,'region_id','id');
    }
}
