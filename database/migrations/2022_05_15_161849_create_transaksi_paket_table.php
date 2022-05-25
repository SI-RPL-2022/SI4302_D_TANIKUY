<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_paket', function (Blueprint $table) {
            $table->id('id_transaksi_paket');
            $table->bigInteger('id_paket')->unsigned();
            $table->foreign('id_paket')->references('id_paket')->on('paket')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status_pembayaran')->default('Belum Lunas');
            $table->string('bukti_transfer')->default('Tidak Ada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_paket');
    }
};
