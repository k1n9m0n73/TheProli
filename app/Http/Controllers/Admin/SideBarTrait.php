<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
trait SideBarTrait
{
    //

     
    public function __construct()
    {  
      
          $this->middleware("auth:admin");  
        
          
         $this->middleware(function ($request, $next ) {
            $this->role  = new Settings();
            $this->user= Auth::user();

            //////////////////////////////////////////////////////////////////////////////get the set user permission   

       
          return $next($request);
      });
       
     

    }


    public function permission(){
       // print_r(json_decode( Auth::user()->perm) );
         try {
            $permission  = json_decode(json_decode(Auth::user()->perm)->role_perm);

       ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    
       $set_perm = [
                                     
        property_exists($permission,'pset__allow_to_add_category_and_subcategory') && $permission->pset__allow_to_add_category_and_subcategory==1?1:0,
        property_exists($permission,'pset__allow_to_edit_category_and_subcategory') && $permission->pset__allow_to_edit_category_and_subcategory==1?1:0,
        property_exists($permission, 'pset__allow_to_delete_category_and_subcategory') && $permission->pset__allow_to_delete_category_and_subcategory==1?1:0,
        property_exists($permission,'pset__allow_to_add_item_type') && $permission->pset__allow_to_add_item_type==1?1:0,
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       
        property_exists($permission,'pset__allow_to_edit_item_type') && $permission->pset__allow_to_edit_item_type==1?1:0,
        property_exists($permission,'pset__allow_to_delete_item_type') && $permission->pset__allow_to_delete_item_type==1?1:0,
       /*6*/ property_exists($permission,'pset__allow_to_view_item_type') && $permission->pset__allow_to_view_item_type==1?1:0,
        property_exists($permission,'pset__allow_to_add_location') && $permission->pset__allow_to_add_location==1?1:0,
        ////////////////////////////////////////////////////////////////////////////////////////////////////
       
        property_exists($permission,'pset__allow_to_edit_location') && $permission->pset__allow_to_edit_location==1?1:0,
        property_exists($permission,'pset__allow_to_delete_location') && $permission->pset__allow_to_delete_location==1?1:0,
      /*10*/  property_exists($permission,'pset__allow_to_view_location') && $permission->pset__allow_to_view_location==1?1:0,
        property_exists($permission,' pset__allow_to_update_location_coordinate') && $permission-> pset__allow_to_update_location_coordinate==1?1:0,
        //////////////////////////////////////////////////////////////////////////////////////////////////////////
        property_exists($permission,'pset__allow_to_add_hub') && $permission->pset__allow_to_add_hub==1?1:0,
        property_exists($permission,'pset__allow_to_edit_hub') && $permission->pset__allow_to_edit_hub==1?1:0,
        property_exists($permission,'pset__allow_to_delete_hub') && $permission->pset__allow_to_delete_hub==1?1:0,
      /*15*/  property_exists($permission,'pset__allow_to_view_hub') && $permission->pset__allow_to_view_hub==1?1:0,
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        property_exists($permission,'pset__allow_to_edit_product_upload_settings') && $permission->pset__allow_to_edit_product_upload_settings==1?1:0,
       /*17*/ property_exists($permission,'pset__allow_to_view_product_upload_settings') && $permission->pset__allow_to_view_product_upload_settings==1?1:0,
        property_exists($permission,'pset__allow_to_add_roles') && $permission->pset__allow_to_add_roles==1?1:0,
        property_exists($permission,'pset__allow_to_edit_roles') && $permission->pset__allow_to_edit_roles==1?1:0,
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        property_exists($permission,'pset__allow_to_delete_roles') && $permission->pset__allow_to_delete_roles==1?1:0,
       /*21*/ property_exists($permission,'pset__allow_to_view_roles') && $permission->pset__allow_to_view_roles==1?1:0,
        property_exists($permission,'pset__allow_to_add_roles') && $permission->pset__allow_to_add_roles==1?1:0,
        property_exists($permission,'pset__allow_to_set_roles') && $permission->pset__allow_to_add_roles==1?1:0,
        property_exists($permission,'pset__allow_to_set_permission') && $permission->pset__allow_to_set_permission==1?1:0,
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
       /*25*/ property_exists($permission,'pset__allow_to_view_parner_registration_requirement') && $permission->pset__allow_to_view_parner_registration_requirement==1?1:0,

    
     ];
    


    $user_perm = [
      property_exists($permission,'ppar__allow_to_edit_admin') && $permission->ppar__allow_to_edit_admin==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_admin') && $permission->ppar__allow_to_delete_admin==1?1:0,
      /*2*/property_exists($permission,'ppar__allow_to_view_admin') && $permission->ppar__allow_to_view_admin==1?1:0,
      property_exists($permission,'ppar__allow_to_set_admin_permission') && $permission->ppar__allow_to_set_admin_permission==1?1:0,
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      property_exists($permission,'ppar__allow_to_set_admin_role') && $permission->ppar__allow_to_set_admin_role==1?1:0,
      property_exists($permission,'ppar__allow_to_set_admin_role') && $permission->ppar__allow_to_set_admin_role==1?1:0,
      property_exists($permission,' ppar__allow_to_edit_aggregator') && $permission-> ppar__allow_to_edit_aggregator==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_aggregator') && $permission->ppar__allow_to_delete_aggregator==1?1:0,
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     
      /*8*/property_exists($permission,'ppar__allow_to_view_aggregator') && $permission->ppar__allow_to_view_aggregator==1?1:0,
      property_exists($permission,'ppar__allow_to_edit_farmer') && $permission->ppar__allow_to_edit_farmer==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_farmer') && $permission->ppar__allow_to_delete_farmer==1?1:0,
     /*11*/ property_exists($permission,'ppar__allow_to_view_farmer') && $permission->ppar__allow_to_view_farmer==1?1:0,
  
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      property_exists($permission,'ppar__allow_to_edit_warehouse') && $permission->ppar__allow_to_edit_warehouse==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_warehouse') && $permission->ppar__allow_to_delete_warehouse==1?1:0,
      /*14*/property_exists($permission,'ppar__allow_to_view_warehouse') && $permission->ppar__allow_to_view_warehouse==1?1:0,
      property_exists($permission,'ppar__allow_to_edit_logistics') && $permission->ppar__allow_to_edit_logistics==1?1:0,
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////

      property_exists($permission,'ppar__allow_to_delete_logistics') && $permission->ppar__allow_to_delete_logistics==1?1:0,
      /*17*/property_exists($permission,'ppar__allow_to_view_logistics') && $permission->ppar__allow_to_view_logistics==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_customer') && $permission->ppar__allow_to_delete_customer==1?1:0,
       /*19*/property_exists($permission,'ppar__allow_to_view_customer') && $permission->ppar__allow_to_view_customer==1?1:0,
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      property_exists($permission,'ppar__allow_to_edit_customer') && $permission->ppar__allow_to_edit_customer==1?1:0,
      property_exists($permission,'ppar__allow_to_add_hub') && $permission->ppar__allow_to_add_hub==1?1:0,
     /*22*/ property_exists($permission,'ppar__allow_to_view_hub') && $permission->ppar__allow_to_view_hub==1?1:0,
       property_exists($permission,'ppar__allow_to_edit_hub') && $permission->ppar__allow_to_edit_hub==1?1:0,
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////
  
      property_exists($permission,'ppar__allow_to_delete_hub') && $permission->ppar__allow_to_delete_hub==1?1:0,
     
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////
 

         ];
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
    $app_perm = [
                                     
      property_exists($permission,'papp__allow_to_approve_admin') && $permission->papp__allow_to_approve_admin==1?1:0,
      property_exists($permission,'papp__allow_to_approve_aggregator') && $permission->papp__allow_to_approve_aggregator==1?1:0,
      property_exists($permission,'papp__allow_to_approve_farmer') && $permission->papp__allow_to_approve_farmer==1?1:0,
      property_exists($permission,'papp__allow_to_approve_logistics') && $permission->papp__allow_to_approve_logistics==1?1:0,
      property_exists($permission,'papp__allow_to_approve_warehouse') && $permission->papp__allow_to_approve_warehouse==1?1:0,
     
      
   ];
    //////////////////////////////////////////////////////////////////////////////////////////////////
    
     
    $pro_perm = [
                                     
        property_exists($permission,'ppro__allow_to_view_product_uplaod_code') && $permission->ppro__allow_to_view_product_uplaod_code==1?1:0,
        property_exists($permission,'ppro__allow_to_view_awaiting_product') && $permission->ppro__allow_to_view_awaiting_product==1?1:0,
        property_exists($permission,'ppro__allow_to_view_approved_product') && $permission->ppro__allow_to_view_approved_product==1?1:0,
        property_exists($permission,'ppro__allow_to_view_expired_product') && $permission->ppro__allow_to_view_expired_product==1?1:0,
        property_exists($permission,'ppro__allow_to_view_all_product') && $permission->ppro__allow_to_view_all_product==1?1:0,
        property_exists($permission,'ppro__allow_to_view_deal_product') && $permission->ppro__allow_to_view_deal_product==1?1:0,
       
        property_exists($permission,'ppro__allow_to_view_product_details') && $permission->ppro__allow_to_view_product_details==1?1:0,
        property_exists($permission,'ppro__allow_to_delete_product') && $permission->ppro__allow_to_delete_product==1?1:0,
        property_exists($permission,'ppro__allow_to_edit_product') && $permission->ppro__allow_to_edit_product==1?1:0,
        property_exists($permission,'ppro__allow_to_approve_product') && $permission->ppro__allow_to_approve_product==1?1:0,
        
        
     ];


    
     $ord_perm = [
                                     
      property_exists($permission,'pord__allow_to_view_order') && $permission->pord__allow_to_view_order==1?1:0,
      property_exists($permission,'pord__allow_to_view_rejected_order') && $permission->pord__allow_to_view_rejected_order==1?1:0,
      property_exists($permission,'pord__allow_to_view_return_order') && $permission->pord__allow_to_view_return_order==1?1:0,
      property_exists($permission,'pord__allow_to_cancel_order') && $permission->pord__allow_to_cancel_order==1?1:0,
      property_exists($permission,'pord__allow_to_view_details') && $permission->pord__allow_to_view_details==1?1:0,
     // property_exists($permission,'ppro__allow_to_view_deal_product') && $permission->ppro__allow_to_view_deal_product==1?1:0,

   ];

   $sal_perm = [
                                     
    property_exists($permission,'psal__allow_add_marketing') && $permission->psal__allow_add_marketing==1?1:0,
    property_exists($permission,'psal__allow_edit_marketing') && $permission->psal__allow_edit_marketing==1?1:0,
    property_exists($permission,'psal__allow_delete_marketing') && $permission->psal__allow_delete_marketing==1?1:0,
    property_exists($permission,'psal__allow_view_marketing') && $permission->psal__allow_view_marketing==1?1:0,
   
 ];

 $ana_perm = [
                                     
  property_exists($permission,'pana__allow_to_view_product_analytic') && $permission->pana__allow_to_view_product_analytic==1?1:0,
  property_exists($permission,'pana__allow_to_view_order_analytic') && $permission->pana__allow_to_view_order_analytic==1?1:0,
  //property_exists($permission,'pana__allow_to_view_event_log_analytics') && $permission->pana__allow_to_view_event_log_analytics==1?1:0,
  property_exists($permission,'pana__allow_to_view_finance_analytics') && $permission->pana__allow_to_view_finance_analytics==1?1:0,
  property_exists($permission,'pana__allow_to_view_event_analytics') && $permission->pana__allow_to_view_event_analytics==1?1:0,
];

$settle_perm = [
  property_exists($permission,'pSet__allow_to_view_logistics1_settlement') && $permission->pSet__allow_to_view_logistics1_settlement==1?1:0,                                  
  property_exists($permission,'pSet__allow_to_view_logistics2_settlement') && $permission->pSet__allow_to_view_logistics2_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_logistics3_settlement') && $permission->pSet__allow_to_view_logistics3_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_logistics4_settlement') && $permission->pSet__allow_to_view_logistics4_settlement==1?1:0,
  /*4*/property_exists($permission,'pSet__allow_to_view_product_owner_settlement') && $permission->pSet__allow_to_view_product_owner_settlement==1?1:0,
  

  property_exists($permission,'pSet__allow_to_view_uploader_settlement') && $permission->pSet__allow_to_view_uploader_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_storage_settlement') && $permission->pSet__allow_to_view_storage_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_vat_settlement') && $permission->pSet__allow_to_view_vat_settlement==1?1:0,
  /*8*/property_exists($permission,'pSet__allow_to_view_insurance_settlement') && $permission->pSet__allow_to_view_insurance_settlement==1?1:0,
 
  property_exists($permission,'pSet__allow_to_view_hub1_settlement') && $permission->pSet__allow_to_view_hub1_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_hub2_settlement') && $permission->pSet__allow_to_view_hub2_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_hub3_settlement') && $permission->pSet__allow_to_view_hub3_settlement==1?1:0,
 /*12*/ property_exists($permission,'pSet__allow_to_view_proli_settlement') && $permission->pSet__allow_to_view_proli_settlement==1?1:0,
  
];

