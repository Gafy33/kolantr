<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatistiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistiques', function (Blueprint $table) {
            $table->id();
            $table->string('typeV')->nullable();
            $table->integer('VitMax')->nullable();
            $table->integer('NbEssieux')->nullable();
            $table->integer('VitMoyenne')->nullable();
            $table->integer('NbVehicule')->nullable();
            $table->integer('VitesseInferieureOuEgale')->nullable();
            $table->integer('VitesseLimitMoins20')->nullable();
            $table->integer('VitesseLimitPlus20')->nullable();
            $table->integer('VitesseLimitPlus30')->nullable();
            $table->integer('VitesseLimitPlus40')->nullable();
            $table->integer('VitesseLimitPlus50')->nullable();
            $table->integer('campagneId')->nullable();
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
        Schema::dropIfExists('statistiques');
    }
}
