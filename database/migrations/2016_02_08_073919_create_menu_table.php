<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(Schema::hasTable('menu')):
        DB::statement("TRUNCATE TABLE menu");
        DB::statement("TRUNCATE TABLE app_type CASCADE");
        Schema::drop('menu');
        endif;
        
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_type_id');
            $table->foreign('app_type_id')->references('id')->on('app_type')
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
