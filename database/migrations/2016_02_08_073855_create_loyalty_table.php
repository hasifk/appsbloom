<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoyaltyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {   Schema::dropIfExists('loyalty');
        Schema::create('loyalty', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('title',300);
            $table->integer('count');
            $table->longText('action');
            $table->integer('stamp_code');
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
        Schema::drop('loyalty');
    }
}
