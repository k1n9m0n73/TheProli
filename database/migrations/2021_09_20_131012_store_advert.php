<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreAdvert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {     if(Schema::hasTable('store_advert')) return; 
        Schema::create('store_advert', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ht',70)->nullable()->default(NULL);
            $table->string('sht',70)->nullable()->default(NULL);
            $table->string('url',220)->nullable()->default(NULL);
            $table->string('item',120)->nullable()->default(NULL);
            $table->string('image',220)->nullable()->default(NULL);
            $table->string('dates',120)->nullable()->default(NULL);
            $table->string('updates',120)->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_advert');
    }
}
