<?php

namespace App\Http\Controllers\Admin\SalesAds;
use App\Http\Controllers\Admin\SalesAds\Trait\SalesAdsTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use App\Http\Controllers\Admin\SideBarTrait;
use Illuminate\Support\Facades\DB;
class SalesAds extends Controller
{     use SalesAdsTrait,SideBarTrait;
     
    public function __construct()
    {  
     
          $this->middleware("auth:admin");  
          $this->role  = new Settings();
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          
           $this->perm  = $this->permission()['sales_permissions'];
           $this->gperm  = $this ->role()['sales_roles'];

         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         
          return $next($request);
      });
       
     

    }

    public function index(Request $req, $id) {  
   
       if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'advert'){
                if($this->perm[3] ==1  && $this->gperm[3] ==1){
                      $data  = DB::table('item_type')->where('id','>','0')->orderBy('type_name')->get();
                    return view('admin.component.sales_ads.sales_ads',['user'=>Auth::user(),'data'=>['types'=>count($data)>0?$data:[]]]);    
                }else{
                    return view('welcome',['denied'=>"Permission denied"]);
                 }    
                  }
              /////////////////////////////////

                 /////////////////////////////////
                 //  echo $id;
                 if(preg_match('/edits__/',$id)){
                    if($this->perm[1] ==1 && $this->gperm[1] ==1){
                    $item_id_container  = explode("__",$id);
                    
                    $item  = DB::table('store_advert')->where('id',$item_id_container[1])->first();
                    $data  = DB::table('item_type')->where('id','>','0')->orderBy('type_name')->get();
                      
                   return view('admin.component.sales_ads.edit',['user'=>Auth::user(),'ob'=>$item,'data'=>['types'=>$data]  ]); 
                    }else{
                        return view('welcome',['denied'=>"Permission denied"]);
                    }
               }

              
              ////////////////////////////////////
            }    

        }    
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
       
                
           if (Auth::check()) {
                 
            //////////////////////////////////////////////
               if($id == 'saveAdvert'){
                  
                     $this->saveAds($req);
                    
               }

               if($id == 'get-ads'){
                if($this->perm[3] ==1 && $this->gperm[3] ==1){
                 $this->getAds($req);
                }else{
                    echo  json_encode(['err'=>'PErmission denied']);
                }
                
           }

           if($id == 'edit'){
            if($this->perm[1] ==1 && $this->gperm[1] ==1){     
            $this->editAds($req);
        }else{
            echo  json_encode(['err'=>'PErmission denied']);
        }
           
           }

         if($id == 'delete_'){
            if($this->perm[2] ==1 && $this->gperm[2] ==1){       
           $this->deleteAds($req);
        }else{
            echo  json_encode(['err'=>'PErmission denied']);
        }
       
          }

   
      }
                   

  }       




  
}