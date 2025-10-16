<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('webinars', function (Blueprint $table) {
        $table->id();
        $table->string('gambar')->nullable(); // Untuk menyimpan path/nama file gambar
        $table->string('judul');
        $table->text('deskripsi');
        $table->dateTime('tanggal');
        $table->decimal('harga', 10, 2);
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('webinars');
    }
};