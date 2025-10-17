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
       Schema::create('item_layanan_pt_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')
                  ->constrained('item_layanan_pts')
                  ->onDelete('cascade');
            $table->text('deskripsi');
            $table->text('paket');
            $table->json('benefit'); // menyimpan array benefit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_layanan_pt_details');
    }
};
