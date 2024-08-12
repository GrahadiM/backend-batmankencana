<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokProduct extends Model
{
    use HasFactory;

    protected $table = "stok_products";
    protected $guarded = [];
}
