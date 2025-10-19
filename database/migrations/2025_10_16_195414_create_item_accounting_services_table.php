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
        Schema::create('item_accounting_services', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->decimal('harga', 15, 2); // harga dengan 2 angka di belakang koma
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_accounting_services');
    }
};
