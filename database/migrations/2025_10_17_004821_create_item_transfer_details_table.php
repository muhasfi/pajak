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
        Schema::create('item_transfer_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_transfer_id')->constrained('item_transfers')->onDelete('cascade');
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
        Schema::dropIfExists('item_transfer_details');
    }
};
