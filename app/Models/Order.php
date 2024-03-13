<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "hash",
        "status",
        "total",
        "freight",
        "discount",
        "paid_at",
        "refund_at",
        "customer_id",
        "coupon_id",
    ];
}