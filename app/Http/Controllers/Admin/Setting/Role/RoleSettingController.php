<?php

namespace App\Http\Controllers\Admin\Setting\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Module\Escape;
use Carbon\Carbon;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
class RoleSettingController extends Controller
{
    
  public function __construct()
  {
    $this->middleware("auth:admin");  
   

   $this->middleware(function ($request, $next ) {
    $this->role  = new Settings();
      //////////////////////////////////////////////////////////////////////////////get the set user permission   
    $this->user= Auth::user();
    $permission  = json_decode(json_decode(Auth::user()->perm)->role_perm);
    $this->user_perm = [
       property_exists($permission,'pset__allow_to_add_roles') && $permission->pset__allow_to_add_roles==1?1:0,
       property_exists($permission,'pset__allow_to_view_roles') && $permission->pset__allow_to_view_roles==1?1:0,
       property_exists($permission,'pset__allow_to_edit_roles') && $permission->pset__allow_to_edit_roles==1?1:0,
       property_exists($permission,'pset__allow_to_delete_roles') && $permission->pset__allow_to_delete_roles==1?1:0,
      
                   ];


   //////////////////////////////////////////////////////////////////////////////get the set user  role                
   $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
   $gpermission  = json_decode($set_set_role->role_perm);    
   $this->user_gperm  =   [
                property_exists($gpermission,'pset__allow_to_add_roles') && $gpermission->pset__allow_to_add_roles==1?1:0,
                property_exists($gpermission,'pset__allow_to_view_roles') && $gpermission->pset__allow_to_view_roles==1?1:0,
                property_exists($gpermission,'pset__allow_to_edit_roles') && $gpermission->pset__allow_to_edit_roles==1?1:0,
                property_exists($gpermission,'pset__allow_to_delete_roles') && $gpermission->pset__allow_to_delete_roles==1?1:0,
                
 ];
 

    return $next($request);
});
   
  }
 
