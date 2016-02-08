<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;
class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   DB::statement("TRUNCATE TABLE menu");
        DB::statement("TRUNCATE TABLE apptype CASCADE"); 
        Schema::dropIfExists('menu');
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_type_id');
            $table->foreign('app_type_id')->references('id')->on('apptype')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('menu',100);
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
        Schema::drop('menu');
    }
}
