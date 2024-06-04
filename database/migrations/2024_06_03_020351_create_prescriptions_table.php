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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('nom_patient');
            $table->integer('age');
            $table->date('date');
            $table->string('sph_od')->nullable();
            $table->string('cyl_od')->nullable();
            $table->string('axe_od')->nullable();
            $table->string('add_od')->nullable();
            $table->string('sph_og')->nullable();
            $table->string('cyl_og')->nullable();
            $table->string('axe_og')->nullable();
            $table->string('add_og')->nullable();
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
        Schema::dropIfExists('prescriptions');
    }
};
