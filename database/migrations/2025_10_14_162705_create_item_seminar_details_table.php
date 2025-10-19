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
        Schema::create('detail_seminars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_seminar_id')->constrained('item_seminars')->onDelete('cascade');
            $table->string('pembicara');
            $table->string('lokasi');
            $table->integer('kuota_peserta');
            $table->string('kategori');
            $table->enum('level', ['Beginner', 'Intermediate', 'Advanced']);
            $table->text('fasilitas');
            $table->string('kontak_person');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_seminars');
    }
};
