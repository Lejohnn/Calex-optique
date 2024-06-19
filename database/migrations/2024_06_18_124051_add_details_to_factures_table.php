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
        Schema::table('factures', function (Blueprint $table) {
            $table->string('autre_nom')->nullable();
            $table->string('societe')->nullable();
            $table->string('telephone')->nullable();
            $table->string('medecin')->nullable();
            $table->string('sphere_od')->nullable();
            $table->string('sphere_og')->nullable();
            $table->string('cylindre_od')->nullable();
            $table->string('cylindre_og')->nullable();
            $table->string('axe_od')->nullable();
            $table->string('axe_og')->nullable();
            $table->string('add_od')->nullable();
            $table->string('add_og')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('factures', function (Blueprint $table) {
            $table->dropColumn([
                'autre_nom',
                'societe',
                'telephone',
                'medecin',
                'sphere_od',
                'sphere_og',
                'cylindre_od',
                'cylindre_og',
                'axe_od',
                'axe_og',
                'add_od',
                'add_og',
            ]);
        });
    }
};
