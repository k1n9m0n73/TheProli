<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    if(Schema::hasTable('item_store')) return; 
        Schema::create('item_store', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('item_id',200)->nullable()->default(NULL);
            $table->string('item_name',300)->nullable()->default(NULL);
            $table->string('item_subcateId',120)->nullable()->default(NULL);
            $table->string('item_subcateName',120)->nullable()->default(NULL);
           
            $table->string('item_type',120)->nullable()->default(NULL);
            $table->string('type_id',200)->nullable()->default(NULL);
            $table->string('item_vendor',200)->nullable()->default(NULL);
            $table->string('item_vendor_state',40)->nullable()->default(NULL);
            $table->double('item_total_price',12,2)->default(0);
            $table->double('item_unit_price',12,2)->default(0);
            $table->double('item_sell_price',12,2)->default(0);
            $table->double('item_comparePrice',12,2)->default(0);
            $table->double('item_discount',12,2)->default(0);
            $table->integer('item_taxable', false, true)->length(10);
            $table->string('item_sku',120)->nullable()->default(NULL);
            $table->string('item_barcode',120)->nullable()->default(NULL);
            $table->string('item_trackQty',120)->nullable()->default(NULL);
            $table->integer('item_qty', false, true)->length(10);
            $table->string('item_col',120)->nullable()->default(NULL);
            $table->string('item_state',120)->nullable()->default(NULL);
            $table->longText('item_description')->nullable()->default(NULL);
            $table->string('item_desImg',220)->nullable()->default(NULL);
          
            $table->integer('item_requireShipping', false, true)->length(10);
            $table->double('item_weight',8,2)->default(0);
            $table->double('item_total_weight',8,2)->default(0);
            $table->string('item_unit',8)->default('g');
            $table->string('item_color',120)->nullable()->default(NULL);
            $table->string('item_size',120)->nullable()->default(NULL);
            $table->string('item_materials',120)->nullable()->default(NULL);
            $table->string('item_dim',120)->nullable()->default(NULL);
            $table->string('item_orderUrl',120)->nullable()->default(NULL);
            $table->string('item_seoTitle',120)->nullable()->default(NULL);
            $table->string('item_seoDescription',120)->nullable()->default(NULL);
            $table->string('item_seohandle',120)->nullable()->default(NULL);
            $table->string('item_handle',120)->nullable()->default(NULL);
            $table->string('item_onLineOn',20)->nullable()->default(NULL);
            $table->string('item_cateId',120)->nullable()->default(NULL);
            $table->string('item_cateName',120)->nullable()->default(NULL);
            $table->string('item_subcategoryId',120)->nullable()->default(NULL);
            $table->string('item_subcategoryName',120)->nullable()->default(NULL);
            $table->text('item_discription')->nullable()->default(NULL);
            $table->text('item_disImg')->nullable()->default(NULL);
            $table->text('item_images')->nullable()->default(NULL);
            $table->string('item_uploadOn',20)->nullable()->default(NULL);
            $table->string('item_uploader',120)->nullable()->default(NULL);
            $table->string('item_dealStart',20)->nullable()->default(NULL);
            $table->string('item_dealEnd',20)->nullable()->default(NULL);
            $table->string('item_dealInterval',20)->nullable()->default(NULL);
            $table->integer('item_delivery_status', false, true)->length(10);
            
            $table->string('item_puvc',120)->nullable()->default(NULL);
            $table->string('item_storage',120)->nullable()->default(NULL);
            $table->string('item_harvest_day',20)->nullable()->default(NULL);
            $table->integer('conf', false, true)->length(10);
            $table->string('confd',12)->nullable()->default(NULL);
            $table->string('expire',120)->nullable()->default(NULL);
            $table->string('has_run_expire',120)->nullable()->default(NULL);
            $table->integer('market_status', false, true)->length(10);
            $table->string('exp_sta',120)->nullable()->default(NULL);
            $table->string('updated_by',120)->nullable()->default(NULL);
            $table->string('updated_on',20)->nullable()->default(NULL);
            $table->integer('item_rating')->default(0);
            $table->integer('item_rating_count')->default(0);
            $table->string('partner_code',120)->nullable()->default(NULL);
            $table->string('year',20)->nullable()->default(NULL);







            $table->longtext('selected_lgas')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_store');
    }
}
