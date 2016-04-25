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
    {   
        if(Schema::hasTable('feedback_reply')):
        DB::statement("TRUNCATE TABLE feedback_reply");
        DB::statement("TRUNCATE TABLE feedback CASCADE");
        Schema::drop('feedback_reply');
        endif;

        
        Schema::create('feedback_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feedback_id');
            $table->foreign('feedback_id')->references('id')->on('feedback')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
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
