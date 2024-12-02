<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'contact',
        'phone',
        'email',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public $timestamps = true; 

    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
