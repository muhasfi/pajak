<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // public function up()
    // {
    //     Schema::create('litigasi_detail', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('litigasi_id')->constrained()->onDelete('cascade');
    //         $table->text('deskripsi');
    //         $table->json('benefit'); // Menyimpan benefit dalam format JSON array
    //         $table->timestamps();
    //     });
    // }

    // public function down()
    // {
    //     Schema::dropIfExists('litigasi_detail');
    // }
};