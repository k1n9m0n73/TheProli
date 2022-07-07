<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CreateAdminsTable extends Migration
{

 
       public  function insertData(){
 $d = '{"role_perm":"{\"pset__allow_to_add_category_and_subcategory\":\"1\",\"pset__allow_to_edit_category_and_subcategory\":\"1\",\"pset__allow_to_delete_category_and_subcategory\":\"1\",\"pset__allow_to_add_item_type\":\"1\",\"pset__allow_to_edit_item_type\":\"1\",\"pset__allow_to_delete_item_type\":\"1\",\"pset__allow_to_view_item_type\":\"1\",\"pset__allow_to_add_location\":\"1\",\"pset__allow_to_edit_location\":\"1\",\"pset__allow_to_delete_location\":\"1\",\"pset__allow_to_view_location\":\"1\",\"pset__allow_to_update_location_coordinate\":\"1\",\"pset__allow_to_add_hub\":\"1\",\"pset__allow_to_edit_hub\":\"1\",\"pset__allow_to_delete_hub\":\"1\",\"pset__allow_to_view_hub\":\"1\",\"pset__allow_to_edit_product_upload_settings\":\"1\",\"pset__allow_to_view_product_upload_settings\":\"1\",\"pset__allow_to_add_roles\":\"1\",\"pset__allow_to_edit_roles\":\"1\",\"pset__allow_to_delete_roles\":\"1\",\"pset__allow_to_view_roles\":\"1\",\"pset__allow_to_set_roles\":\"1\",\"pset__allow_to_set_permission\":\"1\",\"ppar__allow_to_edit_admin\":\"1\",\"ppar__allow_to_delete_admin\":\"1\",\"ppar__allow_to_view_admin\":\"1\",\"ppar__allow_to_set_admin_permission\":\"1\",\"ppar__allow_to_set_admin_role\":\"1\",\"ppar__allow_to_edit_aggregator\":\"1\",\"ppar__allow_to_delete_aggregator\":\"1\",\"ppar__allow_to_view_aggregator\":\"1\",\"ppar__allow_to_edit_farmer\":\"1\",\"ppar__allow_to_delete_farmer\":\"1\",\"ppar__allow_to_view_farmer\":\"1\",\"ppar__allow_to_edit_warehouse\":\"1\",\"ppar__allow_to_delete_warehouse\":\"1\",\"ppar__allow_to_view_warehouse\":\"1\",\"ppar__allow_to_edit_logistics\":\"1\",\"ppar__allow_to_delete_logistics\":\"1\",\"ppar__allow_to_view_logistics\":\"1\",\"ppar__allow_to_delete_customer\":\"1\",\"ppar__allow_to_view_customer\":\"1\",\"ppar__allow_to_edit_customer\":\"1\",\"ppar__allow_to_add_hub\":\"1\",\"ppar__allow_to_view_hub\":\"1\",\"ppar__allow_to_edit_hub\":\"1\",\"ppar__allow_to_delete_hub\":\"1\",\"papp__allow_to_approve_admin\":\"1\",\"papp__allow_to_approve_aggregator\":\"1\",\"papp__allow_to_approve_farmer\":\"1\",\"papp__allow_to_approve_logistics\":\"1\",\"papp__allow_to_approve_warehouse\":\"1\",\"ppro__allow_to_view_product_uplaod_code\":\"1\",\"ppro__allow_to_view_awaiting_product\":\"1\",\"ppro__allow_to_view_approved_product\":\"1\",\"ppro__allow_to_view_expired_product\":\"1\",\"ppro__allow_to_view_deal_product\":\"1\",\"ppro__allow_to_view_all_product\":\"1\",\"ppro__allow_to_delete_product\":\"1\",\"ppro__allow_to_view_product_details\":\"1\",\"ppro__allow_to_edit_product\":\"1\",\"ppro__allow_to_approve_product\":\"1\",\"pord__allow_to_view_order\":\"1\",\"pord__allow_to_view_rejected_order\":\"1\",\"pord__allow_to_view_return_order\":\"1\",\"pord__allow_to_cancel_order\":\"1\",\"pord__allow_to_view_details\":\"1\",\"psal__allow_add_marketing\":\"1\",\"psal__allow_edit_marketing\":\"1\",\"psal__allow_delete_marketing\":\"1\",\"psal__allow_view_marketing\":\"1\",\"pana__allow_to_view_product_analytic\":\"1\",\"pana__allow_to_view_order_analytic\":\"1\",\"pana__allow_to_view_product_owner_trasaction\":\"1\",\"pana__allow_to_view_sales_trasaction\":\"1\",\"pana__allow_to_view_event_log_analytics\":\"1\",\"pana__allow_to_view_finance_analytics\":\"1\",\"pana__allow_to_view_logistics_trasaction\":\"1\",\"pSet__allow_to_view_logistics1_settlement\":\"1\",\"pSet__allow_to_view_logistics2_settlement\":\"1\",\"pSet__allow_to_view_logistics3_settlement\":\"1\",\"pSet__allow_to_view_logistics4_settlement\":\"1\",\"pSet__allow_to_view_product_owner_settlement\":\"1\",\"pSet__allow_to_view_uploader(aggregator)_settlement\":\"1\",\"pSet__allow_to_view_storage(warehouse)_settlement\":\"1\",\"pSet__allow_to_view_vat_settlement\":\"1\",\"pSet__allow_to_view_insurance_settlement\":\"1\",\"pSet__allow_to_view_hub1_settlement\":\"1\",\"pSet__allow_to_view_hub2_settlement\":\"1\",\"preg__allow_to_add_partner_requirement\":\"1\",\"preg__allow_to_edit_partner_requirement\":\"1\",\"preg__allow_to_delete_partner_requirement\":\"1\",\"preg__allow_to_view_partner_requirement\":\"1\",\"pcod__allow_to_generate_code\":\"1\"}","role_resp":"[\"%3Cp%3Edgfghghg%20gfhghghgs%20gh%20gh%26nbsp%3B%20gdhehet%20grgretrtrtrtrr%20rrtrrt%3C\\\/p%3E\"]","add_by":"Blessing Obidie","add_on":1643730131}';

  $admins = array(
  
    
            'user_id' => 'yptdnu3cLfmoi6GWTwK74HFNhBRxeIajV5M01zCO_admin',
            'fn' => 'Adio',
            'mn' => 'Azeez',
            'ln' => 'Adeyori',
            'conf'=>1,
            'docconf'=>1,
            'perm' =>$d,
            'pn' => '+234 806 437 4020',
            'email' => 'adioadeyoriazeez@yahoo.com',
            'password' => Hash::make("123456"),
      );
       
      try {
      
          DB::table('admins')->insert($admins);
      } catch (\Exception $th) {
      
      }
     }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        if(Schema::hasTable('admins')) return;  
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable()->default(NULL);
            $table->string('fn',60)->nullable()->default(NULL);
            $table->string('mn',60)->nullable()->default(NULL);
            $table->string('ln',60)->nullable()->default(NULL);
            $table->string('ge',20)->nullable()->default(NULL);
            $table->string('ag',20)->nullable()->default(NULL);
            $table->string('ad',220)->nullable()->default(NULL);
            $table->string('st',30)->nullable()->default(NULL);
            $table->string('re',60)->nullable()->default(NULL);
            $table->string('area',120)->nullable()->default(NULL);
            $table->string('tk',120)->nullable()->default(NULL);
            $table->string('pn',20)->nullable()->default(NULL);
            $table->string('email',220)->nullable()->default(NULL);
            $table->string('password',191)->nullable()->default(NULL);
            $table->string('remember_token',191)->nullable()->default(NULL);
            $table->string('quali')->nullable()->default(NULL);
            $table->string('quali2')->nullable()->default(NULL);
            $table->string('sn')->nullable()->default(NULL);
            $table->string('img')->nullable()->default(NULL);
            $table->string('de')->nullable()->default(NULL);
            $table->string('log')->nullable()->default(NULL);
            $table->longtext('perm')->nullable()->default(NULL);
            $table->string('about')->nullable()->default(NULL);
            $table->integer('conf')->default(0);
            $table->integer('docconf')->default(0);
            $table->string('confd')->nullable()->default(NULL);
            $table->string('appby')->nullable()->default(NULL);
            $table->string('cvimg')->nullable()->default(NULL);
            $table->string('certimg')->nullable()->default(NULL);
            $table->string('idimg')->nullable()->default(NULL);
            $table->string('ppw')->nullable()->default(NULL);
            $table->string('rep')->nullable()->default(NULL);
            $table->string('bkid')->nullable()->default(NULL);
            $table->string('ye')->nullable()->default(NULL);
            $table->string('pe')->nullable()->default(NULL);
            $table->string('sec')->nullable()->default(NULL);
            $table->string('ter')->nullable()->default(NULL);
            $table->string('status')->nullable()->default(NULL);
            $table->string('is_login')->nullable()->default(NULL);
            $table->string('joined')->nullable()->default(NULL);
            $table->string('year')->nullable()->default(NULL);
            $table->string('role')->nullable()->default(NULL);
            // $table->string('city')->nullable()->default(NULL);
            // $table->string('state')->nullable()->default(NULL);
            // $table->string('country')->nullable()->default(NULL);
            $table->timestamps();

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
        Schema::dropIfExists('admin');
    }
}
