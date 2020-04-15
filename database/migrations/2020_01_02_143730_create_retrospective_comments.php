<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetrospectiveComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retrospective_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('retrospective_id')->unsigned()->index();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->text('comment');
            $table->boolean('type');
            $table->timestamps();
            $table->foreign('retrospective_id')
                ->on('retrospectives')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retrospective_comments');
    }
}
