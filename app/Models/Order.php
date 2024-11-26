<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'order_date',
        'status',
        'total',
        'customer_id',
        'order_status_id',
    ];

    public $timestamps = true;
}