$reg_perm = [
                                
  property_exists($permission,'preg__allow_to_add_partner_requirement') && $permission->preg__allow_to_add_partner_requirement==1?1:0,
  property_exists($permission,'preg__allow_to_edit_partner_requirement') && $permission->preg__allow_to_edit_partner_requirement==1?1:0,
  property_exists($permission,'preg__allow_to_delete_partner_requirement') && $permission->preg__allow_to_delete_partner_requirement==1?1:0,
  property_exists($permission,'preg__allow_to_view_partner_requirement') && $permission->preg__allow_to_view_partner_requirement==1?1:0,
  
];

$cod_perm = [
                                
  property_exists($permission,'pcod__allow_to_generate_code') && $permission->pcod__allow_to_generate_code==1?1:0,

];



       
    
     return [ 
          'setting_permissions'=> $set_perm,
          'user_permissions'=>$user_perm, 
          'approval_permissions' =>$app_perm, 
          'product_permissions'=>$pro_perm,
          'order_permissions'=>$ord_perm,
          'sales_permissions'=>$sal_perm,
          'analytic_permissions'=>$ana_perm,
          'settle_permissions'=>$settle_perm,
          'reg_permissions'=>$reg_perm,
          'code_permissions'=>$cod_perm,
    
        
        ];
         } catch (\PDOException $th) {
           print_r($th);
            echo json_encode(['err'=>"Error procesing request",'chtm'=> `<li><a title="Add role" href="/admin/setting/role/add"><span class="mini-sub-pro">Role List</span></a></li>`]);
            //exit();
         }

      
                       
    }

 public function role(){

       //////////////////////////////////////////////////////////////////////////////get the set user  role                
       $set_set_role  =  DB::table('roles')->where('role_id', $this->user['role'])->get()[0] ; 
       $permission  = json_decode($set_set_role->role_perm);    
 
       $set_perm = [
                                     
        property_exists($permission,'pset__allow_to_add_category_and_subcategory') && $permission->pset__allow_to_add_category_and_subcategory==1?1:0,
        property_exists($permission,'pset__allow_to_edit_category_and_subcategory') && $permission->pset__allow_to_edit_category_and_subcategory==1?1:0,
        property_exists($permission, 'pset__allow_to_delete_category_and_subcategory') && $permission->pset__allow_to_delete_category_and_subcategory==1?1:0,
        property_exists($permission,'pset__allow_to_add_item_type') && $permission->pset__allow_to_add_item_type==1?1:0,
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       
        property_exists($permission,'pset__allow_to_edit_item_type') && $permission->pset__allow_to_edit_item_type==1?1:0,
        property_exists($permission,'pset__allow_to_delete_item_type') && $permission->pset__allow_to_delete_item_type==1?1:0,
       /*6*/ property_exists($permission,'pset__allow_to_view_item_type') && $permission->pset__allow_to_view_item_type==1?1:0,
        property_exists($permission,'pset__allow_to_add_location') && $permission->pset__allow_to_add_location==1?1:0,
        ////////////////////////////////////////////////////////////////////////////////////////////////////
       
        property_exists($permission,'pset__allow_to_edit_location') && $permission->pset__allow_to_edit_location==1?1:0,
        property_exists($permission,'pset__allow_to_delete_location') && $permission->pset__allow_to_delete_location==1?1:0,
      /*10*/  property_exists($permission,'pset__allow_to_view_location') && $permission->pset__allow_to_view_location==1?1:0,
        property_exists($permission,' pset__allow_to_update_location_coordinate') && $permission-> pset__allow_to_update_location_coordinate==1?1:0,
        //////////////////////////////////////////////////////////////////////////////////////////////////////////
        property_exists($permission,'pset__allow_to_add_hub') && $permission->pset__allow_to_add_hub==1?1:0,
        property_exists($permission,'pset__allow_to_edit_hub') && $permission->pset__allow_to_edit_hub==1?1:0,
        property_exists($permission,'pset__allow_to_delete_hub') && $permission->pset__allow_to_delete_hub==1?1:0,
      /*15*/  property_exists($permission,'pset__allow_to_view_hub') && $permission->pset__allow_to_view_hub==1?1:0,
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        property_exists($permission,'pset__allow_to_edit_product_upload_settings') && $permission->pset__allow_to_edit_product_upload_settings==1?1:0,
       /*17*/ property_exists($permission,'pset__allow_to_view_product_upload_settings') && $permission->pset__allow_to_view_product_upload_settings==1?1:0,
        property_exists($permission,'pset__allow_to_add_roles') && $permission->pset__allow_to_add_roles==1?1:0,
        property_exists($permission,'pset__allow_to_edit_roles') && $permission->pset__allow_to_edit_roles==1?1:0,
        ////////////////////////////////////////////////////////////////////////////////////////////////////////
        property_exists($permission,'pset__allow_to_delete_roles') && $permission->pset__allow_to_delete_roles==1?1:0,
       /*21*/ property_exists($permission,'pset__allow_to_view_roles') && $permission->pset__allow_to_view_roles==1?1:0,
        property_exists($permission,'pset__allow_to_add_roles') && $permission->pset__allow_to_add_roles==1?1:0,
        property_exists($permission,'pset__allow_to_set_roles') && $permission->pset__allow_to_add_roles==1?1:0,
        property_exists($permission,'pset__allow_to_set_permission') && $permission->pset__allow_to_set_permission==1?1:0,
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
    
     ];
    


    $user_perm = [
      property_exists($permission,'ppar__allow_to_edit_admin') && $permission->ppar__allow_to_edit_admin==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_admin') && $permission->ppar__allow_to_delete_admin==1?1:0,
      /*2*/property_exists($permission,'ppar__allow_to_view_admin') && $permission->ppar__allow_to_view_admin==1?1:0,
      property_exists($permission,'ppar__allow_to_set_admin_permission') && $permission->ppar__allow_to_set_admin_permission==1?1:0,
     ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      property_exists($permission,'ppar__allow_to_set_admin_role') && $permission->ppar__allow_to_set_admin_role==1?1:0,
      property_exists($permission,'ppar__allow_to_set_admin_role') && $permission->ppar__allow_to_set_admin_role==1?1:0,
      property_exists($permission,' ppar__allow_to_edit_aggregator') && $permission-> ppar__allow_to_edit_aggregator==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_aggregator') && $permission->ppar__allow_to_delete_aggregator==1?1:0,
      ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     
      /*8*/property_exists($permission,'ppar__allow_to_view_aggregator') && $permission->ppar__allow_to_view_aggregator==1?1:0,
      property_exists($permission,'ppar__allow_to_edit_farmer') && $permission->ppar__allow_to_edit_farmer==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_farmer') && $permission->ppar__allow_to_delete_farmer==1?1:0,
     /*11*/ property_exists($permission,'ppar__allow_to_view_farmer') && $permission->ppar__allow_to_view_farmer==1?1:0,
  
      /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      property_exists($permission,'ppar__allow_to_edit_warehouse') && $permission->ppar__allow_to_edit_warehouse==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_warehouse') && $permission->ppar__allow_to_delete_warehouse==1?1:0,
      /*14*/property_exists($permission,'ppar__allow_to_view_warehouse') && $permission->ppar__allow_to_view_warehouse==1?1:0,
      property_exists($permission,'ppar__allow_to_edit_logistics') && $permission->ppar__allow_to_edit_logistics==1?1:0,
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////

      property_exists($permission,'ppar__allow_to_delete_logistics') && $permission->ppar__allow_to_delete_logistics==1?1:0,
      /*17*/property_exists($permission,'ppar__allow_to_view_logistics') && $permission->ppar__allow_to_view_logistics==1?1:0,
      property_exists($permission,'ppar__allow_to_delete_customer') && $permission->ppar__allow_to_delete_customer==1?1:0,
       /*19*/property_exists($permission,'ppar__allow_to_view_customer') && $permission->ppar__allow_to_view_customer==1?1:0,
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////
      property_exists($permission,'ppar__allow_to_edit_customer') && $permission->ppar__allow_to_edit_customer==1?1:0,
      property_exists($permission,'ppar__allow_to_add_hub') && $permission->ppar__allow_to_add_hub==1?1:0,
     /*22*/ property_exists($permission,'ppar__allow_to_view_hub') && $permission->ppar__allow_to_view_hub==1?1:0,
       property_exists($permission,'ppar__allow_to_edit_hub') && $permission->ppar__allow_to_edit_hub==1?1:0,
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////
  
      property_exists($permission,'ppar__allow_to_delete_hub') && $permission->ppar__allow_to_delete_hub==1?1:0,
     
      ///////////////////////////////////////////////////////////////////////////////////////////////////////////
 

         ];
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
    $app_perm = [
                                     
      property_exists($permission,'papp__allow_to_approve_admin') && $permission->papp__allow_to_approve_admin==1?1:0,
      property_exists($permission,'papp__allow_to_approve_aggregator') && $permission->papp__allow_to_approve_aggregator==1?1:0,
      property_exists($permission,'papp__allow_to_approve_farmer') && $permission->papp__allow_to_approve_farmer==1?1:0,
      property_exists($permission,'papp__allow_to_approve_logistics') && $permission->papp__allow_to_approve_logistics==1?1:0,
      property_exists($permission,'papp__allow_to_approve_warehouse') && $permission->papp__allow_to_approve_warehouse==1?1:0,
     
      
   ];
    //////////////////////////////////////////////////////////////////////////////////////////////////
    
     
    $pro_perm = [
                                     
        property_exists($permission,'ppro__allow_to_view_product_uplaod_code') && $permission->ppro__allow_to_view_product_uplaod_code==1?1:0,
        property_exists($permission,'ppro__allow_to_view_awaiting_product') && $permission->ppro__allow_to_view_awaiting_product==1?1:0,
        property_exists($permission,'ppro__allow_to_view_approved_product') && $permission->ppro__allow_to_view_approved_product==1?1:0,
        property_exists($permission,'ppro__allow_to_view_expired_product') && $permission->ppro__allow_to_view_expired_product==1?1:0,
        property_exists($permission,'ppro__allow_to_view_all_product') && $permission->ppro__allow_to_view_all_product==1?1:0,
        property_exists($permission,'ppro__allow_to_view_deal_product') && $permission->ppro__allow_to_view_deal_product==1?1:0,
       
        property_exists($permission,'ppro__allow_to_view_product_details') && $permission->ppro__allow_to_view_product_details==1?1:0,
        property_exists($permission,'ppro__allow_to_delete_product') && $permission->ppro__allow_to_delete_product==1?1:0,
        property_exists($permission,'ppro__allow_to_edit_product') && $permission->ppro__allow_to_edit_product==1?1:0,
        property_exists($permission,'ppro__allow_to_approve_product') && $permission->ppro__allow_to_approve_product==1?1:0,
        
        
     ];


    
     $ord_perm = [
                                     
      property_exists($permission,'pord__allow_to_view_order') && $permission->pord__allow_to_view_order==1?1:0,
      property_exists($permission,'pord__allow_to_delete_order') && $permission->pord__allow_to_delete_order==1?1:0,
      property_exists($permission,'pord__allow_to_view_return_order') && $permission->pord__allow_to_view_return_order==1?1:0,
      property_exists($permission,'pord__allow_to_cancel_order') && $permission->pord__allow_to_cancel_order==1?1:0,
      property_exists($permission,'pord__allow_to_view_details') && $permission->pord__allow_to_view_details==1?1:0,
     // property_exists($permission,'ppro__allow_to_view_deal_product') && $permission->ppro__allow_to_view_deal_product==1?1:0,

   ];

   $sal_perm = [
                                     
    property_exists($permission,'psal__allow_add_marketing') && $permission->psal__allow_add_marketing==1?1:0,
    property_exists($permission,'psal__allow_edit_marketing') && $permission->psal__allow_edit_marketing==1?1:0,
    property_exists($permission,'psal__allow_delete_marketing') && $permission->psal__allow_delete_marketing==1?1:0,
    property_exists($permission,'psal__allow_view_marketing') && $permission->psal__allow_view_marketing==1?1:0,
   
 ];

 $ana_perm = [                                 
  property_exists($permission,'pana__allow_to_view_product_analytic') && $permission->pana__allow_to_view_product_analytic==1?1:0,
  property_exists($permission,'pana__allow_to_view_order_analytic') && $permission->pana__allow_to_view_order_analytic==1?1:0,
  property_exists($permission,'pana__allow_to_view_finance_analytics') && $permission->pana__allow_to_view_finance_analytics==1?1:0,
  property_exists($permission,'pana__allow_to_view_event_analytics') && $permission->pana__allow_to_view_event_analytics==1?1:0,
];


$settle_perm = [
  property_exists($permission,'pSet__allow_to_view_logistics1_settlement') && $permission->pSet__allow_to_view_logistics1_settlement==1?1:0,                                  
  property_exists($permission,'pSet__allow_to_view_logistics2_settlement') && $permission->pSet__allow_to_view_logistics2_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_logistics3_settlement') && $permission->pSet__allow_to_view_logistics3_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_logistics4_settlement') && $permission->pSet__allow_to_view_logistics4_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_product_owner_settlement') && $permission->pSet__allow_to_view_product_owner_settlement==1?1:0,
  

  property_exists($permission,'pSet__allow_to_view_uploader_settlement') && $permission->pSet__allow_to_view_uploader_settlement==1?1:0,
  
  property_exists($permission,'pSet__allow_to_view_storage_settlement') && $permission->pSet__allow_to_view_storage_settlement==1?1:0,
  property_exists($permission,'pSet__allow_to_view_vat_settlement') && $permission->pSet__allow_to_view_vat_settlement==1?1:0,
  
  property_exists($permission,'pSet__allow_to_view_insurance_settlement') && $permission->pSet__allow_to_view_insurance_settlement==1?1:0,
  
    
  property_exists($permission,'pSet__allow_to_view_hub1_settlement') && $permission->pSet__allow_to_view_hub1_settlement==1?1:0,
  
  property_exists($permission,'pSet__allow_to_view_hub2_settlement') && $permission->pSet__allow_to_view_hub2_settlement==1?1:0,
  
  property_exists($permission,'pSet__allow_to_view_hub3_settlement') && $permission->pSet__allow_to_view_hub3_settlement==1?1:0,
  
 /*12*/ property_exists($permission,'pSet__allow_to_view_proli_settlement') && $permission->pSet__allow_to_view_proli_settlement==1?1:0,
  

];


