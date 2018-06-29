<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('messages', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('sender_id');
      $table->integer('sent_to_id');
      /*$table->foreign('sender_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
      $table->foreign('sent_to_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
      $table->integer('sent_to_id');*/
      //$table->foreign('sender_id')->unasigned()->nullable();
      //$table->foreign('sent_to_id')->unasigned()->nullable();
      $table->text('body');
      $table->text('subject');
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
    Schema::dropIfExists('messages');
  }
}
