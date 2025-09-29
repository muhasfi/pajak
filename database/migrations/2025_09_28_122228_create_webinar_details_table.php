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
    Schema::create('webinar_details', function (Blueprint $table) {
        $table->id();
        $table->foreignId('webinar_id')->constrained()->onDelete('cascade');
        $table->string('pembicara');
        $table->string('topik');
        $table->time('waktu_mulai');
        $table->time('waktu_selesai');
        $table->text('materi')->nullable(); // Poin-poin materi yang dibahas
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinar_details');
    }
};
