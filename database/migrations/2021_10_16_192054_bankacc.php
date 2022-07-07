<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bankacc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   if(Schema::hasTable('bankacc')) return;
        Schema::create('bankacc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',200)->nullable()->default(NULL);
            $table->longtext('acc_info')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bankacc');
    }
}
