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
        Schema::create('item_paper_details', function (Blueprint $table) {
            $table->id();
            $table->string('file_path')->nullable();
            $table->timestamps();

             $table->foreignId('paper_id')->constrained('item_papers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_paper_details');
    }
};
