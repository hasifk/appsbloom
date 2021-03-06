<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFanwallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    
        if(Schema::hasTable('fanwall')):
        DB::statement("TRUNCATE TABLE fanwall");
        DB::statement("TRUNCATE TABLE admin CASCADE");
        Schema::drop('fanwall');
        endif;

       
        Schema::create('fanwall', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->longText('comment');
            $table->integer('status')->default(0);
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
        Schema::drop('fanwall');
    }
}
