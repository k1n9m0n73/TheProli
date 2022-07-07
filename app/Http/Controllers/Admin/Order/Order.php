<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use App\Http\Controllers\Admin\SideBarTrait;
use Illuminate\Support\Carbon;
use App\Http\Controllers\MailerController;

class Order extends Controller
{     use SideBarTrait;
      use  \App\Http\Controllers\Admin\Order\Trait\OrderTraitGet ;
    public function __construct()
    {  
     
          $this->middleware("auth:admin");  
          $this->role  = new Settings();
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          
           $this->perm  = $this->permission()['order_permissions'];
           $this->gperm  = $this ->role()['order_roles'];

         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         
          return $next($request);
      });
       
     

    }


    public function index(Request $req, $id)
    
    {  
   
       if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'today'){
                     if($this->perm[0] ==1  && $this->gperm[0] ==1){
                         return view('admin.component.order.today',['user'=>Auth::user()]);  
                     }else{
                        return view('welcome',['denied'=>"Permission denied"]);
                     }
                  
                   
              }
              /////////////////////////////////

              if($id == 'order_date_order'){
                if($this->perm[0] ==1 && $this->gperm[0] ==1){
                    return view('admin.component.order.order_date',['user'=>Auth::user()]);  
                }else{
                   return view('welcome',['denied'=>"Permission denied"]);
                }
             
              
         }
         /////////////////////////////////

         
         if($id == 'return_order'){
          if($this->perm[4] ==1 && $this->gperm[4] ==1){
              return view('admin.component.order.return',['user'=>Auth::user()]);  
          }else{
             return view('welcome',['denied'=>"Permission denied"]);
          }
       
        
   }
   /////////////////////////////////

                /////////////////////////////////
                 //  echo $id;
                if(preg_match('/details__/',$id)){
                    if($this->perm[4] ==1 && $this->gperm[4] ==1){
                    $item_id_container  = explode("__",$id);
                   return view('admin.component.order.details',['user'=>Auth::user(),'id'=>$item_id_container[1]]); 
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
                  if($id == 'today-order'){
                     
                        $this->getTodayOrder($req);
                       
                  }

                   

                 //////////////////////////////////////////////
               if($id == 'detail_props_'){
                     
                $this->getOrderDetails($req);
               
              }

              if($id == 'get_log'){
                     
                $this->getLog($req);
               
              }

              if($id == 'get_veh'){
                     
                $this->getVeh($req);
               
              }

              if($id == 'get_hub'){
                     
                $this->getHub($req);
               
              }

              
              if($id == 'cancel_'){
                     if($this->perm[3] ==1 && $this->gperm[3] ==1){
                          $this->cancel_($req);
                     }else{
                       echo json_encode(['err'=>"Permission denied"]);
                     }
             
               
              }

              if($id == 'reorder_'){
                if($this->perm[3] ==1 && $this->gperm[3] ==1){
                     $this->reorder_($req);
                }else{
                  echo json_encode(['err'=>"Permission denied"]);
                }
        
          
         }

              if($id == 'delete_'){
                if($this->perm[0] ==1 && $this->gperm[0] ==1){
                     $this->delete_($req);
                }else{
                  echo json_encode(['err'=>'Permission denied']);
                }
        
          
         }
              
              if($id == 'order-order-date'){
                     
                $this->getOrderDateOrder($req);
               
              }


              if($id == 'return-order'){
                     
                $this->getReturnOrder($req);
               
              }

              


                  
                
               //////////////////////////////////////////////////////
               // echo $id;   
       
                }
  }       




    public function sendMail($subject,$message,$to,$token){
 
        $details = [
            'subject'=>$subject,
            'message'=>$message,
            'to'=>$to,
            'time'=> Carbon::now(),
            'year'=>date('Y',strtotime(Carbon::now())),
            'link'=> '',
            'link_text'=>"",
            'cc'=>'',
            'bcc'=>'',
            'hasHTMLMessage'=>$message
  
        ];
        
    try {
       $mailer   = new MailerController($details);
       
       if($mailer->send()){
        return true;
       }else{
        return false;
       }
       // Mail::to($to)->send(new TestMail($details));
     
        //code...
    } catch (\Throwable $th) {
        print_r($th);
    }
    
    }
}