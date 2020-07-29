<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Exécutez les migrations.
     *
     * @return void
     */
    public function up()
    {
        // table pivot : un role est attribué a plusieur users
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();

            $table->integer('role_id')->unsigned(); // clé etrangère id du role
            $table->integer('user_id')->unsigned(); // clé etrangère id du user

            $table->timestamps();
        });
    }

    /**
     * Inversez les migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
