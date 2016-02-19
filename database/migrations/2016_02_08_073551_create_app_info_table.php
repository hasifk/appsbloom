<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(Schema::hasTable('app_info')):
        DB::statement("TRUNCATE TABLE app_info");
        DB::statement("TRUNCATE TABLE admin CASCADE");
        Schema::drop('app_info');
        endif;
        
       
        Schema::create('app_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
             $table->foreign('admin_id')->references('id')->on('admin')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('appname',100);
            $table->longText('appdescription');
            $table->longText('customer_center');
            $table->longText('terms_and_conditions');
            $table->string('app_image',300);
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
        Schema::drop('app_info');
    }
}
