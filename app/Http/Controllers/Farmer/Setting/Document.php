<?php
namespace App\Http\Controllers\Farmer\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Module\FileUplaod;
use Module\Notification;

class Document extends Controller
{
    public function __construct()
    {  
     
          $this->middleware("auth:far");  
       
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          $this->table = "farmers";
         //////////////////////////////////////////////////////////////////////////////get the set user  role               
          return $next($request);
      });
       
     

    }


    public function index(Request $req)
    
    {  
        $doc  = DB::table("partner_documents")->first();
  
        return view('farmer.component.settings.document',['user'=>Auth::user(), 
        'data'=>  !empty((array)$doc) ?['doc'=> $doc->farmer]:json_encode([]) ]);  
                     
                  
    }


   public function update(Request $request){

    $image_names = [];


    foreach ($_FILES['file']['name'] as $key => $value3) {
       
        if (!empty($value3)) {
          array_push($image_names, $value3);
        }
  
    }
  
  
  //////////////////////////to update one documet one image is post
    if (!empty($image_names) ) {
    ///
          $fileName = ''; 
          $filUpName = [];
           $Files =$_FILES['file'];
                                          $eachImage = [];
                                           
                              $company_document = json_decode($this->user->documents,true)['document'];
                              // print_r( $company_document);
  
                                        for ($i=0; $i < count($Files['name']); $i++) {
                                          if (!empty($_FILES['file']['name'][$i])) {
  
  
                                          $eachImage =  ['name'=>$Files['name'][$i],'type'=>$Files['type'][$i], 'tmp_name'=>$Files['tmp_name'][$i],'error'=>$Files['error'][$i], 'size'=>$Files['size'][$i] ] ;  
  
                                        
                                            if ($_POST['exp'][$i] !="NO" && empty($_POST['exp'][$i])) {
                                             echo json_encode(['err'=>$_POST['filename'][$i]." expiring day is required" ] );
                                             exit();
                                            } 
                                         //    print_r($eachImage);
                                         // echo $i;
                                           if (file_exists( $company_document[$i]['doc'])) {
                                             unlink($company_document[$i]['doc']);
                                           }
  
                                           $imgPubPath   = 'usage/images/farimg/'; 
       
  
                                           $fileName = FileUplaod::uploadArr($eachImage,1000000,true,$imgPubPath);
                                           if(array_key_exists('err', $fileName)){
                                            echo json_encode(['err'=>$fileName['err'] ]);
                                            exit();
                                           
                                           }

                                     $company_document[$i]['doc'] =  $imgPubPath.$fileName['fileName'];
                                     $company_document[$i]['exp'] =  $_POST['exp'][$i];
                                     $company_document[$i]['cn'] =  $_POST['cn'][$i];
  
                                    }
                          }
  
  $doc = ['document'=>$company_document];
  

  
       try {
          $s  =   ['content'=>'I '.$this->user->bn.' .farmer partner with email '.$this->user->email.' has upload one of my document'];
   
               
               Notification::sendNotification($this->user->user_id,'admin',$s['content']);
               
       
              
              DB::table($this->table)->where('user_id',$this->user->user_id)->update(['documents'=>json_encode($doc)]); //code...
                echo   json_encode(['suc'=>"documents updated successfully","url"=>" "]);         
           } catch (\PDOStatement $e) {
            echo   json_encode(['er'=>"Errorprocessing request"]); 
                        
     }               
  
  
    }else{
    echo   json_encode(['err'=>"Atleast one file is required"]);
      exit();
    }
  
  
   }
    
}