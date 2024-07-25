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
        Schema::create('pemasukans', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->integer('saldo')->default(0);
            $table->unsignedBigInteger('rekening_id');
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('sumber_pemasukan_id');
            $table->timestamps();

            // Definisikan foreign key
            $table->foreign('rekening_id')->references('id')->on('rekenings')->onDelete('cascade');
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
            $table->foreign('sumber_pemasukan_id')->references('id')->on('sumber_pemasukans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukans');
    }
};