<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->decimal('harga', 15, 2); // tipe decimal untuk harga
            $table->timestamps(); // otomatis membuat created_at dan updated_at
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('audits');
    }
};
