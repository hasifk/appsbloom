<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 

        if(Schema::hasTable('admin')):
        DB::statement("TRUNCATE TABLE admin");
        DB::statement("TRUNCATE TABLE app_type CASCADE");
        Schema::drop('admin');
        endif;
     
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_type_id');
            $table->foreign('app_type_id')->references('id')->on('app_type')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
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
        Schema::drop('admin');
    }
}
