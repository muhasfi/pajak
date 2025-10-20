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
        Schema::create('item_konsultasi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_konsultasi_id')->constrained('item_konsultasis')->onDelete('cascade');
            $table->integer('waktu_menit')->default(0);
            $table->json('benefit'); // Karena benefit dikirim sebagai array
            $table->string('file_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_kosultasi_details');
    }
};
