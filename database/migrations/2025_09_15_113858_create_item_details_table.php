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
        Schema::create('item_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')
                ->constrained('items')
                ->onDelete('cascade');

            // Field opsional sesuai kebutuhan jenis produk
            $table->string('file_path')->nullable();    // untuk ebook / artikel (pdf/doc)
            $table->string('video_url')->nullable();    // untuk course (video streaming)
            $table->string('zoom_link')->nullable();    // untuk seminar
            $table->timestamp('event_date')->nullable(); // tanggal & jam seminar
            
            $table->integer('duration_days')->nullable(); // masa berlaku akses (misal 30 hari)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_details');
    }
};
