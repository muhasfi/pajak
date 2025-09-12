<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable(); // relasi ke kategori
            $table->string('name'); // judul artikel
            $table->text('description')->nullable(); // isi artikel
            $table->string('img')->nullable(); // gambar artikel
            $table->decimal('price', 12, 0)->nullable(); // harga (opsional)
            $table->timestamps();

            // Foreign key ke tabel categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

