<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('event_log')) return; 
        Schema::create('event_log', function ($table) {
            $table->string('id')->primary();
            $table->string('user')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('log');
            $table->string('type', 45)->nullable();
            $table->string('page', 300)->nullable();
            $table->string('date', 30)->nullable();
            $table->string('year', 40)->nullable();
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
