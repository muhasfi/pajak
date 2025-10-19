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
        Schema::create('item_brevetc_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brevet_c_id')->constrained('item_brevetc')->onDelete('cascade');
            $table->string('fasilitas');
            $table->text('keterangan')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_brevetc_detail');
    }
};
