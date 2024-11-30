<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public $timestamps = true;

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'gender_id');
    }
}
