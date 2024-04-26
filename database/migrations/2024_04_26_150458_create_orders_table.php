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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Laravel automatically creates an 'id' primary key
            $table->integer('quantity')->nullable(false);
            $table->string('status', 255)->nullable(false)->default('en_attente');

            // Foreign key constraints (assuming clients and produits tables exist)

            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            // Laravel timestamps (optional)
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
        Schema::dropIfExists('orders');
    }
};
