<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
class AdminUserData extends Controller
{
    //
     use SideBarTrait;
     
    public function __construct()
    {  
      
          $this->middleware("auth:admin");  
          $this->role  = new Settings();
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   


     
          $this->user= [
              'a'=>Auth::user()->user_id,
              'b'=>Auth::user()->fn,
              'c'=>Auth::user()->mn,
              'd'=>Auth::user()->ln,
              'e'=>Auth::user()->role,
              'f'=>Auth::user()->ge,
              'g'=>Auth::user()->ag,
              'h'=>Auth::user()->ad,
              'i'=>Auth::user()->st,
              'j'=>Auth::user()->re,
              'j_'=>Auth::user()->area,
              'k'=>Auth::user()->pn,
              'l'=>Auth::user()->email,
              'm'=>Auth::user()->quali,
              'n'=>Auth::user()->quali2,
              'o'=>Auth::user()->img,
              'p'=>Auth::user()->cvimg,
              'q'=>Auth::user()->certimg,
              'r'=>Auth::user()->idimg,



              'role'=>Auth::user()->role,
              'perm'=>Auth::user()->perm,
              'img'=>Auth::user()->img,
        
        
        ];
         
       
          return $next($request);
      });
       
     

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

        return json_encode( ['data' => ['user_permission'=>$this->permission(),'group_permission'=>$this->role(),'user'=> $this->user ] ] );
    }
}
