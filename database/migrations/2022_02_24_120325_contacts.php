<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Contacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   if(Schema::hasTable('contacts')) return; 
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('sname',120)->nullable()->default(NULL);
            $table->string('semail',150)->nullable()->default(NULL);
            $table->string('ssubject',150)->nullable()->default(NULL);
            $table->string('smessage',350)->nullable()->default(NULL);
            $table->string('date',50)->nullable()->default(NULL);
            $table->string('status',50)->nullable()->default(NULL);

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
        Schema::dropIfExists('contacts');
    }
}
