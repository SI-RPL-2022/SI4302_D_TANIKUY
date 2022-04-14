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
        Schema::create('jawabanassessment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('assessmentid');
            $table->foreign('assessmentid')->references('id')->on('assessment')->onDelete('cascade')->onUpdate('cascade');
            $table->text('jawaban');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawabanassessment');
    }
};
