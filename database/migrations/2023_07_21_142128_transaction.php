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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->json('product');
            $table->integer('total_price');
            $table->integer('pay')->nullable();
            $table->integer('change')->nullable();
            $table->string('payment')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('status_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
