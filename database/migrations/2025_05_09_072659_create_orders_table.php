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
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->double('total_amount')->default(0);
            $table->string('paid_amount');
            $table->boolean('has_coupon')->default(false);
            $table->string('coupon_code')->nullable();
            $table->double('coupon_discount')->default(0);
            $table->string('currency_icon');
            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();

            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
