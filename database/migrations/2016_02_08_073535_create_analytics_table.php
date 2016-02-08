<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('app_id');
             $table->foreign('app_id')->references('id')->on('apptype')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('downloads_by_date');
            $table->integer('downloads_by_platform');
            $table->integer('downloads_by_location');
            $table->integer('daily_views');
            $table->string('most_active_section', 300);
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
       Schema::drop('analytics');
    }
}
