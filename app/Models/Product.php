<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $guarded = [];

    public function getNameAttribute($value)
    {
        return Str::upper($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
