<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ShopContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    if(Schema::hasTable('store_contact')) return; 
        Schema::create('store_contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('em',120)->nullable()->default(NULL);
            $table->string('pn',20)->nullable()->default(NULL);
            $table->string('pn2',20)->nullable()->default(NULL);
            $table->string('em2',120)->nullable()->default(NULL);
            $table->timestamps();
        });

        $data  = 
        [
            'pn'=>'+234 818 785 9308',
            'em'=>'theprolishop@gmail.com'
    ];
    DB::table('store_contact')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_contact');
    }
}
