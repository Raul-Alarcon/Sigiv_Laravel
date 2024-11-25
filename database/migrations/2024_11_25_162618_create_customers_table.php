<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 20);
            $table->string('second_name', 20);
            $table->string('third_name', 20)->nullable();
            $table->string('first_surname', 20);
            $table->string('second_surname', 20);
            $table->string('third_surname', 20)->nullable();
            $table->string('dui', 11);
            $table->date('birth_date');
            $table->foreignId('gender_id')->constrained('genders');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
