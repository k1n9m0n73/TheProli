<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Codetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    if(Schema::hasTable('codetable')) return; 
        Schema::create('codetable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('data_id',120);
            $table->string('dcode',120);
            $table->string('prefix',10);
            $table->string('partner_id',120);
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
        Schema::dropIfExists('codetable');
    }
}
