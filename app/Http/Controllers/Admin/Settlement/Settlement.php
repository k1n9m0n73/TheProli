<?php
namespace App\Http\Controllers\Admin\Settlement;
use App\Http\Controllers\Admin\Settlement\Trait\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Setting\Role\RoleSettingController as Settings;
use App\Http\Controllers\Admin\Settlement\Trait\Hub;
use App\Http\Controllers\Admin\Settlement\Trait\ProductOwner;
use App\Http\Controllers\Admin\Settlement\Trait\Service;
use App\Http\Controllers\Admin\SideBarTrait;

class Settlement extends Controller
{     use SideBarTrait,Log,ProductOwner,Service,Hub;
     
    public function __construct()
    {  
          $this->message_for  = 'admin';
          $this->middleware("auth:admin");  
          $this->role  = new Settings();
          $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          
           $this->perm  = $this->permission()['settle_permissions'];
           $this->gperm  = $this ->role()['settle_roles'];

         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         
          return $next($request);
      });
       
     

    }


    public function index(Request $req, $id)
    
    {  
   
       if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'log1'){
                if($this->perm[0] ==1 && $this->gperm[0] ==1){
                  return view('admin.component.settlement.log1',['user'=>Auth::user()]);  


                }else{
                    return view('welcome',['denied'=>"Permission denied"]);
                 }
              }
              /////////////////////////////////

                //////////////////////////////////////////////
                if($id == 'log2'){
                  if($this->perm[1] ==1 && $this->gperm[1] ==1){
                    return view('admin.component.settlement.log2',['user'=>Auth::user()]);  
  
                    
                  }else{
                      return view('welcome',['denied'=>"Permission denied"]);
                   }
                }
                /////////////////////////////////

                              //////////////////////////////////////////////
                              if($id == 'log3a'){
                                if($this->perm[2] ==1 && $this->gperm[2] ==1){
                                  return view('admin.component.settlement.log3a',['user'=>Auth::user()]);  
                
                                  
                                }else{
                                    return view('welcome',['denied'=>"Permission denied"]);
                                 }
                              }
                              /////////////////////////////////  
                                //////////////////////////////////////////////
                                if($id == 'log3b'){
                                  if($this->perm[2] ==1 && $this->gperm[2] ==1){
                                    return view('admin.component.settlement.log3b',['user'=>Auth::user()]);  
                  
                                    
                                  }else{
                                      return view('welcome',['denied'=>"Permission denied"]);
                                   }
                                }
                                /////////////////////////////////

                                  //////////////////////////////////////////////
                              if($id == 'log4a'){
                                if($this->perm[3] ==1 && $this->gperm[3] ==1){
                                  return view('admin.component.settlement.log4a',['user'=>Auth::user()]);  
                
                                  
                                }else{
                                    return view('welcome',['denied'=>"Permission denied"]);
                                 }
                              }
                              /////////////////////////////////

                                 //////////////////////////////////////////////
                                 if($id == 'log4b'){
                                  if($this->perm[3] ==1 && $this->gperm[3] ==1){
                                    return view('admin.component.settlement.log4b',['user'=>Auth::user()]);  
                  
                                    
                                  }else{
                                      return view('welcome',['denied'=>"Permission denied"]);
                                   }
                                }
                                /////////////////////////////////

                                  //////////////////////////////////////////////
                                  if($id == 'product-owner'){
                                    if($this->perm[4] ==1 && $this->gperm[4] ==1){
                                      return view('admin.component.settlement.product_owner',['user'=>Auth::user()]);  
                    
                                      
                                    }else{
                                        return view('welcome',['denied'=>"Permission denied"]);
                                     }
                                  }
                                  /////////////////////////////////


                                   //////////////////////////////////////////////
                                   if($id == 'uploader'){
                                    if($this->perm[5] ==1 && $this->gperm[5] ==1){
                                      return view('admin.component.settlement.product_uploader',['user'=>Auth::user()]);  
                    
                                      
                                    }else{
                                        return view('welcome',['denied'=>"Permission denied"]);
                                     }
                                  }
                                  /////////////////////////////////


                                     //////////////////////////////////////////////
                                     if($id == 'store'){
                                      if($this->perm[6] ==1 && $this->gperm[6] ==1){
                                        return view('admin.component.settlement.store',['user'=>Auth::user()]);  
                      
                                        
                                      }else{
                                          return view('welcome',['denied'=>"Permission denied"]);
                                       }
                                    }
                                    /////////////////////////////////
                                      //////////////////////////////////////////////
                                      if($id == 'vat-payment'){
                                        if($this->perm[7] ==1 && $this->gperm[7] ==1){
                                          return view('admin.component.settlement.vat',['user'=>Auth::user()]);  
                        
                                          
                                        }else{
                                            return view('welcome',['denied'=>"Permission denied"]);
                                         }
                                      }
                                      /////////////////////////////////


                                      if($id == 'isp-payment'){
                                        if($this->perm[7] ==1 && $this->gperm[7] ==1){
                                          return view('admin.component.settlement.isp',['user'=>Auth::user()]);  
                        
                                          
                                        }else{
                                            return view('welcome',['denied'=>"Permission denied"]);
                                         }
                                      }
                                      /////////////////////////////////

                                /////////////////////////////////


                                if($id == 'hub1'){
                                  if($this->perm[9] ==1 && $this->gperm[9] ==1){
                                    return view('admin.component.settlement.hub1',['user'=>Auth::user()]);  
                                  }else{
                                      return view('welcome',['denied'=>"Permission denied"]);
                                    }
                                }
                                /////////////////////////////////

                                if($id == 'hub2'){
                                  if($this->perm[10] ==1 && $this->gperm[10] ==1){
                                    return view('admin.component.settlement.hub2',['user'=>Auth::user()]);  
                                  }else{
                                      return view('welcome',['denied'=>"Permission denied"]);
                                    }
                                }
                                /////////////////////////////////
                                if($id == 'hub3'){
                                  if($this->perm[11] ==1 && $this->gperm[11] ==1){
                                    return view('admin.component.settlement.hub3',['user'=>Auth::user()]);  
                                  }else{
                                      return view('welcome',['denied'=>"Permission denied"]);
                                    }
                                }
                                ///////////////////////////////// 
                                
                                 /////////////////////////////////
                                 if($id == 'proli'){
                                  if($this->perm[12] ==1 && $this->gperm[12] ==1){
                                    return view('admin.component.settlement.proli',['user'=>Auth::user()]);  
                                  }else{
                                      return view('welcome',['denied'=>"Permission denied"]);
                                    }
                                }
                                ///////////////////////////////// 
  

       }
  }    
        
        


        public function processProduct(Request $req, $id)
    
        {  
            //echo $id;
       
           if (Auth::check()) {
                // echo $id;
               //////////////////////////////////////////////
                  if($id == 'log1'){
                     
                        $this->logisticsOneSettlement($req);
                       
                  }

                  if($id == 'log2'){
                     
                    $this->logisticsTwoSettlement($req);
                   
              }

              if($id == 'log3a'){
                     
                $this->logisticsThreeASettlement($req);
               
          }

                      if($id == 'log3b'){
                                
                        $this->logisticsThreeBSettlement($req);
                      
                  }

                  if($id == 'log4a'){
                                
                    $this->logisticsFOurASettlement($req);
                  
              }

              if($id == 'log4b'){
                                
                $this->logisticsFOurBSettlement($req);
              
            }


            if($id == 'product_owner'){
                                
              $this->productOwnerSettlement($req);
            
          }

          if($id == 'product_uploader'){
                                
            $this->productUploaderSettlement($req);
          
        }

              if($id == 'store'){
                                      
                $this->productStoreSettlement($req);
              
            }


            if($id == 'vat'){
                                      
              $this->vatSettlement($req);
            
          }

          if($id == 'isp'){
                                      
            $this->ispSettlement($req);
          
        }

        if($id == 'hub1'){
                                      
          $this->hub1Settlement($req);
        
      }

      if($id == 'hub2'){
                                      
        $this->hub2Settlement($req);
      
    }

    if($id == 'hub3'){
                                      
      $this->hub3Settlement($req);
    
  }

  if($id == 'proli'){
                                      
    $this->proliSettlement($req); ///inside hub trait
  
}


if(preg_match("/log/",$id) && preg_match("/settle_manual/",$id)){
                                     
  $this->logPayment($req,$id);

}


if(preg_match("/product/",$id) && preg_match("/settle_manual/",$id)){
                                     
  $this->productPayment($req,$id);

}


if(preg_match("/serivce/",$id) && preg_match("/settle_manual/",$id)){
                                     
  $this->servicePayment($req,$id);

}



if(preg_match("/hub/",$id) && preg_match("/settle_manual/",$id)){
                                     
  $this->hubPayment($req,$id);

}
                 
     

                   
          }
            
  }       




   
}