$reg_perm = [
                                
  property_exists($permission,'preg__allow_to_add_partner_requirement') && $permission->preg__allow_to_add_partner_requirement==1?1:0,
  property_exists($permission,'preg__allow_to_edit_partner_requirement') && $permission->preg__allow_to_edit_partner_requirement==1?1:0,
  property_exists($permission,'preg__allow_to_delete_partner_requirement') && $permission->preg__allow_to_delete_partner_requirement==1?1:0,
  property_exists($permission,'preg__allow_to_view_partner_requirement') && $permission->preg__allow_to_view_partner_requirement==1?1:0,
  
];

$cod_perm = [
                                
  property_exists($permission,'pcod__allow_to_generate_code') && $permission->pcod__allow_to_generate_code==1?1:0,

];



  return [
    'setting_roles'=> $set_perm,
    'user_roles'=>$user_perm, 
    'approval_roles' =>$app_perm, 
    'product_roles'=>$pro_perm,
    'order_roles'=>$ord_perm,
    'sales_roles'=>$sal_perm,
    'analytic_roles'=>$ana_perm,
    'settle_roles'=>$settle_perm,
    'reg_roles'=>$reg_perm,
    'code_roles'=>$cod_perm,

   
   ];

 }

    public function data(){
      $bankData =DB::table('bankacc')->where('user_id', $this->user['a'])->first() ; 
      $b  = !empty($bankData)?json_decode($bankData->acc_info):[];
      if(!empty($b)) {
        $this->user['bfn'] = $b->fn; 
        $this->user['bln'] = $b->ln; 
        $this->user['accnum'] = $b->accountnumber; 
        $this->user['bkname'] = $b->bankname; 
        $this->user['has_bk'] = true; 
      }else{
        $this->user['has_bk'] = false; 
      }

        return json_encode( ['data' => ['user_permission'=>$this->user_perm,'group_permission'=>$this->user_gperm,'user'=> $this->user ] ] );
    }
}
