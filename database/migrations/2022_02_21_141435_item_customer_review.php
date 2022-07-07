<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItemCustomerReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('item_customer_review')) return; 
        Schema::create('item_customer_review', function (Blueprint $table) {
            $table->id();
        
            $table->string('name',120)->nullable()->default(NULL);
            $table->string('comm',150)->nullable()->default(NULL);
            $table->string('star',150)->nullable()->default(NULL);
            $table->string('add_info',300)->nullable()->default(NULL);
            $table->string('item_id',300)->nullable()->default(NULL);
            $table->string('customer_id',300)->nullable()->default(NULL);
            
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
        Schema::dropIfExists('item_customer_review');
    }
}
