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
        Schema::create('monthly_performances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commercial_id');
            $table->integer('points');
            $table->date('month'); // Use date type to store the start of the month
            $table->timestamps();

            $table->foreign('commercial_id')->references('id')->on('commercials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_performances');
    }
};
