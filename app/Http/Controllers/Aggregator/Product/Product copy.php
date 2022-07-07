<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
class Prodduct extends Controller
{
    public function __construct()
    {  
      
          $this->middleware("auth:admin");  
          $this->role  = new Settings();
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          $permission  = json_decode(json_decode(Auth::user()->perm)->role_perm);
          $this->user_perm = [
                            property_exists($permission,'ppar__allow_to_set_admin_permission') && $permission->ppar__allow_to_set_admin_permission==1?1:0,
                            property_exists($permission,'ppar__allow_to_view_admin') && $permission->ppar__allow_to_view_admin==1?1:0,
                            property_exists($permission,'ppar__allow_to_edit_admin') && $permission->ppar__allow_to_edit_admin==1?1:0,
                            property_exists($permission,'ppar__allow_to_delete_admin') && $permission->ppar__allow_to_delete_admin==1?1:0,
                            property_exists($permission,'ppar__allow_to_set_admin_role') && $permission->ppar__allow_to_set_admin_role==1?1:0,
                            property_exists($permission,'papp__allow_to_approve_admin') && $permission->papp__allow_to_approve_admin==1?1:0,
                         ];


         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         $set_set_role  =DB::table('roles')->where('role_id', $this->user->role)->get()[0] ; 
         $gpermission  = json_decode($set_set_role->role_perm);    
         $this->user_gperm  =   [
          property_exists($gpermission,'ppar__allow_to_set_admin_permission') && $gpermission->ppar__allow_to_set_admin_permission==1?1:0,
          property_exists($gpermission,'ppar__allow_to_view_admin') && $gpermission->ppar__allow_to_view_admin==1?1:0,
          property_exists($gpermission,'ppar__allow_to_edit_admin') && $gpermission->ppar__allow_to_edit_admin==1?1:0,
          property_exists($gpermission,'ppar__allow_to_delete_admin') && $gpermission->ppar__allow_to_delete_admin==1?1:0,
          property_exists($gpermission,'ppar__allow_to_set_admin_role') && $gpermission->ppar__allow_to_set_admin_role==1?1:0,
          property_exists($gpermission,'papp__allow_to_approve_admin') && $gpermission->papp__allow_to_approve_admin==1?1:0,

       ];
       
    
          return $next($request);
      });
       
     

    }
 public function index()
 {
     return view('admin.component.employment.list',['user'=>Auth::user()]);
 }  
  
 

}
