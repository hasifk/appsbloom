<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::dropIfExists('submenu');
        Schema::create('submenu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id');
            $table->foreign('menu_id')->references('id')->on('menu')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('submenu',100);
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
        Schema::drop('submenu');
    }
}
