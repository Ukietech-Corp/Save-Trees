<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsAndEventsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('slug')->default('');
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });

        Schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('problem_id')->unsigned()->default(0);
            $table->foreign('problem_id')->references('id')->on('problems')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->boolean('completed');
            $table->text('description');
            $table->integer('required_amount');
            $table->integer('available_amount');
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
        Schema::dropIfExists('events');
        Schema::dropIfExists('problems');
    }
}
