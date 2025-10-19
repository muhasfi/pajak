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
        Schema::create('item_webinars', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->decimal('harga', 15, 2)->default(0);
            $table->string('gambar')->nullable(); // path file disimpan di folder public/webinars
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_webinars');
    }
};
