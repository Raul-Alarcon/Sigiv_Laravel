<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOutRequest extends Model
{
    use HasFactory;

    protected $table = 'product_out_request';

    protected $fillable = [
        'date_request',
        'date_out',
        'description',
        'count_product',
        'product_id',
        'user_id',
        'user_auth_id',
        'status_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function userAuth(){
        return $this->belongsTo(User::class);
    }

    public function status(){
        return $this->belongsTo(ApplicationStatus::class);
    }
}
