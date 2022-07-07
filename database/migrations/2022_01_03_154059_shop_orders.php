<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * [tamount] => 64500
  
     * 
     *   ``, `fraction`, `settle`, `settle1`, `settle2`, 
     * `settle3`, `settle4`, `settle5`, `del_date`, `rejection_reason`,
     * `item_cate`, `payback`, `hub1`, `hub1_resp`, `hub2`, `hub2_resp`, `puvc`, `partner_code`, `handling_cost`, ``
     */
    public function up()
    {    if(Schema::hasTable('shop_orders')) return; 
        Schema::create('shop_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id',120)->nullable()->default(NULL);
            $table->string('data_id',120)->nullable()->default(NULL);
            $table->string('tdate',120)->nullable()->default(NULL);
            $table->string('tdate_time',120)->nullable()->default(NULL);
            $table->string('year',20)->nullable()->default(NULL);
            $table->string('tid',120)->nullable()->default(NULL);
            $table->string('tmonth',30)->nullable()->default(NULL);
            $table->string('tpay_code',120)->nullable()->default(NULL);
            $table->string('state',30)->nullable()->default(NULL);
            $table->string('lga',120)->nullable()->default(NULL);
            $table->string('age',50)->nullable()->default(NULL);
            $table->string('gender',50)->nullable()->default(NULL);
            $table->double('tamount',12,3)->default(0);
            $table->double('mass',12,3)->default(0);
            $table->integer('qty')->default(0);
            $table->double('tdelivery_cost',12,3)->default(0);
            $table->double('tvat',12,3)->default(0);
            $table->double('tdelivery_des',12,3)->default(0);
            $table->string('pdc',1120)->default(0);
            $table->string('order_status',20)->default('incomplete');
            $table->text('item_order',120)->nullable()->default(NULL);
            $table->string('item_owner',120)->nullable()->default(NULL);
            $table->string('item_store',120)->nullable()->default(NULL);
            $table->string('item_uploader',120)->nullable()->default(NULL);
            $table->string('order_id',120)->nullable()->default(NULL);
            $table->string('delivery_type',50)->nullable()->default(NULL);
            $table->double('titem_cost',12,3)->nullable()->default(NULL);
            $table->string('titem_mass',120)->nullable()->default(NULL); 
            $table->string('log1_id',120)->nullable()->default(NULL);
            $table->longtext('log1_details')->nullable()->default(NULL);
            $table->string('log2_id',120)->nullable()->default(NULL);
            $table->longtext('log2_details')->nullable()->default(NULL);
            $table->string('log3a_id',120)->nullable()->default(NULL);
            $table->longtext('log3a_details')->nullable()->default(NULL);            
            $table->string('log3b_id',120)->nullable()->default(NULL);
            $table->longtext('log3b_details')->nullable()->default(NULL);
            $table->string('log4a_id',120)->nullable()->default(NULL);
            $table->longtext('log4a_details')->nullable()->default(NULL);
            $table->string('log4b_id',120)->nullable()->default(NULL);
            $table->longtext('log4b_details')->nullable()->default(NULL);
            $table->double('log1_amt',9,2)->default(0);
            $table->double('log2_amt',9,2)->default(0);
            $table->double('log3a_amt',9,2)->default(0);
            $table->double('log4a_amt',9,2)->default(0);
            $table->double('log3b_amt',9,2)->default(0);
            $table->double('log4b_amt',9,2)->default(0);
            $table->string('log1_res',120)->nullable()->default(NULL);
            $table->string('log2_res',120)->nullable()->default(NULL);
            $table->string('log3a_res',120)->nullable()->default(NULL);
            $table->string('log4a_res',120)->nullable()->default(NULL);
            $table->string('logba_res',120)->nullable()->default(NULL);
            $table->string('log4b_res',120)->nullable()->default(NULL);
            $table->string('item_id',120)->nullable()->default(NULL);
            $table->string('del_sta',1200)->default("Still in warehouse");
            $table->double('fraction',12,3)->default(0);
            $table->integer('hub1_selttle')->default(0);
            $table->integer('hub2_selttle')->default(0);
            $table->integer('hub3_selttle')->default(0);
            $table->integer('log1_selttle')->default(0);
            $table->integer('log2_selttle')->default(0);
            $table->integer('log3a_selttle')->default(0);
            $table->integer('log3b_selttle')->default(0);
            $table->integer('log4a_selttle')->default(0);
            $table->integer('log4b_selttle')->default(0);
            $table->string('del_date',120)->nullable()->default(NULL);
            $table->string('rejection_reason',120)->nullable()->default(NULL);
            $table->string('category_id',120)->nullable()->default(NULL);
            $table->string('subcategory_id',120)->nullable()->default(NULL);
            $table->string('type_id',120)->nullable()->default(NULL);
            $table->integer('payback')->default(0);
            $table->string('hub1',120)->nullable()->default(NULL);
            $table->string('hub1_res',120)->nullable()->default(NULL);
            $table->string('hub2',120)->nullable()->default(NULL);
            $table->string('hub2_res',120)->nullable()->default(NULL);
            $table->string('hub3',120)->nullable()->default(NULL);
            $table->string('hub3_res',120)->nullable()->default(NULL);
            $table->string('puvc',560)->nullable()->default(NULL);
            $table->string('partner_code',120)->nullable()->default(NULL);
            $table->double('handling_cost',12,3)->default(0);
            $table->string('deliver_on',120)->nullable()->default(NULL);
            $table->integer('rating')->default(-1);
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
        Schema::dropIfExists('shop_orders');
    }
}
