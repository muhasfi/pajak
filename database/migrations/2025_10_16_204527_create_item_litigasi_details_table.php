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
        Schema::create('item_litigasi_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('litigasi_id')
                ->constrained('item_litigasis')
                ->onDelete('cascade');
            $table->text('deskripsi');
            $table->json('benefit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_litigasi_details');
    }
};
