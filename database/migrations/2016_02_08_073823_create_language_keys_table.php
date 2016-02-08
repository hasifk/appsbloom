<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('language_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id');
            $table->foreign('language_id')->references('id')->on('languages')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('key',300);
            $table->longText('lang_value');
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
        Schema::drop('language_keys');
    }
}
