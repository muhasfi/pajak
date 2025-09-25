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
        Schema::create('item_bimbels', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // nama paket bimbel
            $table->text('deskripsi')->nullable(); // deskripsi umum
            $table->decimal('harga', 12, 2); // harga paket
            $table->boolean('is_active')->default(true); // status aktif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_bimbels');
    }
};
