<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pastes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Email')->default('guest');
            $table->string('Title');
            $table->string('Text')->default('empty');
            $table->string('Lang');
            $table->boolean('Access')->default('0');
            $table->dateTime('DateOfExist');
            $table->string('link')->default('none');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pastes');
    }
}
