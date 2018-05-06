<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosPerfisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_perfis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('usuarios_perfis');
    }
}
