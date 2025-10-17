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
        Schema::create('item_audit_details', function (Blueprint $table) {
           $table->id();
            $table->foreignId('audit_id')
                ->constrained('item_audits') // sesuaikan dengan nama tabel utama
                ->onDelete('cascade');
            $table->text('deskripsi');
            $table->json('benefit'); // simpan array sebagai JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_audit_details');
    }
};
