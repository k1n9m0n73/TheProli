<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Meaage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    if(Schema::hasTable('message')) return;
        Schema::create('message', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mail_id',200)->nullable()->default(NULL);
            $table->string('mail_gid',200)->nullable()->default(NULL);
            $table->string('title',120)->nullable()->default(NULL);
            $table->longtext('content')->nullable()->default(NULL);
            $table->text('file')->nullable()->default(NULL);
            $table->string('to',120)->nullable()->default(NULL);
            $table->string('from',120)->nullable()->default(NULL);
            $table->string('to_email',120)->nullable()->default(NULL);
            $table->string('from_email',120)->nullable()->default(NULL);
            $table->string('date',20)->nullable()->default(NULL);
            $table->string('time',20)->nullable()->default(NULL); 
            $table->string('partner',40)->nullable()->default(NULL); 
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
        Schema::dropIfExists('message');
    }
}
