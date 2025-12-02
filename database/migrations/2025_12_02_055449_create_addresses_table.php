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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->string('province');
            $table->string('region');
            $table->string('zip_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
