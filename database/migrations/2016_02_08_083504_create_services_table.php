<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {  
       if(Schema::hasTable('services')):
        DB::statement("TRUNCATE TABLE services");
        DB::statement("TRUNCATE TABLE admin CASCADE");
        Schema::drop('services');
        endif;

        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('title',250);
            $table->longText('description');
            $table->string('image',250);
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
        Schema::drop('services');
    }
}
