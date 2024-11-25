<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'name',
        'NIT',
        'description',
        'opening_date',
    ];

    public $timestamps = true;
}
