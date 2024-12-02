<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_out_request', function (Blueprint $table) {
            $table->id();
            $table->date('date_request')->default(Date::now());
            $table->date('date_out')->nullable();
            $table->text('description');

            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('user_id')->references('id')->on('users'); 
            $table->foreignId('user_auth_id')->nullable()->references('id')->on('users'); 
            $table->foreignId('status_id')->nullable()->references('id')->on('application_statuses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_out_request');
    }
};