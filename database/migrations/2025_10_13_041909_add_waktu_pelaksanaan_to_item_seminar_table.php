<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_waktu_pelaksanaan_to_item_seminar_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('item_seminar', function (Blueprint $table) {
            $table->time('waktu_pelaksanaan')->after('tanggal')->nullable();
        });
    }

    public function down()
    {
        Schema::table('item_seminar', function (Blueprint $table) {
            $table->dropColumn('waktu_pelaksanaan');
        });
    }
};