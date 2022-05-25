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
        Schema::create('akses_course', function (Blueprint $table) {
            $table->id('id_akses_course');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_course')->unsigned();
            $table->foreign('id_course')->references('id_course')->on('course')->onUpdate('cascade')->onDelete('cascade');
            $table->string('status_course')->default('Belum Selesai');
            $table->timestamp('akses_terakhir')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('akses_course');
    }
};
