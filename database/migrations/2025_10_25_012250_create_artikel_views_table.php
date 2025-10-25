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
        Schema::create('artikel_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artikel_id')
                  ->constrained('artikels')
                  ->onDelete('cascade');
            $table->string('ip_address', 45);
            $table->timestamps();

            // Pastikan satu IP hanya dihitung sekali per artikel
            $table->unique(['artikel_id', 'ip_address'], 'artikel_ip_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel_views');
    }
};
