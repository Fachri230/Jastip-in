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
      Schema::create('stores', function (Blueprint $table) {
    $table->id('id_store');
    $table->unsignedBigInteger('user_id')->unique();
    $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
    $table->string('store_name')->unique();
    $table->string('slug')->unique();
    $table->text('description')->nullable();
    $table->text('address');
    $table->string('phone', 15);
    $table->string('logo')->nullable();
    $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
    $table->text('rejection_reason')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
