<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    
        if(Schema::hasTable('coupons')):
        DB::statement("TRUNCATE TABLE coupons");
        DB::statement("TRUNCATE TABLE admin CASCADE");
        Schema::drop('coupons');
        endif;
        
        
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->foreign('admin_id')->references('id')->on('admin')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->string('coupon_code',200);
            $table->longText('description');
            $table->text('start_date');
            $table->text('end_date');
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
        Schema::drop('coupons');
    }
}
