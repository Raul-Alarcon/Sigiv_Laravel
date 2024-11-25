<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('store_branches', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 200)->nullable();
            $table->string('name', 200);
            $table->string('NIT', 20)->nullable();
            $table->text('description');
            $table->date('opening_date');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('store_branches');
    }
};
