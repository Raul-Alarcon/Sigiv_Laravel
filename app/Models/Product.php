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

    public function stock()
    {
        return $this->hasOne(ProductStock::class, 'products_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function productStatus()
    {
        return $this->belongsTo(Productstatus::class, 'productstatus_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            // Eliminar el registro de stock asociado
            $product->stock()->delete();
        });
    }
}
