<?php
// database/migrations/[timestamp]_add_type_to_webinars_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToWebinarsTable extends Migration
{
    public function up()
    {
        Schema::table('webinars', function (Blueprint $table) {
            $table->enum('type', ['seminar', 'workshop', 'webinar'])->default('webinar');
            $table->string('lokasi')->nullable();
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();
        });
    }

    public function down()
    {
        Schema::table('webinars', function (Blueprint $table) {
            $table->dropColumn(['type', 'lokasi', 'waktu_mulai', 'waktu_selesai']);
        });
    }
}