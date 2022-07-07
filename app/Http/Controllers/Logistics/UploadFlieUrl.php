<?php

namespace App\Http\Controllers\Logistics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Auth;

class UploadFlieUrl extends Controller
{
    //
    public function __construct()
    {  
      
          $this->middleware("auth:log");  
       
     
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
        

          return $next($request);
      });
       
     

    }

    public function upload(Request $request,$path=null){
         //  print_r($request->all());
          
           $store_dir  = str_replace("_","/",$path);
         //  echo  $store_dir;
           $imgStorePath   = $path? $store_dir:'usage/images/desc-pimg/';
           $img_arr = [];
           for ($i=0; $i < count($request->all()) ; $i++) { 
            $file = $request['post'.$i];
            $na= $this->upload_2($file, public_path( $imgStorePath),$i+1 );
            if (!empty( $na['fileName']) ) {
                array_push($img_arr, $imgStorePath.'/'.$na['fileName'] ); 
              }else{
               
                return response()->json($na);  
                exit();
              }
          //  print_r($file);
           }
        Session::put(Auth::user()->email,$img_arr);
       echo  json_encode(['data'=>$img_arr ]);
             
}
 




    public function upload_2($post,$path ,$no=1){
        $img = $post;
        $folderPath =$path;
        $image_parts = explode(";base64,", $img);
        //print_r($image_parts);
        if (!empty($image_parts[1])) {
          # code...
        
        $image_type_aux = explode("image/", $image_parts[0]);
       
        $image_type = $image_type_aux[1];
      
        $image_base64 = base64_decode($image_parts[1]);
        //echo $image_base64 ;
     $objId = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYS1234567890'),0,24);
      
      $alex = array('jpeg','jpg','png','gif','docs','xlsx','xlx','docx','txt','pdf','mp4','mp3','ogg','avi','mpeg');
    if (in_array($image_type,$alex)) {
      $fileName =  $objId .'.'.$image_type;
      
        $file = $folderPath.'/'.$fileName;
        file_put_contents($file, $image_base64);
      }else{
    //$_SESSION['error'] = $image_type." Extension is not alloewd";
    return ['err'=>$image_type." Extension is not allowed for image number ".$no];
    exit();
    
      }
    
    
      
    
       return ['suc'=>true,'fileName'=>$fileName];
    }else{
        return ['err'=>" Content is empty"];
    }
    
       
    }
    
    
}
