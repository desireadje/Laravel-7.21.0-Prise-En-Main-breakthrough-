<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->bigIncrements('id_cat');
            $table->string('name_cat')->unique();
            $table->integer('etat');
            $table->timestamps();
        });

        // Je crée l'identifiant de la categorie dans la table post
        Schema::table('postes', function (Blueprint $table) {

            $table->integer('id_cat')->unsigned()->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
