<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->id(); 
            $table->string('invoice_number', 50);
            $table->date('purchase_date');
            $table->decimal('total', 10, 2);
            
            $table->foreignId('user_id')->references('id')->on('users')->constrained();
            $table->foreignId('purchase_status_id')->references('id')->on('purchasestatuses')->constrained(); 
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase');
    }
};
