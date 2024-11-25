<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100);
            $table->string('DUI', 10);
            $table->string('names', 30);
            $table->string('last_names', 30);
            $table->date('age');
            $table->date('hiring_date');
            $table->date('termination_date')->nullable();
            $table->foreignId('storebranch_id')->constrained('store_branches');
            $table->foreignId('charge_id')->constrained('charges');
            $table->foreignId('gender_id')->constrained('genders');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
