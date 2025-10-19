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
        Schema::create('item_pajak_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pajak_id')
                  ->constrained('item_pajaks')
                  ->onDelete('cascade');
            $table->text('deskripsi');
            $table->json('benefit'); // karena 'benefit' berupa array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_pajak_details');
    }
};
