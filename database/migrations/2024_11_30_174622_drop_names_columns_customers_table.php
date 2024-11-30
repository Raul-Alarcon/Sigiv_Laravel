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
        Schema::table('customers', function (Blueprint $table) {

            $table->dropColumn(['first_name', 'second_name', 'third_name', 'first_surname', 'second_surname', 'third_surname']); 
            
            $table->string('first_names')->after('email');
            $table->string('last_names')->after('first_names'); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('first_name', 20)->after('email');
            $table->string('second_name', 20)->after('first_name');
            $table->string('third_name', 20)->nullable()->after('second_name');
            $table->string('first_surname', 20)->after('third_name');
            $table->string('second_surname', 20)->after('first_surname');
            $table->string('third_surname', 20)->nullable()->after('second_surname');

            $table->dropColumn(['first_names', 'last_names']);
        });
    }
};
