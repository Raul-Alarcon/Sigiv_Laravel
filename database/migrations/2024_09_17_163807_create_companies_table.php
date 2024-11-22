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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('nrc', 14)->unique();
            $table->string('description');
            $table->string('email', 100)->unique();
            $table->string('logo', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->date('fundation_date');
            $table->boolean('status')->default(false); 
            $table->foreignId('sector_id')->constrained('sectors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
