<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampagnemesureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campagnemesures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('limitationvitesse')->nullable();
            $table->integer('id_user')->nullable();
            $table->integer('id_boitier')->nullable();
            $table->string('DébutCampagne')->nullable();
            $table->string('FinCampagne')->nullable();
            $table->string('adresseCampagne')->nullable();
            $table->string('latitudeCampagne')->nullable();
            $table->string('longitudeCampagne')->nullable();
            $table->string('statut')->nullable();
            $table->string('codePostal')->nullable();
            $table->string('ville')->nullable();
            $table->string('numeroRoute')->nullable();
            $table->string('Direction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campagnemesures');
    }
}
