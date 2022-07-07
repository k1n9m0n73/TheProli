<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   if(Schema::hasTable('vehicles')) return; 
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vesname',120)->nullable()->default(NULL);
            $table->string('data_id',120)->nullable()->default(NULL);
            $table->string('vestype',120)->nullable()->default(NULL);
            $table->double('vescap',8,4)->default(0);
            $table->integer('has_approve', false, true)->default(0);//grp change to has_approve
            $table->integer('delnum', false, true)->length(10)->default(0);
            $table->integer('vesava', false, true)->length(10)->default(1);
            $table->double('vesvol',8,6)->default(0);
            $table->string('veslocstate_id',120)->nullable()->default(NULL);
            $table->string('vesloczone_id',120)->nullable()->default(NULL);

            $table->text('pveslocstate_id')->nullable()->default(NULL);
            $table->text('pvesloczone_id')->nullable()->default(NULL);
            $table->text('pveslocstate')->nullable()->default(NULL);
            $table->text('pvesloczone')->nullable()->default(NULL);


            $table->text('dveslocstate_id')->nullable()->default(NULL);
            $table->text('dvesloczone_id')->nullable()->default(NULL);
            $table->text('dveslocstate')->nullable()->default(NULL);
            $table->text('dvesloczone')->nullable()->default(NULL);
            $table->longText('dvesloclga')->nullable()->default(NULL);
            $table->longText('pvesloclga')->nullable()->default(NULL);

            $table->string('veslocstate',120)->nullable()->default(NULL);
            $table->string('vesloclga',120)->nullable()->default(NULL);
            $table->string('veslocarea',120)->nullable()->default(NULL);
            $table->double('lon',12,10)->default(0);
            $table->double('lat',12,10)->default(0);
            $table->double('loadedmass',8,6)->default(0);
            $table->double('remainmass',8,6)->default(0);
            $table->text('document')->nullable()->default(NULL);
            $table->string('log_id',120)->nullable()->default(NULL);
            $table->string('log_type_text',120)->nullable()->default(NULL);
            $table->integer('log_type')->default(0);
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
        Schema::dropIfExists('vehicles');
    }
}
