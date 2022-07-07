<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShopSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {     if(Schema::hasTable('shop_sales')) return; 
        Schema::create('shop_sales', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('customer_id',50)->nullable()->default(NULL);
            $table->string('cate_id',50)->nullable()->default(NULL);
            $table->string('subcat_id',120)->nullable()->default(NULL);
            
            $table->double('mass',12,2)->default(0);
            $table->string('unit',12)->default(NULL);
            $table->double('price',12,2)->default(0);
            $table->string('tdate',20)->nullable()->default(NULL);
            $table->string('tmonth',20)->nullable()->default(NULL);

            $table->string('year',20)->nullable()->default(NULL);
            $table->string('country_id',20)->nullable()->default(NULL);
            $table->string('country',20)->nullable()->default(NULL);
            $table->string('state_id',20)->nullable()->default(NULL);
            $table->string('state',20)->nullable()->default(NULL);
            $table->string('city_id',20)->nullable()->default(NULL);
            $table->string('city',20)->nullable()->default(NULL);
            $table->string('tpay_code',120)->nullable()->default(NULL);
            $table->string('status',20)->nullable()->default(NULL);
            $table->string('tid',20)->nullable()->default(NULL);
            $table->string('item_id',20)->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_sales');
    }
}
