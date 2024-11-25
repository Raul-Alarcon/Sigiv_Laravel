<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'unit_price',
        'category_id',
        'barcode',
        'productstatus_id',
        'supplier_id',
    ];

    public $timnestamps = true;
}
