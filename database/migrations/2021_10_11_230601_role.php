<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class Role extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   if(Schema::hasTable('roles')) return; 
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role_id',200)->nullable()->default(NULL);
            $table->string('role_name',120)->nullable()->default(NULL);
            $table->longtext('role_perm')->nullable()->default(NULL);
            $table->string('add_on',120)->nullable()->default(NULL);
            $table->string('add_by',120)->nullable()->default(NULL);
            $table->string('updated_by',120)->nullable()->default(NULL);
            $table->longtext('role_resp')->nullable()->default(NULL);
        });

        $perm2 = <<<PERM
{"pset__allow_to_add_category_and_subcategory":"1","pset__allow_to_edit_category_and_subcategory":"1","pset__allow_to_delete_category_and_subcategory":"1","pset__allow_to_add_item_type":"1","pset__allow_to_edit_item_type":"1","pset__allow_to_delete_item_type":"1","pset__allow_to_view_item_type":"1","pset__allow_to_add_location":"1","pset__allow_to_edit_location":"1","pset__allow_to_delete_location":"1","pset__allow_to_view_location":"1","pset__allow_to_update_location_coordinate":"1","pset__allow_to_add_hub":"1","pset__allow_to_edit_hub":"1","pset__allow_to_delete_hub":"1","pset__allow_to_view_hub":"1","pset__allow_to_edit_product_upload_settings":"1","pset__allow_to_view_product_upload_settings":"1","pset__allow_to_add_roles":"1","pset__allow_to_edit_roles":"1","pset__allow_to_delete_roles":"1","pset__allow_to_view_roles":"1","pset__allow_to_set_roles":"1","pset__allow_to_set_permission":"1","ppar__allow_to_edit_admin":"1","ppar__allow_to_delete_admin":"1","ppar__allow_to_view_admin":"1","ppar__allow_to_set_admin_permission":"1","ppar__allow_to_set_admin_role":"1","ppar__allow_to_edit_aggregator":"1","ppar__allow_to_delete_aggregator":"1","ppar__allow_to_view_aggregator":"1","ppar__allow_to_edit_farmer":"1","ppar__allow_to_delete_farmer":"1","ppar__allow_to_view_farmer":"1","ppar__allow_to_edit_warehouse":"1","ppar__allow_to_delete_warehouse":"1","ppar__allow_to_view_warehouse":"1","ppar__allow_to_edit_logistics":"1","ppar__allow_to_delete_logistics":"1","ppar__allow_to_view_logistics":"1","ppar__allow_to_delete_customer":"1","ppar__allow_to_view_customer":"1","ppar__allow_to_edit_customer":"1","ppar__allow_to_add_hub":"1","ppar__allow_to_view_hub":"1","ppar__allow_to_edit_hub":"1","ppar__allow_to_delete_hub":"1","papp__allow_to_approve_admin":"1","papp__allow_to_approve_aggregator":"1","papp__allow_to_approve_farmer":"1","papp__allow_to_approve_logistics":"1","papp__allow_to_approve_warehouse":"1","ppro__allow_to_view_product_uplaod_code":"1","ppro__allow_to_view_awaiting_product":"1","ppro__allow_to_view_approved_product":"1","ppro__allow_to_view_expired_product":"1","ppro__allow_to_view_deal_product":"1","ppro__allow_to_view_all_product":"1","ppro__allow_to_delete_product":"1","ppro__allow_to_view_product_details":"1","ppro__allow_to_edit_product":"1","ppro__allow_to_approve_product":"1","pord__allow_to_view_order":"1","pord__allow_to_view_rejected_order":"1","pord__allow_to_view_return_order":"1","pord__allow_to_cancel_order":"1","pord__allow_to_view_details":"1","psal__allow_add_marketing":"1","psal__allow_edit_marketing":"1","psal__allow_delete_marketing":"1","psal__allow_view_marketing":"1","pana__allow_to_view_product_analytic":"1","pana__allow_to_view_order_analytic":"1","pana__allow_to_view_product_owner_trasaction":"1","pana__allow_to_view_sales_trasaction":"1","pana__allow_to_view_event_log_analytics":"1","pana__allow_to_view_finance_analytics":"1","pana__allow_to_view_logistics_trasaction":"1","pSet__allow_to_view_logistics1_settlement":"1","pSet__allow_to_view_logistics2_settlement":"1","pSet__allow_to_view_logistics3_settlement":"1","pSet__allow_to_view_logistics4_settlement":"1","pSet__allow_to_view_product_owner_settlement":"1","pSet__allow_to_view_uploader(aggregator)_settlement":"1","pSet__allow_to_view_storage(warehouse)_settlement":"1","pSet__allow_to_view_vat_settlement":"1","pSet__allow_to_view_insurance_settlement":"1","pSet__allow_to_view_hub1_settlement":"1","pSet__allow_to_view_hub2_settlement":"1","preg__allow_to_add_partner_requirement":"1","preg__allow_to_edit_partner_requirement":"1","preg__allow_to_delete_partner_requirement":"1","preg__allow_to_view_partner_requirement":"1","pcod__allow_to_generate_code":"1"}
PERM;  

DB::table('admins')->update(['role'=>'pymwgPMHA3UNLBsdOJ0V']);

DB::table('roles')->insert([
'role_id'=>'pymwgPMHA3UNLBsdOJ0V',
'role_name'=>'superuser',
'role_perm' =>$perm2,

]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
