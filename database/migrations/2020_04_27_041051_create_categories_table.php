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
            $table->id();
            $table->foreignId('variable_id');
            $table->foreign('variable_id')->references('id')->on('variables');
            $table->string('name')->nullable();
            $table->integer('a')->nullable();
            $table->integer('b')->nullable();
            $table->integer('c')->nullable();
            $table->integer('d')->nullable();
            $table->string('fcCategory')->nullable();
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
