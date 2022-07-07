<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Warehouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('warehouses')) return;  
        Schema::create('warehouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable()->default(NULL);
            $table->string('bn',60)->nullable()->default(NULL);
            $table->string('bty',60)->nullable()->default(NULL);
            // $table->string('fn',60)->nullable()->default(NULL);
            // $table->string('mn',60)->nullable()->default(NULL);
            // $table->string('ln',60)->nullable()->default(NULL);
            $table->string('zone_id',120)->nullable()->default(NULL);
            $table->string('zone',120)->nullable()->default(NULL);
             $table->text('so')->nullable()->default(NULL);
             $table->text('po')->nullable()->default(NULL);
            $table->string('cap',220)->nullable()->default(NULL);
            $table->string('ad',220)->nullable()->default(NULL);
            $table->string('st',30)->nullable()->default(NULL);
            $table->text('re')->nullable()->default(NULL);
            $table->string('st_id',120)->nullable()->default(NULL);
            $table->string('re_id',120)->nullable()->default(NULL);
            $table->text('sz')->nullable()->default(NULL);
            $table->string('tk',120)->nullable()->default(NULL);
            $table->string('pn',20)->nullable()->default(NULL);
            $table->string('opn',20)->nullable()->default(NULL);
            $table->string('email',220)->nullable()->default(NULL);
            $table->string('password',191)->nullable()->default(NULL);
            $table->string('remember_token',191)->nullable()->default(NULL);
           
            $table->string('sn')->nullable()->default(NULL);
            $table->string('img')->nullable()->default(NULL);
            $table->string('de')->nullable()->default(NULL);
            $table->string('log')->nullable()->default(NULL);
        
            $table->string('about')->nullable()->default(NULL);
            $table->integer('conf')->default(0);
            $table->integer('docconf')->default(0);
            $table->string('confd')->nullable()->default(NULL);
            $table->string('appby')->nullable()->default(NULL);
           
            $table->longText('documents')->nullable()->default(NULL);
            $table->longText('guarantor')->nullable()->default(NULL);
            $table->string('status')->nullable()->default(NULL);
            $table->string('is_login')->nullable()->default(NULL);
            $table->string('joined')->nullable()->default(NULL);
            $table->string('event_time',60)->nullable()->default(NULL);
            $table->string('year')->nullable()->default(NULL);
            $table->string('ava',60)->nullable()->default(NULL);
            
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
        Schema::dropIfExists('warehouses');
    }
}
