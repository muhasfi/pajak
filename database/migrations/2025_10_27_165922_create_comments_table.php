<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // untuk sistem reply bertingkat
            $table->foreignId('parent_id')->nullable()
                ->constrained('comments')
                ->onDelete('cascade');

            // kalau user login (optional)
            $table->foreignId('user_id')->nullable()
                ->constrained('users')
                ->onDelete('set null');

            // kalau admin yang balas
            $table->foreignId('admin_id')->nullable()
                ->constrained('admins')
                ->onDelete('set null');

            // jika pengunjung tidak login, mereka tetap isi nama & email manual
            $table->string('name')->nullable();
            $table->string('email')->nullable();

            // isi komentar
            $table->text('content');

            // apakah komentar sudah disetujui (opsional)
            // $table->boolean('approved')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Rollback migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
