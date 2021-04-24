<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraChiffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_chiffres', function (Blueprint $table) {
            $table->id();
            $table->integer('extra_types_id');
            $table->date('date_1er');
            $table->integer('nombre_publicaion');
            $table->integer('taux_reponse');
            $table->integer('nombre_jaime');
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
        Schema::dropIfExists('extra_chiffres');
    }
}
