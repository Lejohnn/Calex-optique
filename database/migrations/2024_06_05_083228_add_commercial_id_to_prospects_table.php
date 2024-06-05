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
        Schema::table('prospects', function (Blueprint $table) {
            $table->unsignedBigInteger('commercial_id')->nullable();

            // Assuming 'commercials' is the name of the table where Commercials are stored
            $table->foreign('commercial_id')->references('id')->on('commercials')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prospects', function (Blueprint $table) {
            $table->dropForeign(['commercial_id']);
            $table->dropColumn('commercial_id');
        });
    }
};
