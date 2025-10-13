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
        Schema::table('brevet_c', function (Blueprint $table) {
            //
            $table->time('waktu_pelaksanaan')->after('tanggal_mulai')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brevet_c', function (Blueprint $table) {
            //
            $table->dropColumn('waktu_pelaksanaan');
        });
    }
};
