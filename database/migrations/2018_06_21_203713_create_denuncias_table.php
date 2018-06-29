<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciasTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('denuncias', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id');
      $table->integer('ps_id')->nullable();
      $table->string('local');
      $table->string('descricao');
      $table->string('anonimo')->nullable();
      $table->string('aprovada')->default('naoAprovada');
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
    Schema::dropIfExists('denuncias');
  }
}