     public function role(){
        $inst1 = 'category_and_subcategory';
        $inst2 = 'item_type';
        $inst3 = 'location';
        $inst4 = 'hub';
        $inst5 = 'product_upload_settings';
        $inst6 = 'roles';
        $inst7= 'roles';
     

        $staf1 = 'admin';
        $staf2 = 'aggregator';
        $staf3 = 'farmer';
        $staf4 = 'warehouse';
        $staf5 = 'logistics';
        $staf6 = 'customer';
      

     


$permission_arr  = [

'setup' =>  [
            'allow_to_add_'.$inst1,
            'allow_to_edit_'.$inst1,
            'allow_to_delete_'.$inst1,
            // 'allow_to_view_'.$inst1,

            'allow_to_add_'.$inst2,
            'allow_to_edit_'.$inst2,
            'allow_to_delete_'.$inst2,
            'allow_to_view_'.$inst2,


            'allow_to_add_'.$inst3,
            'allow_to_edit_'.$inst3,
            'allow_to_delete_'.$inst3,
            'allow_to_view_'.$inst3,
            'allow_to_update_location_coordinate',

            'allow_to_add_'.$inst4,
            'allow_to_edit_'.$inst4,
            'allow_to_delete_'.$inst4,
            'allow_to_view_'.$inst4,


          
            'allow_to_edit_'.$inst5,
            'allow_to_view_'.$inst5,


            'allow_to_add_'.$inst6,
            'allow_to_edit_'.$inst6,
            'allow_to_delete_'.$inst6,
            'allow_to_view_'.$inst6,


            // 'allow_to_add_'.$inst7,
            // 'allow_to_edit_'.$inst7,
            // 'allow_to_delete_'.$inst7,
            // 'allow_to_view_'.$inst7,

            'allow_to_set_'.$inst7,
            'allow_to_set_permission',
            'allow_to_view_parner_registration_requirement'
     

          

          ],

       'parner' => [
         
            'allow_to_edit_'.$staf1,
            'allow_to_delete_'.$staf1,
            'allow_to_view_'.$staf1,
            'allow_to_set_admin_permission',
            'allow_to_set_admin_role',

           
            'allow_to_edit_'.$staf2,
            'allow_to_delete_'.$staf2,
            'allow_to_view_'.$staf2,

        
            'allow_to_edit_'.$staf3,
            'allow_to_delete_'.$staf3,
            'allow_to_view_'.$staf3,

           
            'allow_to_edit_'.$staf4,
            'allow_to_delete_'.$staf4,
            'allow_to_view_'.$staf4,

         
            'allow_to_edit_'.$staf5,
            'allow_to_delete_'.$staf5,
            'allow_to_view_'.$staf5,

          
            'allow_to_delete_'.$staf6,
            'allow_to_view_'.$staf6,
            'allow_to_edit_'.$staf6,

            'allow_to_add_hub',
            'allow_to_view_hub',
            'allow_to_edit_hub',
            'allow_to_delete_hub',


          ],
            'approve parner' => [
         
            'allow_to_approve_admin',
            'allow_to_approve_aggregator',
            'allow_to_approve_farmer',
            'allow_to_approve_logistics',
            'allow_to_approve_warehouse',

           
           


          ], 
        'product' => [
         
            'allow_to_view_product_uplaod_code',
            'allow_to_view_awaiting_product',
            'allow_to_view_approved_product',
            'allow_to_view_expired_product',
            'allow_to_view_deal_product',
          
            'allow_to_view_all_product',

          
            'allow_to_delete_product',

            'allow_to_view_product_details',
            'allow_to_edit_product',
             'allow_to_approve_product',
          ],


    'order'=>[

            'allow_to_view_order',

            'allow_to_delete_order',
            'allow_to_view_return_order',

            'allow_to_cancel_order',

            'allow_to_view_details',


           
          ],

 'sale badges'=>[

            'allow_add_marketing',
            'allow_edit_marketing',
            'allow_delete_marketing',
            'allow_view_marketing',

          ],

     'analytic'=>[

            'allow_to_view_product_analytic',
            'allow_to_view_order_analytic',
            'allow_to_view_finance_analytics',
            'allow_to_view_event_analytics',

         




     ],  

'Settlement'=>[
    'allow_to_view_logistics1_settlement',
    'allow_to_view_logistics2_settlement',
    'allow_to_view_logistics3_settlement',
    'allow_to_view_logistics4_settlement',
    'allow_to_view_product_owner_settlement',
    'allow_to_view_uploader_settlement', ////index5
    
    'allow_to_view_storage_settlement', 
    'allow_to_view_vat_settlement', 
    'allow_to_view_insurance_settlement', 
    'allow_to_view_hub1_settlement', 
    'allow_to_view_hub2_settlement',
    'allow_to_view_hub3_settlement',
    'allow_to_view_proli_settlement'

   ],    

'registration'=>[
    'allow_to_add_partner_requirement',
    'allow_to_edit_partner_requirement',
    'allow_to_delete_partner_requirement',
    'allow_to_view_partner_requirement',



    

   ],


'code generation'=>[
    'allow_to_generate_code',
    



    

   ],               


];

return $permission_arr;
     }

     public function index()
     {

      if($this->user_perm[1]==1 && $this->user_gperm[1]==1){

        if(!Auth::check()){
          
            return redirect("admin.login")->withSuccess('You are not allowed to access');
            // return view('admin/dashboard',['user'=>Auth::user()]);
         }
         //print_r(Auth::user());
         return view('admin.component.setting.role.add',['user'=>Auth::user(),'role'=>$this->role()]);
      }else{
        return view('welcome',['denied'=>"Permission denied"]);
      }

     }
     
     public function getRole(Request $request){
         try {
            $data  = DB::table('roles')->select('role_id AS a', 'role_name AS b', 'role_perm AS c', 'add_on AS d', 'add_by AS e', 'updated_by As f', 'role_resp AS g');
    
            if($_POST['post0']=='single'){
                $data  = $data->where('role_id',$_POST['post3'])->first();
            }else{
                $data  = $data->get();
            }
    
            return response()->json(['data'=>$data]); //code...
         } catch (\Throwable $th) {
            report($th);
             print_r(response());
            return response()->json(['err'=>$th->message]); //code...
         }
       
     }

