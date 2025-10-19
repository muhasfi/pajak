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
        Schema::create('item_webinar_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_webinar_id')
                  ->constrained('item_webinars')
                  ->onDelete('cascade');
            $table->string('pembicara');
            $table->string('topik');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('materi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_webinar_details');
    }
};
