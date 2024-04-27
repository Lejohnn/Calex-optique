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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->string('telephone');
            $table->string('carte_identite',191)->unique();
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('profession')->nullable();
            $table->string('societe_attache')->nullable();
            $table->string('assurance')->nullable();
            $table->string('disciplines_pratiquees')->nullable();
            $table->date('date_debut')->nullable();
            $table->string('activite_interpelant_vision')->nullable();
            $table->text('antecedents_familiaux')->nullable();
            $table->text('antecedents_chirurgicaux')->nullable();
            $table->text('traitements_en_cours')->nullable();
            $table->text('allergies')->nullable();
            $table->text('mentions_generales')->nullable();
            $table->boolean('portez_vous_des_lunettes')->nullable();
            $table->boolean('besoin_changer_lunettes')->nullable();
            $table->text('autre_choses')->nullable();
            $table->string('choix_service')->nullable();
            $table->text('diagnostic')->nullable();
            $table->text('prescription')->nullable();
            $table->text('examen_particulier')->nullable();
            $table->dateTime('rendez_vous')->nullable();
           // $table->integer('rendevou')->constrained('appointments')->onDelete('cascade');

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
        Schema::dropIfExists('clients');
    }
};
