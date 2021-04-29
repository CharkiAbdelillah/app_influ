<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeNomToDomaineHistoDomaines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domaine__histo__domaines', function (Blueprint $table) {
            $table->string('type_nom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domaine__histo__domaines', function (Blueprint $table) {
            $table->dropColumn('type_nom'); 
        });
    }
}
