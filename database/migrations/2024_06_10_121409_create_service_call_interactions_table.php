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
        Schema::create('service_call_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->enum('type', [
                'relance_confirmation_rdv',
                'annonce_confirmation_rdv',
                'relance_satisfaction',
                'relance_proposition_reduction',
                'relance_info_lunettes_disponibles',
                'renseignements_retrait'
            ]);
            $table->text('details')->nullable();
            $table->timestamp('interaction_date');
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
        Schema::dropIfExists('service_call_interactions');
    }
};
