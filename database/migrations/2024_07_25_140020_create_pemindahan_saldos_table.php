<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up() : void
  {
    Schema::create('pemindahan_saldos', function (Blueprint $table) {
      $table->id();
      $table->date('tanggal'); // Menggunakan tipe data date
      $table->integer('transaksi_id'); // Menggunakan unsignedBigInteger
      $table->unsignedBigInteger('rekening_awal_id'); // Menggunakan unsignedBigInteger
      $table->unsignedBigInteger('rekening_tujuan_id'); // Menggunakan unsignedBigInteger
      $table->unsignedBigInteger('user_id');
      $table->integer('saldo')->default(0);
      $table->timestamps();

      // Definisikan foreign key dengan index
      $table->foreign('rekening_awal_id')
        ->references('id')
        ->on('rekenings')
        ->onDelete('cascade')
        ->onUpdate('cascade'); // Menambahkan onUpdate cascade

      $table->foreign('rekening_tujuan_id')
        ->references('id')
        ->on('rekenings')
        ->onDelete('cascade')
        ->onUpdate('cascade'); // Menambahkan onUpdate cascade
      $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');
    });

  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('pemindahan_saldos');
  }
};
