<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductUploadSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   if(Schema::hasTable('product_upload_setting')) return; 
        Schema::create('product_upload_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('allow_aggregator_to_uplaod_item_without_code')->default(0);
            $table->integer('allow_farmer_to_uplaod_item_without_code')->default(0);
            $table->integer('allow_product_owner_to_set_price')->default(0);
            $table->integer('allow_warehouse_to_uplaod_item')->default(0);
            $table->integer('allow_item_to_be_sold_when_out_of_stock')->default(0);
            $table->string('retain_item_after_expiring_date',120)->default(0);
            $table->integer('allow_item_confirmation')->default(1);
            $table->integer('allow_item_owner_to_set_deal')->default(1);
            $table->integer('allow_farmer_item_description')->default(0);
            $table->integer('allow_aggregator_item_description')->default(0);
            $table->integer('allow_warehouse_item_description')->default(0);
            $table->string('item_unit_of_measurement',120)->nullable()->default(NULL);
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
        Schema::dropIfExists('product_upload_setting');
    }
}
