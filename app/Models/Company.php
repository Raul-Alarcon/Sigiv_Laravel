<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nrc',
        'description',
        'email',
        'logo',
        'website',
        'fundation_date',
        'status',
        'sector_id'
    ];

    protected $casts = [
        'fundation_date' => 'date',
        'status' => 'boolean'
    ];

    // protected $with = ['sector'];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public $timestamps = true; 
}
