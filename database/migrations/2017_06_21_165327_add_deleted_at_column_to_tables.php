<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedAtColumnToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function ($table) {
            $table->softDeletes();
        });

        Schema::table('categories', function ($table) {
            $table->softDeletes();
        });

        Schema::table('comments', function ($table) {
            $table->softDeletes();
        });

        Schema::table('files', function ($table) {
            $table->softDeletes();
        });

        Schema::table('galleries', function ($table) {
            $table->softDeletes();
        });

        Schema::table('photos', function ($table) {
            $table->softDeletes();
        });

        Schema::table('users', function ($table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
