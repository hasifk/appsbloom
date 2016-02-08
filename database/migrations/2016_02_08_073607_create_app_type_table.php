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
    {   DB::statement("TRUNCATE TABLE app_type");
        
        Schema::dropIfExists('app_type');
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
