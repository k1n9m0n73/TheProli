<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class ItemCategory extends Migration
{

    
    
   private function defaultData():array {

    $item_category = array(
        array('id' => '14','category_id' => '3n4hSco1','category_name' => 'dairies','category_img' => 'usage/images/cat-icon/nOX1scP6d29w.png'),
        array('id' => '17','category_id' => 'uhGfQKrg','category_name' => 'fruits','category_img' => 'usage/images/cat-icon/uX9FT54gk2dD.png'),
        array('id' => '19','category_id' => 'iNOM0SuJ','category_name' => 'grains','category_img' => 'usage/images/cat-icon/nOX1scP6d29w.png'),
        array('id' => '21','category_id' => 'DyOqxeIM','category_name' => 'livestock','category_img' => 'usage/images/cat-icon/uX9FT54gk2dD.png'),
        array('id' => '23','category_id' => 'mG3huSN8','category_name' => 'nuts','category_img' => 'usage/images/cat-icon/TVHbaonRSA2J.png'),
        array('id' => '24','category_id' => 'X2ID3hJM','category_name' => 'oil','category_img' => 'usage/images/cat-icon/4REe9SIaq02w.png'),
        array('id' => '25','category_id' => '0beAgUsv','category_name' => 'poultry','category_img' => 'usage/images/cat-icon/9dn3F2G60a0u.png'),
        array('id' => '26','category_id' => 'cXYnlzmi2oJy','category_name' => 'fisheries &amp; sea foods','category_img' => 'usage/images/cat-icon/HS39wjDdn7fh.png'),
        array('id' => '27','category_id' => '8BqzE4tWji9X','category_name' => 'spices','category_img' => 'usage/images/cat-icon/1Yf025iconao.png'),
        array('id' => '28','category_id' => '9eK1tx4GJBoS','category_name' => 'tubers','category_img' => 'usage/images/cat-icon/6S9jne922j7i.png'),
        array('id' => '29','category_id' => '8hC6IY0sLvHz','category_name' => 'vegetable','category_img' => 'usage/images/cat-icon/cjk5d2KPV9dr.png'),
        array('id' => '30','category_id' => 'LP5cWb0oe9Jj','category_name' => 'beverage','category_img' => 'usage/images/cat-icon/Ia3fn9TV0jRd.png')
      );

      return $item_category;
   }

   public  function insertData():bool{
    try {
        DB::table('item_category')->insert($this->defaultData());
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
    {   if(Schema::hasTable('item_category')) return;  
        Schema::create('item_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_id',64)->default(NULL);
            $table->string('category_name',120)->default(NULL);
            $table->string('category_img',64)->default(NULL);
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
        Schema::dropIfExists('item_category');
    }
}
