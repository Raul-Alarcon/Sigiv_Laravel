<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'DUI',
        'names',
        'last_names',
        'age',
        'hiring_date',
        'termination_date',
        'storebranch_id',
        'charge_id',
        'gender_id'
        ];

    public $timestamps = true;

    public function storebranch()
    {
        return $this->belongsTo(StoreBranch::class);
    }

    public function charge()
    {
        return $this->belongsTo(Charge::class);
    } 

    public function gender(){
        return $this->belongsTo(Gender::class);
    }
}
