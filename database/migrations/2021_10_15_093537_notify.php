<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notify extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    if(Schema::hasTable('notify')) return;
        Schema::create('notify', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longtext('content')->nullable()->default(NULL);
            $table->string('sto',120)->nullable()->default(NULL);
            $table->string('sfrom',120)->nullable()->default(NULL);
            $table->string('date',20)->nullable()->default(NULL);
            $table->integer('rp')->default(0); 
            $table->integer('delf')->default(0);
            $table->integer('delt')->default(0);
            $table->integer('rd')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notify');
    }
}
