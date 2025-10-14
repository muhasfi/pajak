<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_accounting_service_details_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('accounting_service_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('accounting_service_id')->constrained()->onDelete('cascade');
            $table->text('deskripsi');
            $table->json('benefit'); // Menyimpan benefit dalam bentuk array JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accounting_service_details');
    }
};