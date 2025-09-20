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
        Schema::create('item_bimbel_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_bimbel_id')
                ->constrained('item_bimbels') // relasi ke tabel item_bimbel
                ->onDelete('cascade');       // kalau master dihapus, detail ikut terhapus

            $table->string('judul'); 
            $table->text('deskripsi')->nullable();
            $table->string('materi_pdf')->nullable();
            $table->string('video')->nullable();
            $table->integer('urutan')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_bimbel_details');
    }
};
