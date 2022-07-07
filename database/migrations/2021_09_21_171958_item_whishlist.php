<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemWhishlist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('item_wishlist')) return; 
        Schema::create('item_wishlist', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ci',120)->nullable()->default(NULL);
            $table->string('cateId',120)->nullable()->default(NULL);
            $table->string('subcateId',120)->nullable()->default(NULL);
            $table->string('cate_id',120)->nullable()->default(NULL);
            $table->string('item_id',200)->nullable()->default(NULL);
            $table->string('date',30)->nullable()->default(NULL);
            $table->string('year',30)->nullable()->default(NULL);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_whishlist');
    }
}
