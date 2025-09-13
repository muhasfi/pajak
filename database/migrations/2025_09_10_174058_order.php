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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();

            $table->unsignedBigInteger('user_id');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('address');

             $table->decimal('subtotal', 15, 2);
            $table->decimal('tax', 15, 2)->default(0);
            $table->decimal('grand_total', 15, 2);

            $table->enum('status', ['pending', 'success', 'failed', 'expired'])->default('pending');

            $table->text('note')->nullable();
            $table->text('payment_method')->nullable();
            
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        //
    }
};
