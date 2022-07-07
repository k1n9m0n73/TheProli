<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*

*/
    public function up()
    {  

        if(Schema::hasTable('customers')) return;  
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('user_id')->nullable()->default(NULL); 
            $table->string('tittle')->nullable()->default(NULL);
            $table->string('fn')->nullable()->default(NULL);
            $table->string('ge')->nullable()->default(NULL);
            $table->string('db')->nullable()->default(NULL);
            $table->string('ln')->nullable()->default(NULL);
            $table->string('collector_fn')->nullable()->default(NULL);
            $table->string('collector_ln')->nullable()->default(NULL);
            $table->string('email')->unique()->nullable()->default(NULL);
            $table->string('password')->nullable()->default(NULL);
            $table->string("remember_token")->nullable()->default(NULL);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('salt')->nullable()->default(NULL);
            $table->text('r_address')->nullable()->default(NULL);
            $table->string('r_city')->nullable()->default(NULL);
            $table->string('r_city_id')->nullable()->default(NULL);
            $table->string('r_state')->nullable()->default(NULL);
            $table->string('r_state_id')->nullable()->default(NULL);
            $table->string('r_area')->nullable()->default(NULL);
            $table->string('r_area_id')->nullable()->default(NULL);
            $table->string('r_clat')->nullable()->default(NULL);
            $table->string('r_clon')->nullable()->default(NULL);
            $table->double('r_lat',9,7)->default(NULL);
            $table->double('r_lon',9,7)->default(NULL);
            $table->longtext('address')->nullable()->default(NULL);
            $table->string('city')->nullable()->default(NULL);
            $table->string('city_id')->nullable()->default(NULL);
            $table->string('state')->nullable()->default(NULL);
            $table->string('state_id')->nullable()->default(NULL);
            $table->string('area')->nullable()->default(NULL);
            $table->string('area_id')->nullable()->default(NULL);
            $table->double('clat',9,7)->default(NULL);
            $table->double('clon',9,7)->default(NULL);

            $table->string('lat')->nullable()->default(NULL);
            $table->string('lon')->nullable()->default(NULL);
            $table->string('r_zone_id',120)->nullable()->default(NULL);
            $table->string('zone_id',120)->nullable()->default(NULL);
            $table->string('r_zone',120)->nullable()->default(NULL);
            $table->string('zone',120)->nullable()->default(NULL);
            $table->string('zipcode')->nullable()->default(NULL);
            $table->string('hash')->nullable()->default(NULL);
            $table->string('telephone',30)->nullable()->default(NULL);
            $table->string('telephone2',30)->nullable()->default(NULL);
            $table->string('collector_telephone')->nullable()->default(NULL);
            $table->string('collector_telephone2')->nullable()->default(NULL);
            $table->string('joined')->nullable()->default(NULL);
            $table->string('year')->nullable()->default(NULL);
            $table->integer('docconf')->default(1);
            $table->string('img')->nullable()->default(NULL);
            $table->string('date')->nullable()->default(NULL);
            $table->string('log')->nullable()->default(NULL);
            $table->string('is_login')->nullable()->default(NULL);
            $table->string('time')->nullable()->default(NULL);
            $table->string('token')->nullable()->default(NULL);
            $table->string('tid')->nullable()->default(NULL);
            $table->string('pay_code')->nullable()->default(NULL);
            $table->string('event_time')->nullable()->default(NULL);
            $table->longtext('cart')->nullable()->default(NULL);
            $table->longtext('checkout_item')->nullable()->default(NULL);


            $table->timestamps();
        });
    } 
 
 

    

    // `time` varchar(40) DEFAULT NULL,
    // `token` varchar(220) DEFAULT NULL,
    // `tid` varchar(200) DEFAULT NULL,
  

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
//php artisan make:migration create-customer-table --create="customers"