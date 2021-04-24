<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonneInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('personne_id');
            $table->string('cm');
            $table->string('kg');
            $table->string('cheveux');
            $table->string('longueur');
            $table->string('nature');
            $table->string('couleur');
            $table->string('yeux');
            $table->string('niveux');
            $table->string('specialite');
            $table->string('situation');
            $table->string('nombre');
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
        Schema::dropIfExists('personne_infos');
    }
}
