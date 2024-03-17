<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        "code",
        "amount",
        "expiration_date",
        "use_quantity",
        "is_active",
    ];
}
