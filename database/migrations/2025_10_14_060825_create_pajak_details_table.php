<?php
// database/migrations/2024_03_17_005739_create_pajak_details_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pajak_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pajak_id')->constrained()->onDelete('cascade');
            $table->text('deskripsi');
            $table->json('benefit'); // Menyimpan data dalam format JSON
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pajak_details');
    }
};