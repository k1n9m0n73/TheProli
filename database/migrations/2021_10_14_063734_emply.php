<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Emply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   if(Schema::hasTable('employ')) return;
        Schema::create('employ', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longtext('content')->nullable()->default(NULL);
            $table->longtext('content_img')->nullable()->default(NULL);
            $table->string('starts',20)->nullable()->default(NULL);
            $table->string('dead_line',20)->nullable()->default(NULL);
            $table->string('partner',20)->nullable()->default(NULL);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employ');
    }
}
