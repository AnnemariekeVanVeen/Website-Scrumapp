<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBacklogItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backlog_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->bigInteger('sprint_id')->unsigned()->index()->nullable();
            $table->string('assigned_to')->nullable();
            $table->string('state');
            $table->integer('priority');
            $table->string('role');
            $table->string('activity');
            $table->integer('story_points')->nullable();
            $table->text('description')->nullable();
            $table->text('acceptation_criteria')->nullable();
            $table->bigInteger('project_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('sprint_id')
                ->on('sprints')
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
        Schema::dropIfExists('backlog_items');
    }
}
