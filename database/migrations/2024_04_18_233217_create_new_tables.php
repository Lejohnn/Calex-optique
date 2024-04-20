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
        Schema::dropIfExists('commande');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');

        Schema::create('roles', function (Blueprint $table) {
            $table->id('ID_Role');
            $table->string('Nom');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id('ID_User');
            $table->string('Nom');
            $table->string('Prénom');
            $table->string('Email')->unique();
            $table->string('Mot_de_passe');
            $table->unsignedBigInteger('ID_Role')->nullable(); // Rendre la clé étrangère nullable
            $table->foreign('ID_Role')->references('ID_Role')->on('roles');
            $table->timestamps();
        });

        Schema::create('commande', function (Blueprint $table) {
            $table->id('ID_Commande');
            $table->unsignedBigInteger('ID_Client');
            $table->unsignedBigInteger('ID_Produit');
            $table->integer('Quantité');
            $table->timestamp('Date_commande')->default(now());
            $table->string('Status')->default('en_attente');
            $table->timestamps();
        });

        // Ajout des contraintes de clé étrangère après la création des tables
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('ID_Role')->references('ID_Role')->on('roles');
        });

        Schema::table('commande', function (Blueprint $table) {
            $table->foreign('ID_Client')->references('ID_Client')->on('clients');
            $table->foreign('ID_Produit')->references('ID_Produit')->on('produits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
