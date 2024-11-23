<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'District';

    protected $fillable = [
        'name',
        'code',
        'municipality_id',
    ];

    public $timestamps = true;
}
