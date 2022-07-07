<?php
namespace App\Http\Controllers\Admin\Analytics;

use App\Http\Controllers\Admin\Analytics\Trait\Event;
use App\Http\Controllers\Admin\Analytics\Trait\Finance;
use App\Http\Controllers\Admin\Analytics\Trait\Order;
use App\Http\Controllers\Admin\Analytics\Trait\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use App\Http\Controllers\Admin\SideBarTrait;

class Analytics extends Controller
{     use SideBarTrait,Product,Order,Finance,Event;
     
    public function __construct()
    {  
          $this->message_for  = 'admin';
          $this->middleware("auth:admin");  
          $this->role  = new Settings();
          $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          
           $this->perm  = $this->permission()['analytic_permissions'];
           $this->gperm  = $this ->role()['analytic_roles'];

         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         
          return $next($request);
      });
       
     

    }

    public  function actday(){

      $tendif =  \time()-3600;
      
      $actDay = date('Y-m-d', $tendif);
      return $actDay; 
      
      }
      
      public  function actday2(){
      
      $tendif =  \time()-3600;
      
      $actDay = date('d M Y', $tendif);
      return $actDay; 
      
      }
      
      
      
      public  function actdaytime(){
      
      $tendif =  \time()-3600;
      
      $actDatTime  =date('Y-m-d H:i:s',$tendif ); 
      return $actDatTime;
      }
      
    public function index(Request $req, $id)
    
    {  
   
       if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'product'){
                if($this->perm[0] ==1 && $this->gperm[0] ==1){
                  return view('admin.component.analytics.product',['user'=>Auth::user()]);  


                }else{
                    return view('welcome',['denied'=>"Permission denied"]);
                 }
              }
              /////////////////////////////////

                   //////////////////////////////////////////////
                   if($id == 'order'){
                    if($this->perm[1] ==1 && $this->gperm[1] ==1){
                      return view('admin.component.analytics.order',['user'=>Auth::user()]);  
    
    
                    }else{
                        return view('welcome',['denied'=>"Permission denied"]);
                     }
                  }
                  /////////////////////////////////
                    //////////////////////////////////////////////
                    if($id == 'finance'){
                      if($this->perm[2] ==1 && $this->gperm[2] ==1){
                        return view('admin.component.analytics.finance',['user'=>Auth::user()]);  
      
      
                      }else{
                          return view('welcome',['denied'=>"Permission denied"]);
                       }
                    }
                    /////////////////////////////////
                      //////////////////////////////////////////////
                      if($id == 'event'){
                        if($this->perm[3] ==1 && $this->gperm[3] ==1){
                          return view('admin.component.analytics.event',['user'=>Auth::user()]);  
        
        
                        }else{
                            return view('welcome',['denied'=>"Permission denied"]);
                         }
                      }

       }
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
                // echo $id;
               //////////////////////////////////////////////
                  if($id == 'products'){
                     
                        $this->productAnalytic($req);
                       
                  }
      ///
                  //////////////////////////////////////////////
                  if($id == 'order'){
                     
                    $this->orderAnalytic($req);
                   
              } 

              if($id == 'finance'){
                     
                $this->financeAnalytic($req);
               
          }

          if($id == 'event'){
                    
            $this->eventVistor($req);
           
         }
           
         if($id == 'event_delete_'){
                    
          $this->eventVistorDelete($req);
         
       }


                 

                   
          }
            
  }       




   
}