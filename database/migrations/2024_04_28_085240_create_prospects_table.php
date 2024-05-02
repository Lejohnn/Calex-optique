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
            $table->date('date');
            $table->string('commercial_name');
            $table->string('entreprise_nom')->nullable();
            $table->string('entreprise_responsable')->nullable();
            $table->string('entreprise_contact')->nullable();
            $table->string('entreprise_heure')->nullable();
            $table->string('rdv_nom_prenom')->nullable();
            $table->string('rdv_contact')->nullable();
            $table->string('rdv_societe')->nullable();
            $table->string('rdv_heure')->nullable();
            $table->string('nettoyage_nom_prenom')->nullable();
            $table->string('nettoyage_contact')->nullable();
            $table->string('nettoyage_societe')->nullable();
            $table->string('nettoyage_heure')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
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
