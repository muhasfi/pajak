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
        Schema::create('transfer_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_id')->constrained()->onDelete('cascade'); // relasi ke tabel transfer
            $table->text('deskripsi');
            $table->text('benefit'); // akan disimpan sebagai JSON atau text, diolah menjadi list di view
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_details');
    }
};
