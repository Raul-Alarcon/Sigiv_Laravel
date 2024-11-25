<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'second_name',
        'third_name',
        'first_surname',
        'second_surname',
        'third_surname',
        'dui',
        'birth',
        'gender_id',
    ];

    public $timestamps = true;
}
