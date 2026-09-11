<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Mengubah ->after('id') menjadi ->first()
        $table->string('name')->first(); 
    });
}


    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};
