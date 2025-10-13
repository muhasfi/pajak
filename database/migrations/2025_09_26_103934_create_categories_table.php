<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori');
            $table->timestamps();
        });
    
        // isi kategori default
        DB::table('categories')->insert([
            ['nama_kategori' => 'Pembuatan PT, NIB & NPWP'],
            ['nama_kategori' => 'Jasa Akuntansi & Pembukuan'],
            ['nama_kategori' => 'Jasa Perpajakan'],
            ['nama_kategori' => 'Litigasi & Sengketa Perpajakan'],
            ['nama_kategori' => 'Audit Laporan Keuangan'],
            ['nama_kategori' => 'Transfer Pricing Doc'],
        ]);
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
