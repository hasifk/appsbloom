<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFdbkReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {   DB::statement("TRUNCATE TABLE feedback_reply");
        DB::statement("TRUNCATE TABLE feedback CASCADE");
        Schema::dropIfExists('feedback_reply');
        Schema::create('feedback_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feedback_id');
            $table->foreign('feedback_id')->references('id')->on('feedback')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->longText('reply');
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
        Schema::drop('feedback_reply');
    }
}
