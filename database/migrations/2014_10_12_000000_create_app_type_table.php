<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
       if(Schema::hasTable('app_type')):
        DB::statement("TRUNCATE TABLE app_type");
        Schema::drop('app_type');
        endif;


        Schema::create('app_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',100);
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
        Schema::drop('app_type');
    }
}
