<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOutRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_request',
        'date_out',
        'description',
        'product_id',
        'employee_id',
        'employee_auth_id',
        'status_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function employeeAuth(){
        return $this->belongsTo(Employee::class);
    }

    public function status(){
        return $this->belongsTo(ApplicationStatus::class);
    }
}
