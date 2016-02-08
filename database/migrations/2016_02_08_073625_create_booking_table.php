<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use DB;
class CreateBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {   DB::statement("TRUNCATE TABLE booking");
        DB::statement("TRUNCATE TABLE admin CASCADE");
        Schema::dropIfExists('booking');
        Schema::create('booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('name',200);
            $table->integer('phone');
            $table->string('email',200);
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
        Schema::drop('booking');
    }
}
