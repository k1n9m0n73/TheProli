<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddressBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {     if(Schema::hasTable('address_book')) return; 
        Schema::create('address_book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cid',150);
            $table->string('data_id',150)->nullable()->default(NULL);
            $table->string('collector_fn',120)->nullable()->default(NULL);
            $table->string('collector_ln',120)->nullable()->default(NULL);
            $table->string('collector_area',120)->nullable()->default(NULL);
            $table->string('collector_city',70)->nullable()->default(NULL);
            $table->string('collector_state',40)->nullable()->default(NULL);
            $table->string('collector_state_id',120)->nullable()->default(NULL);
            $table->string('collector_zone_id',120)->nullable()->default(NULL);

            $table->double('collector_lat',19,9)->default(0);
            $table->double('collector_lon',19,9)->default(0);

            $table->string('collector_telephone1',20)->nullable()->default(NULL);
            $table->string('collector_telephone2',20)->nullable()->default(NULL);
            $table->string('collector_address',120)->nullable()->default(NULL);
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
        Schema::dropIfExists('address_book');
    }
}
