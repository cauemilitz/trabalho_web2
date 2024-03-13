<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "description",
        "amount",
        "quantity",
        "is_active",
        "sku",
        "category_id",
    ];
}
