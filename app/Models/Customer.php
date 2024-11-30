<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_names', 
        'last_names', 
        'dui',
        'birth_date',
        'gender_id',
        'phone',
        'email',
        'direcction'
    ];

    public $timestamps = true;

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
