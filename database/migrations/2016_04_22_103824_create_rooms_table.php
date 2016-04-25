<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (Schema::hasTable('rooms')):
            DB::statement("TRUNCATE TABLE rooms");
            DB::statement("TRUNCATE TABLE admin CASCADE");
            Schema::drop('rooms');
        endif;

        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->string('type', 50);
            $table->intiger('capacity');
            $table->string('rent', 15);
            $table->longText('other');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('rooms');
    }

}
