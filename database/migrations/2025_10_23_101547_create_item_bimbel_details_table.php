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
            $table->foreignId('id_item_bimbels')
                ->constrained('item_bimbels')
                ->onDelete('cascade');
            $table->string('judul_materi', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('link')->nullable();
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
