<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInHouseTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('in_house_trainings', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->decimal('harga', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('in_house_trainings');
    }
}
