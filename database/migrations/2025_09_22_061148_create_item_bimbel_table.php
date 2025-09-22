<?php

// database/migrations/xxxx_xx_xx_create_item_bimbel_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('item_bimbel', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('materi')->nullable(); // pdf
            $table->string('video')->nullable();  // link atau file
            $table->decimal('harga', 12, 2);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('item_bimbel');
    }
};

