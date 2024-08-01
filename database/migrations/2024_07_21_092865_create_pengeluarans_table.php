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
    Schema::create('pengeluarans', function (Blueprint $table) {
      $table->id();
      $table->date('tanggal');
      $table->integer('saldo')->default(0);
      $table->unsignedBigInteger('rekening_id');
      $table->unsignedBigInteger('transaksi_id');
      $table->unsignedBigInteger('kegiatan_id');
      $table->unsignedBigInteger('kebutuhan_id');
      $table->unsignedBigInteger('user_id');
      $table->timestamps();

      // Definisikan foreign key
      $table->foreign('rekening_id')->references('id')->on('rekenings')->onDelete('cascade');
      $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
      $table->foreign('kegiatan_id')->references('id')->on('kegiatans')->onDelete('cascade');
      $table->foreign('kebutuhan_id')->references('id')->on('kebutuhans')->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('pengeluarans');
  }
};