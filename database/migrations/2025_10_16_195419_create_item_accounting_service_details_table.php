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
        Schema::create('item_accounting_service_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accounting_service_id');
            $table->text('deskripsi');
            $table->json('benefit'); // array benefit disimpan sebagai JSON
            $table->timestamps();

            // Foreign key
            $table->foreign('accounting_service_id')
                  ->references('id')->on('item_accounting_services')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_accounting_service_details');
    }
};
