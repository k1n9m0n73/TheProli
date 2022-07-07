<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class ItemSubcategory extends Migration
{


    public function defaultData(){
        return   $item_subcategory = array(
            array('id' => '42','category_id' => 'iNOM0SuJ','subcategory_id' => 'rqCSX0WfypjaGYALzRJD','subcategory_name' => 'corn'),
            array('id' => '43','category_id' => 'iNOM0SuJ','subcategory_id' => 'kKXRYOMHGvfynie1bt6N','subcategory_name' => 'rice'),
            array('id' => '44','category_id' => 'iNOM0SuJ','subcategory_id' => 'yP03gr84kfDWnjKxuTUY','subcategory_name' => 'millet'),
            array('id' => '45','category_id' => 'iNOM0SuJ','subcategory_id' => 'hBTXxS1mSUdKrfuQvP53','subcategory_name' => 'wheat'),
            array('id' => '52','category_id' => 'DyOqxeIM','subcategory_id' => 'j24ME5aJXCdeOUPNzV6y','subcategory_name' => 'cattle'),
            array('id' => '58','category_id' => 'mG3huSN8','subcategory_id' => '2HijhLp9y3WwMgblNRs7','subcategory_name' => 'cocoa'),
            array('id' => '60','category_id' => 'X2ID3hJM','subcategory_id' => 'XsLqOyBmEwdFYRlCGSP8','subcategory_name' => 'red oil'),
            array('id' => '61','category_id' => 'X2ID3hJM','subcategory_id' => '1CEHlygftPwAnoa9pS0Y','subcategory_name' => 'white oil'),
            array('id' => '62','category_id' => '0beAgUsv','subcategory_id' => 'EtQSsXlbx1nHrad6f7Ue','subcategory_name' => 'fowl'),
            array('id' => '63','category_id' => '0beAgUsv','subcategory_id' => 'cQEbXRIiaF4f30DyxA8z','subcategory_name' => 'browler'),
            array('id' => '66','category_id' => '3n4hSco1','subcategory_id' => 'zouyFkEx57hGSQt40gsl','subcategory_name' => 'milk'),
            array('id' => '68','category_id' => 'uhGfQKrg','subcategory_id' => '2lWgs49FvDCyirjAn5MH','subcategory_name' => 'grape'),
            array('id' => '69','category_id' => 'uhGfQKrg','subcategory_id' => 'Vuh08M4qtrHUy26YKPpi','subcategory_name' => 'orange'),
            array('id' => '72','category_id' => 'DyOqxeIM','subcategory_id' => 'DBojhEWYGi65uk7Ha8yc','subcategory_name' => 'goat'),
            array('id' => '74','category_id' => '3n4hSco1','subcategory_id' => 'mk09TpAaHFItxdg51wGi','subcategory_name' => 'cheese'),
            array('id' => '77','category_id' => 'mG3huSN8','subcategory_id' => 'eWiIJ4l6uLKYSszq8pEV','subcategory_name' => 'palm kernel'),
            array('id' => '78','category_id' => 'mG3huSN8','subcategory_id' => 'OxqbEd346XLkUtNlwnVj','subcategory_name' => 'kola nut'),
            array('id' => '79','category_id' => 'mG3huSN8','subcategory_id' => '3sHuTztfevRD79Fh6LBX','subcategory_name' => 'bitter kola'),
            array('id' => '85','category_id' => 'uhGfQKrg','subcategory_id' => 'OLBxCusSdib2JDfXP3eU','subcategory_name' => 'apple'),
            array('id' => '86','category_id' => 'uhGfQKrg','subcategory_id' => '3vlyDWzAKabjmfpLNYMo','subcategory_name' => 'pineapple'),
            array('id' => '87','category_id' => 'uhGfQKrg','subcategory_id' => '9wUg1sqTtQYG2b6WmVnC','subcategory_name' => 'water melon'),
            array('id' => '88','category_id' => 'uhGfQKrg','subcategory_id' => 'f8gh2mL35BxWboTSa4jM','subcategory_name' => 'pawpaw'),
            array('id' => '90','category_id' => '3n4hsco1','subcategory_id' => '1AtsXj50WM9bi4vGSfYz','subcategory_name' => 'yogurt'),
            array('id' => '91','category_id' => 'dyoqxeim','subcategory_id' => 'q8jrvECawVFDc7L091ib','subcategory_name' => 'sheep'),
            array('id' => '92','category_id' => 'dyoqxeim','subcategory_id' => 'estKAIfEvVmSONRpYxPj','subcategory_name' => 'pig'),
            array('id' => '93','category_id' => '0beagusv','subcategory_id' => 'PWmjtTbazUC9vcEJrK1o','subcategory_name' => 'duck'),
            array('id' => '94','category_id' => '0beagusv','subcategory_id' => 'KOhDcytYFbA4P8dW2TjR','subcategory_name' => 'guinea fowl'),
            array('id' => '95','category_id' => '0beagusv','subcategory_id' => 'hrCtmTg0qdX9LEDP4Apu','subcategory_name' => 'turkey'),
            array('id' => '96','category_id' => 'cXYnlzmi2oJy','subcategory_id' => '59uLnSBCXwTV6YRatrzk','subcategory_name' => 'fish'),
            array('id' => '97','category_id' => 'cXYnlzmi2oJy','subcategory_id' => 'm1AzM8Lc7WNDubrv3HJI','subcategory_name' => 'snail'),
            array('id' => '98','category_id' => 'cXYnlzmi2oJy','subcategory_id' => 'syuKVIC36MzLq9BJv4Q8','subcategory_name' => 'crab'),
            array('id' => '99','category_id' => '0beagusv','subcategory_id' => 'Q8jcgV1zmpDnyAtqJFTs','subcategory_name' => 'egg'),
            array('id' => '100','category_id' => 'uhgfqkrg','subcategory_id' => 'HcvaNO36MgRGr12DYj4J','subcategory_name' => 'garden egg'),
            array('id' => '101','category_id' => '8BqzE4tWji9X','subcategory_id' => 'e65jyOPHTFa7t3J8XSpg','subcategory_name' => 'papper'),
            array('id' => '102','category_id' => '8BqzE4tWji9X','subcategory_id' => 'kQd3OiaX8TnfAwypmqEx','subcategory_name' => 'gallic'),
            array('id' => '103','category_id' => '8BqzE4tWji9X','subcategory_id' => 'foBIAD8RlpcPEXN2qsLU','subcategory_name' => 'ginger'),
            array('id' => '104','category_id' => '8BqzE4tWji9X','subcategory_id' => 'rLSxUSjC37GeO4ynbvPm','subcategory_name' => 'onions'),
            array('id' => '105','category_id' => '9eK1tx4GJBoS','subcategory_id' => '0MAnt2geqi1yz7mOCN36','subcategory_name' => 'yam'),
            array('id' => '106','category_id' => '9eK1tx4GJBoS','subcategory_id' => 'kF6tPHg4JIKcYBsROwdQ','subcategory_name' => 'potatoes'),
            array('id' => '107','category_id' => '9eK1tx4GJBoS','subcategory_id' => 'WPhVRD7eLKJo2Fg84SU3','subcategory_name' => 'cassava'),
            array('id' => '108','category_id' => '9eK1tx4GJBoS','subcategory_id' => 'hScQYfn573mFMvSH0o4A','subcategory_name' => 'cocoa yam'),
            array('id' => '109','category_id' => '8hC6IY0sLvHz','subcategory_id' => 'IOaAD6dEKiGyhFuw1brt','subcategory_name' => 'fluted pupkin'),
            array('id' => '110','category_id' => '8hC6IY0sLvHz','subcategory_id' => '1n9FvqjdyRBSA4Dzbc6W','subcategory_name' => 'spinach'),
            array('id' => '111','category_id' => '8hC6IY0sLvHz','subcategory_id' => '17lisv3Aa956kzwOeb4Q','subcategory_name' => 'jute leave'),
            array('id' => '112','category_id' => '8hC6IY0sLvHz','subcategory_id' => 'sixwzKafc1uoH3Fp06Tm','subcategory_name' => 'water leave'),
            array('id' => '113','category_id' => '8hC6IY0sLvHz','subcategory_id' => '3JgS1uVoSBwMKxeFPCrL','subcategory_name' => 'green'),
            array('id' => '115','category_id' => 'inom0suj','subcategory_id' => 'NSYSExlOFPyGMciQ8mJb','subcategory_name' => 'oats'),
            array('id' => '116','category_id' => 'inom0suj','subcategory_id' => 'YpTgnNWbSCu8LOs17Kox','subcategory_name' => ' rye'),
            array('id' => '117','category_id' => 'inom0suj','subcategory_id' => 'zPCLhHj2WxwukB13mDXA','subcategory_name' => 'beans'),
            array('id' => '118','category_id' => 'mg3husn8','subcategory_id' => 'DX2RKwHOpEuqTdx94oga','subcategory_name' => 'groundnut'),
            array('id' => '119','category_id' => 'mg3husn8','subcategory_id' => 'XuLsTijNIeRQpxUCkSvF','subcategory_name' => 'cashew'),
            array('id' => '120','category_id' => 'mg3husn8','subcategory_id' => 'bR96i10rWQNCzKS2X4Y8','subcategory_name' => 'almond'),
            array('id' => '121','category_id' => 'mg3husn8','subcategory_id' => 'id9BXeYTOJxzohw2WaRg','subcategory_name' => 'walnut'),
            array('id' => '122','category_id' => 'mg3husn8','subcategory_id' => 'jzyTD8uSqm5JNRtFXcfx','subcategory_name' => 'pistachio'),
            array('id' => '123','category_id' => 'mg3husn8','subcategory_id' => 'TO0x9E6qGtnromBNCIf7','subcategory_name' => 'hazelnut'),
            array('id' => '124','category_id' => 'LP5cWb0oe9Jj','subcategory_id' => 'DP4Ry9VXsFJSjQT6ac5h','subcategory_name' => 'tea')
          );
    }
    public  function insertData():bool{
      
          
        try {
            DB::table('item_subcategory')->insert($this->defaultData());
            return true;
        } catch (\Throwable $th) {
            return false;
            //throw $th;
        }
     }  
    /**
     * Run the migrations.
     *
     * @return void
     */

 
    public function up()
    {   if(Schema::hasTable('item_subcategory')) return;  
        Schema::create('item_subcategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_id',64)->default(NULL);
            $table->string('subcategory_id',120)->default(NULL);
            $table->string('subcategory_name',64)->default(NULL);
        });

        $this->insertData();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_subcategory');
    }
}
