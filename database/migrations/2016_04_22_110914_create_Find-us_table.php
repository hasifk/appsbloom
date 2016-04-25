<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFindUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('Find_us')):
            DB::statement("TRUNCATE TABLE Find_us");
            DB::statement("TRUNCATE TABLE admin CASCADE");
            Schema::drop('Find_us');
        endif;

        Schema::create('Find_us', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->string('place', 200);
            $table->double('lat',15,8);
            $table->double('long',15,8);
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
        Schema::drop('Find_us');
    }
}
