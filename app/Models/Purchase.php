<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchase';

    protected $fillable = [
        'invoice_number', 
        'purchase_date',
        'supplier_id',
        'purchase_status_id',
        'total',
        'user_id',  
    ];

    protected $casts = [
        'purchase_date' => 'datetime',
        'total' => 'decimal:2',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseStatus()
    {
        return $this->belongsTo(Purchasestatus::class);
    }

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetail::class);
    }

     
}
