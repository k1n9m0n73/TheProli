<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    if(Schema::hasTable('shop_history')) return; 
        Schema::create('shop_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id',120)->nullable()->default(NULL);
            $table->string('customer_id',130)->nullable()->default(NULL);
            $table->string('tid',150)->nullable()->default(NULL);
            $table->string('item_id',150)->nullable()->default(NULL);
            $table->string('tdate',30)->nullable()->default(NULL);
            $table->string('tdate_time',30)->nullable()->default(NULL);
        
            
         
       
    
           


            
            
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
        Schema::dropIfExists('shop_history');
    }
}
