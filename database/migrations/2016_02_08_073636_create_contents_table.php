<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(Schema::hasTable('contents')):
        DB::statement("TRUNCATE TABLE contents");
        DB::statement("TRUNCATE TABLE admin CASCADE");
        Schema::drop('contents');
        endif;

       
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('location',300);
            $table->longText('description');
            $table->longText('aboutus');
            $table->longText('schedule_info');
            $table->longText('contact_us');
            $table->string('image',200);
            $table->longText('price_lists');
            $table->longText('home');
            $table->longText('services');
            $table->longText('ourteams');
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
        Schema::drop('contents');
    }
}
