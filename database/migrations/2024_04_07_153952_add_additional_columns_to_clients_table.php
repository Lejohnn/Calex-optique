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
        Schema::table('clients', function (Blueprint $table) {
            $table->text('diagnostic')->nullable();
            $table->text('prescription')->nullable();
            $table->text('examen_particulier')->nullable();
            $table->dateTime('rendez_vous')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('diagnostic');
            $table->dropColumn('prescription');
            $table->dropColumn('examen_particulier');
            $table->dropColumn('rendez_vous');
        });
    }
};
