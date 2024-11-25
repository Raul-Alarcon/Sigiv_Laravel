<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'current_stock',
        'minimum_stock',
        'store_branches_id',
        'products_id',
    ];

    public $timestamps = true;
}
