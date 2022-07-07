<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Module\Escape;
use Illuminate\Support\Facades\DB;
class Employment extends Controller
{
    public function __construct()
   {
    //var_dump(Session());
   $this->middleware("auth:admin"); ////place this to see the login user 
   //the name of the guard in config/auth
                                                        //redirect by middleware in Http/middleware/RedirectIfAutheticated  
                                                        ///SESSION is for customer
}

 public function getView()
 {
     return view('admin.component.employment.list',['user'=>Auth::user()]);
 }  
  
 
public function addEmployment(Request $request){
   
    $summer_images  = [];
    if(Session::has('summer_imgs')){
        $summer_images  = Session::get('summer_imgs');
       // Session::pull('summer_imgs');
    }


                $summerCont  =json_decode( json_decode(json_encode(json_decode($_POST['post0'])[0])) );///////array
                $imageSummer = json_decode(json_decode(json_encode(json_decode($_POST['post0'])[1])));//////////array
                /* sumer content is an aray 0 index is the fir content of summernote html elemet*/
            
            
            if(empty($_POST['to'])) {
                echo  json_encode(['err'=>'Deadline date is required']);
                exit();
            }
            
            if(empty($_POST['from'])) {
                echo  json_encode(['err'=>'Start date is required']);
                exit();
            }
            
            $data  = [
            'partner' =>$_POST['part'],
            'content' =>Escape::done(json_encode(Escape::done( $summerCont) )),
            'content_img'=>json_encode($summer_images),
            'starts'=>strtotime($_POST['from']),
            'dead_line'=>strtotime($_POST['to']),
            ];
        
            
            $chk1  = DB::table('employ')->where('partner',$_POST['part'])->first();
           
            if(!empty($chk1)) {
                echo  json_encode(['err'=>'Record for '.$_POST['part']." already exist"]);
                exit();
            }
         try {
        
            DB::table('employ')->insert($data);
            Session::pull('summer_imgs');
            echo  json_encode(['suc'=>'Employment registration saved','url'=>' ']);
                
            } catch (\Throwable $e) {
            echo  json_encode(['err'=>'Error processing request']);
                
            }  
                    
} 




public function getEmployment(Request $request){
    try {
       $data  = DB::table('employ')->select('id AS a', 'content AS b', 'content_img AS c', 'starts  AS d', 'dead_line AS e', 'partner As f');

       if($_POST['post0']=='single'){
    
         $data  = (array) $data->where('id',$_POST['post3'])->first();
         

         $data['b']  = Escape::reverse($data['b']);

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


public function updateEmployment(Request $request,$id= null){
   
    $summer_images  = [];
    if(Session::has('summer_imgs')){
        $summer_images  = Session::get('summer_imgs');
       // Session::pull('summer_imgs');
    }


                $summerCont  =json_decode( json_decode(json_encode(json_decode($_POST['post0'])[0])) );///////array
                $imageSummer = json_decode(json_decode(json_encode(json_decode($_POST['post0'])[1])));//////////array
                /* sumer content is an aray 0 index is the fir content of summernote html elemet*/
            
            
            if(empty($_POST['to'])) {
                echo  json_encode(['err'=>'Deadline date is required']);
                exit();
            }
            
            if(empty($_POST['from'])) {
                echo  json_encode(['err'=>'Start date is required']);
                exit();
            }
            
            $data  = [
            'partner' =>$_POST['part'],
            'content' =>Escape::done( json_encode( $summerCont) ),  
            'content_img'=>json_encode($summer_images),
            'starts'=>strtotime($_POST['from']),
            'dead_line'=>strtotime($_POST['to']),
            ];
        //     echo(gettype(json_encode( $summerCont)));
        //     print_r($data);
        //    // print_r($request->all());
        //     exit();
            
            $chk  = DB::table('employ')->where('id',$_POST['updateId'])->first();
           
            if ( (!empty(json_decode($chk->content_img)))   ) {
                $prev_imgs   = json_decode($chk->content_img); # code...
                //print_r($imageSummer);
                foreach ( $prev_imgs as $key => $img) {
                      
                      if (!in_array($img, $imageSummer)) {
                         if (file_exists(ltrim( $img,'/'))) {
                          unlink(ltrim( $img,'/'));
                         }
                       // array_push($img_to_del, $img);
                      }
              
                }
              
               } 
              
         try {
        
            DB::table('employ')->where('id',$_POST['updateId'])->update($data);
            Session::pull('summer_imgs');
            echo  json_encode(['suc'=>'Employment registration updated','url'=>'']);
                
            } catch (\Throwable $e) {
            echo  json_encode(['err'=>'Error processing request']);
                
            }  
                    
} 

public function deleteEmployment(){

    $p  = explode(",", $_POST['post0']);


    try {
        foreach ($p as $key => $value) {
          $chk  = DB::table('employ')->where('id',$value)->first();
           
    
     if ( (!empty(json_decode($chk->content_img)))   ) {
      $prev_imgs   = json_decode($chk->content_img); 
     // print_r($prev_imgs);
      foreach ( $prev_imgs as $key => $img) {
               if (file_exists(ltrim( $img,'/') )) {
                //   echo($img);
              unlink(ltrim( $img,'/'));
             // array_push($img_to_del, $img);
            }
    
      }
    
     } 
    
    
      DB::table('employ')->where('id',$value)->delete();
          # code...
        }
    
    
    echo json_encode(['suc'=>count($p)." record deleted"]);
    
    } catch (\Throwable $e) {
      echo json_encode(['err'=>"Error processing request"]);
    }

}

}
