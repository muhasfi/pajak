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
        // Schema::create('layanan_pt_detail', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('layanan_pt_id')->constrained()->onDelete('cascade');
        //     $table->text('deskripsi');
        //     $table->json('benefit'); // Menyimpan data dalam format JSON array
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_pt_detail');
    }
};
