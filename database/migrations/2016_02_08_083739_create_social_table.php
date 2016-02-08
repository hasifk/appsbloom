<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {    DB::statement("TRUNCATE TABLE social");
        DB::statement("TRUNCATE TABLE admin CASCADE");
        Schema::dropIfExists('social');
        Schema::create('social', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('facebook',250);
            $table->string('instagram',250);
            $table->string('twitter',250);
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
        Schema::drop('social');
    }
}
