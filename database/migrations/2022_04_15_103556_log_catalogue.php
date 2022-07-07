<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LogCatalogue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('log_catalogue')) return; 
        Schema::create('log_catalogue', function ($table) {
            $table->id();
            $table->string('date', 45)->nullable();
            $table->string('item_name', 120)->nullable();
            $table->string('state_from', 120)->nullable();
            $table->string('state_to', 120)->nullable();
            $table->string('city_from', 120)->nullable();
            $table->string('city_to', 120)->nullable();
            $table->string('order_id', 120)->nullable();
            $table->string('log_id', 120)->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
