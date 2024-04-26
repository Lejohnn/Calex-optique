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
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_name', 255)->nullable(false);
            $table->string('company', 255)->nullable(false);
            $table->string('owner', 255)->nullable(false);
            $table->string('contact', 255)->nullable(false);
            $table->string('name', 255)->nullable(false);
            $table->string('society', 255)->nullable(false);
            $table->string('person_contact', 255)->nullable(false);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            //$table->time('rdv_hour')->nullable(false);
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
        Schema::dropIfExists('prospects');
    }
};
