<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('audit_id')->constrained()->onDelete('cascade'); // Foreign Key
            $table->text('deskripsi');
            $table->text('benefit'); // Kita akan menyimpan list benefit sebagai JSON atau text
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('audit_details');
    }
};
