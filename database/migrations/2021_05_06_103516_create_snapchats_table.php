<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnapchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snapchats', function (Blueprint $table) {
            $table->id();
            $table->integer('personne_id');
            $table->integer('nombre_abonne');
            $table->string('engagement');
            $table->string('qualite');
            $table->string('like');
            $table->string('commentaire');
            $table->string('followers');
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
        Schema::dropIfExists('snapchats');
    }
}
