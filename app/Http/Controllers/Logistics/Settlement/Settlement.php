<?php
namespace App\Http\Controllers\Logistics\Settlement;
use App\Http\Controllers\Logistics\Settlement\Trait\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Settlement extends Controller
{     use Log;
     
    public function __construct()
    {  
          $this->message_for  = 'logistics';
          $this->middleware("auth:log");  
         
          $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          
        
         //////////////////////////////////////////////////////////////////////////////get the set user  role                
         
          return $next($request);
      });
       
     

    }


    public function index(Request $req, $id)
    
    {  
   
       if (Auth::check()) {
             
           //////////////////////////////////////////////
              if($id == 'log1'){
                  return view('logistics.component.settlement.log1',['user'=>Auth::user()]);  
              }
              /////////////////////////////////

                //////////////////////////////////////////////
                if($id == 'log2'){
                    return view('logistics.component.settlement.log2',['user'=>Auth::user()]);  
                  
                }
                /////////////////////////////////

                              //////////////////////////////////////////////
                              if($id == 'log3a'){
                                  return view('logistics.component.settlement.log3a',['user'=>Auth::user()]);  
                              }
                              /////////////////////////////////  
                                //////////////////////////////////////////////
                                if($id == 'log3b'){
                                    return view('logistics.component.settlement.log3b',['user'=>Auth::user()]);  
                                }
                                /////////////////////////////////

                                  //////////////////////////////////////////////
                              if($id == 'log4a'){
                                  return view('logistics.component.settlement.log4a',['user'=>Auth::user()]);  
                          }
                              /////////////////////////////////

                                 //////////////////////////////////////////////
                                 if($id == 'log4b'){
                               
                                    return view('logistics.component.settlement.log4b',['user'=>Auth::user()]);  
                  
                                }
                                /////////////////////////////////




                                   

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


                   
          }
            
  }       




   
}