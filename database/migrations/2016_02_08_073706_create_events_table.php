<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {   
        if(Schema::hasTable('events')):
        DB::statement("TRUNCATE TABLE events");
        DB::statement("TRUNCATE TABLE admin CASCADE");
        Schema::drop('events');
        endif;
        

        
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('title',300);
            $table->string('photo',300);
            $table->longText('description');
            $table->string('start_time');
            $table->string('end_time');
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
        Schema::drop('events');
    }
}
