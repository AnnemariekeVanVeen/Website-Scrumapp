<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetrospectiveUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retrospective_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('retrospective_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('retrospective_id')
                ->on('retrospectives')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retrospective_user');
    }
}
