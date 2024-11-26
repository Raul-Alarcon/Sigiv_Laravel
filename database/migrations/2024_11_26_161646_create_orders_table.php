<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 20);
            $table->date('order_date');
            $table->string('status', 20)->default('pendiente');
            $table->decimal('total', 10, 2);
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('order_status_id')->constrained('order_statuses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
