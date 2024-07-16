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
            $table->string('marque_select')->nullable();
            $table->string('code_select')->nullable();
            $table->string('od_select')->nullable();
            $table->string('od_select2')->nullable();
            $table->string('og_select')->nullable();
            $table->string('og_select2')->nullable();
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
            $table->dropColumn('marque_select');
            $table->dropColumn('code_select');
            $table->dropColumn('od_select');
            $table->dropColumn('od_select2');
            $table->dropColumn('og_select');
            $table->dropColumn('og_select2');
        });
    }

};
