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
    Schema::create('hutangs', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('transaksi_id');
      $table->unsignedBigInteger('user_id');
      $table->string('name');
      $table->string('img_struk')->nullable();
      $table->date('tanggal');
      $table->date('tanggal_jatuh_tempo');
      $table->unsignedBigInteger('rekening_tujuan_id');
      $table->integer('nominal')->default(0);
      $table->integer('nominal_terbayar')->default(0);
      $table->integer('status')->default(0);
      $table->string('catatan')->nullable();
      $table->timestamps();


      $table->foreign('rekening_tujuan_id')->references('id')->on('rekenings')->onDelete('cascade');
      $table->foreign('transaksi_id')->references('id')->on('transaksis')->onDelete('cascade');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('hutangs');
  }
};