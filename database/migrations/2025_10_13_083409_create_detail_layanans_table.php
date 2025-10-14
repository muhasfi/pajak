<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('detail_layanans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('layanan_pembuatan_pt_id')->constrained()->onDelete('cascade');
        $table->string('nama_langkah');
        $table->text('keterangan')->nullable();
        $table->integer('estimasi_hari');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_layanans');
    }
};
