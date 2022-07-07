<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrtnerSettlement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    if(Schema::hasTable('partner_settlement')) return; 
        Schema::create('partner_settlement', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('data_id',120)->nullable()->default(NULL);
            $table->double('delivery_fraction',12,5)->default(0);
            $table->integer('far_pay_status')->default(0);
            $table->integer('agg_pay_status')->default(0);
            $table->integer('war_pay_status')->default(0);
            $table->integer('log1_pay_status')->default(0);
            $table->integer('log2_pay_status')->default(0);
            $table->integer('log3a_pay_status')->default(0);
            $table->integer('log4a_pay_status')->default(0);
            $table->integer('log3b_pay_status')->default(0);
            $table->integer('log4b_pay_status')->default(0);
            $table->integer('vat_pay_status')->default(0);
            $table->integer('iat_pay_status')->default(0);
            $table->integer('hub1_pay_status')->default(0);
            $table->integer('hub2_pay_status')->default(0);
            $table->integer('hub3_pay_status')->default(0);
            $table->integer('transaction_status')->default(0);
            $table->string('patner_code',100)->nullable()->default(NULL);
            $table->double('total_return_delivery_cost',12,2)->default(0);
            //////////////////////////////////////////////////////////////
            $table->string('item_id',120)->nullable()->default(NULL);
            $table->string('customer_id',120)->nullable()->default(NULL);
            $table->string('transaction_id',120)->nullable()->default(NULL);
            $table->string('order_id',120)->nullable()->default(NULL);
            $table->string('farmer_id',120)->nullable()->default(NULL);
            $table->string('warehouser_id',120)->nullable()->default(NULL);
            $table->string('aggregator_id',120)->nullable()->default(NULL);
            $table->string('date',20)->nullable()->default(NULL);
            $table->string('day',8)->nullable()->default(NULL);
            $table->string('mon',20)->nullable()->default(NULL);
            $table->string('year', 8)->nullable()->default(NULL);
        
          
       
            $table->string('hub1',120)->nullable()->default(NULL);
            $table->string('hub2',120)->nullable()->default(NULL);
            $table->string('hub3',120)->nullable()->default(NULL);
            
      
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
        
            $table->double('proli_money',9,2)->default(0);
            $table->double('far_amt',9,2)->default(0);
            $table->double('agg_amt',9,2)->default(0);
            $table->double('war_amt',9,2)->default(0);
            $table->double('vat_amt',9,2)->default(0);
            $table->double('isp_amt',9,2)->default(0);
            $table->double('log_amt',9,2)->default(0);
            $table->double('proli_amt',9,2)->default(0);
            $table->double('item_fraction',9,2)->default(0);
            $table->double('handling_cost',9,2)->default(0);



            




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
        Schema::dropIfExists('partner_settlement');
    }
}
