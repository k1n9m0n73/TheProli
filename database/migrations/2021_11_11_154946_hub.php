<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hub extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('hubs')) return;  
        Schema::create('hubs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable()->default(NULL);
          
            $table->string('fn',60)->nullable()->default(NULL);
            $table->string('mn',60)->nullable()->default(NULL);
            $table->string('ln',60)->nullable()->default(NULL);
            $table->string('ge',20)->nullable()->default(NULL);
            $table->string('ag',20)->nullable()->default(NULL);
            $table->string('zone_id',220)->nullable()->default(NULL);
            $table->string('state',220)->nullable()->default(NULL);
            $table->string('state_id',220)->nullable()->default(NULL);
            $table->string('state_name',220)->nullable()->default(NULL);

            $table->string('lga',220)->nullable()->default(NULL);
            $table->string('lga_id',220)->nullable()->default(NULL);
            $table->string('lga_name',220)->nullable()->default(NULL);
        
            $table->string('area_name',220)->nullable()->default(NULL);
            $table->double('lon',12,10)->default(0);
            $table->double('lat',12,10)->default(0);
            $table->string('ad',220)->nullable()->default(NULL);
            $table->string('pn',20)->nullable()->default(NULL);
            $table->string('opn',20)->nullable()->default(NULL);
            $table->string('tk',120)->nullable()->default(NULL);
            $table->string('email',220)->nullable()->default(NULL);
            $table->string('password',191)->nullable()->default(NULL);
            $table->string('remember_token',191)->nullable()->default(NULL);
            $table->string('img')->nullable()->default(NULL);
            $table->string('log')->nullable()->default(NULL);
            $table->string('keys_',120)->nullable()->default(NULL);
            $table->string('bfn',60)->nullable()->default(NULL);
            $table->string('bln',60)->nullable()->default(NULL);
            $table->string('bn',60)->nullable()->default(NULL);
            $table->string('accnum',60)->nullable()->default(NULL);
            $table->string('status')->nullable()->default(NULL);
            $table->string('is_login')->nullable()->default(NULL);
            $table->string('joined')->nullable()->default(NULL);
            $table->string('event_time',60)->nullable()->default(NULL);
            $table->string('year')->nullable()->default(NULL);
            $table->string('ava',60)->nullable()->default(NULL);
            $table->integer('docconf')->default(1);
            
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
        Schema::dropIfExists('hubs');
    }
}