     public function addRole(Request $request){

      
      if(!$this->user_perm[0]==1 || !$this->user_gperm[0]==1){
        echo  json_encode(['err' => "Permission denied "]);    
    exit();
  }

            $s = '';
            $key_  = explode(",", $_POST['post1'] ) ;
            $value_ =explode(",", $_POST['post2'] ) ; 
            $data_p =  array_combine( $key_, $value_);
    
             if(empty($_POST['post3'])) {
       
              echo json_encode(['err'=>"Role name is required"]);
       
              exit();
       
             }
           
       
             $chk  = DB::table('roles')
             ->where('role_name',trim(strtolower($_POST['post3'])))->first();
            
             if (!empty($chk)) {
       
                echo json_encode(['err'=>"<h4>".ucfirst($_POST['post3'])." role already exist</h4>" ]);
       
              exit();
       
             }
             try {
			  
			  
			  
                $id = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,20);
                        $data  = [
                            'role_name'=>Escape::done(trim(strtolower( $request->input('post3') ))),
                            'role_perm'=>json_encode($data_p),
                            'role_id'=>$id,
                            'role_resp'=>json_encode([$_POST['post4']] ),
                            'add_by'=>Auth::user()->fn.' '.Auth::user()->ln,
                            'add_on'=>strtotime(Carbon::now()),
                           'updated_by'=>strtotime(Carbon::now()),
                        ];
                       
                         DB::table('roles')->insert($data);
      
      
      
                        $_m=  "<h5><em>Role added successfully</em></h5>"  ;
      
                        return response()->json(['suc'=>$_m]);
      
                        exit();
      
                       } catch (\Throwable $e) {
      
                        $_m=  "<h6><em>failed to add row</em></h6>"  ;  
      
                         echo json_encode(['err'=>$_m]);
                         return response()->json(['err'=>$_m]); 
                         exit();
      
                       }
      

            
    }


    public function updateRole(Request $request){
      
      if(!$this->user_perm[2]==1 || !$this->user_gperm[2]==1){
        echo  json_encode(['err' => "Permission denied "]);    
    exit();
  }

        
        $key_  = explode(",", $_POST['post1'] ) ;
            $value_ =explode(",", $_POST['post2'] ) ; 
            $data_p =  array_combine( $key_, $value_);
    
             if(empty($_POST['post3'])) {
       
              echo json_encode(['err'=>"Role name is required"]);
       
              exit();
       
             }
           
       
             $chk  = DB::table('roles')
             ->where('role_id',trim(strtolower($_POST['updateId'])))->first();
            
             if (empty($chk)) {
       
                echo json_encode(['err'=>"<h4>".ucfirst($_POST['post3'])." role not found</h4>" ]);
       
              exit();
       
             }
             try {
			  
			  
			  
                
                        $data  = [
                            'role_name'=>Escape::done(trim(strtolower( $request->input('post3') ))),
                            'role_perm'=>json_encode($data_p),
                            
                            'role_resp'=>json_encode([$_POST['post4']] ),
                            'add_by'=>Auth::user()->fn.' '.Auth::user()->ln,
                          
                            'updated_by'=>strtotime(Carbon::now()),
                        ];
                       
                         DB::table('roles')->where('id',$chk->id)->update($data);
      
      
      
                        $_m=  "<h6><em>Role updated successfully</em></h6>"  ;
      
                        return response()->json(['suc'=>$_m]);
      
                        exit();
      
                       } catch (\Throwable $e) {
      
                        $_m=  "<h6><em>failed to add row</em></h6>"  ;  
      
                         echo json_encode(['err'=>$_m]);
                         return response()->json(['err'=>$_m]); 
                         exit();
      
                       }
      
    }


    public function deleteRole(Request $request){
      
      if(!$this->user_perm[3]==1 || !$this->user_gperm[3]==1){
        echo  json_encode(['err' => "Permission denied "]);    
    exit();
  }

        $p = explode(',', $_POST['post0']);
			try {
				foreach ($p as $key => $value) {
		                DB::table('roles')->where('role_id',$value)->delete();
							}
							//////////////////////////////////////////End of the for each $_POST
							echo json_encode(['suc'=>count($p)." row data deleted"]);
		
						exit();
				} catch (\Throwable $e) {
								echo json_encode(['err'=>"Error processing request"]);
				}
		

    }
     
}
