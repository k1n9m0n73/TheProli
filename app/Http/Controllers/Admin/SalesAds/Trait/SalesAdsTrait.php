<?php
namespace App\Http\Controllers\Admin\SalesAds\Trait;
use Module\Escape;
use Module\FileUplaod;
use Illuminate\Support\Facades\DB;
trait SalesAdsTrait{







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



  private function saveAds($req){
      
  if (isset($_POST['post1'])) {

    if (empty($_POST['ht'])) {
     echo  json_encode(['err'=>"Header text is required"]);
     exit();
    }
 
    if (empty($_POST['sht'])) {
     echo  json_encode(['err'=>"Subheader text is required"]);
     exit();
    }
   
    if ($_POST['sm'] ==4 && !filter_var($_POST['url'],FILTER_SANITIZE_URL)) {
     echo  json_encode(['err'=>"The url you enter is not valid"]);
     exit();
    }

    
    ///////////////////////////////////////////////////////////

    if ($_POST['post1']=='save') {
        $file = '';
        $path   = 'usage/images/advimg/';
        if (!empty($_FILES['file']['name'])) {
         $files =  FileUplaod::uploadArr($_FILES['file'],10000000,true,$path) ; 
        $file = $path.$files['fileName'];
         if ( array_key_exists('err', $files)) {
            echo  json_encode(['err'=> $files['err'] ]);
            exit();
           }
        
        
        // $magicianObj = new imageLib('usage/images/advimg/'.$file);
        // $magicianObj->resizeImage(597, 458, 'crop', true);
        // $magicianObj -> saveImage('usage/images/advimg/'.$file, 100);
        
        }else{
           echo  json_encode(['err'=>"Image is required"]);
            exit();
        }
        
      //  print_r($_POST);
        
        
         $data = [
            'ht'=>Escape::done($req->input("ht")),
            'sht'=>Escape::done($req->input("sht")),
            'url'=>Escape::done($req->input("url")),
            'item'=>Escape::done($req->input("post0")),
            'image'=>$file,
            'dates'=>$this->actday(),
          
          ];
        
          try {
        

              DB::table('store_advert')->insert($data);
         
               echo  json_encode(['suc'=>'Advert saved']);
            
          } catch (\PDOException $e) {
              echo  json_encode(['err'=>'Error processing request']);
              
          }
        
           }  
        

    ////////////////////////////////////////////////////////

   }
  }

  private function getAds($request){
    $month_map  = [
        "January"=>"01",
        "February"=>"02",  
        "March"=>"03",
        "April"=>"04",
        "May"=>"05",
        "June"=>"06",
        "July"=>"07",
        "August"=>"08",
        "September" =>"09",
        "Octomber"=>"10",
        "November"=>"11",
        "December"=>"12"
      ];
      $item  = DB::table("store_advert");
    // ->select(
    //    'id AS a_', 
    //    'content AS a', 
    //    'sto AS b', 
    //    'sfrom AS c',
    //    'date AS d', 
    //    'rp As e',
    //    'delf As f', 
    //    'delt As g',
    //    'rd  AS h'
    //   )
    if(!empty( $request->input('year') )){
        $item  =$item->where('dates','regexp', Escape::done( $request->input('year').'-' ));
      }
  
      if(!empty( $request->input('month') )){
        $item  =$item->where('dates','regexp' ,Escape::done( $month_map[$request->input('month').'-' ]));
      }

      $item =  $item->get();
      if(count( $item )  > 0  ){
         echo json_encode(['data'=>  $item]); 
        
      }else{
        echo json_encode(['data'=>[],'cont'=>[]]); 
      }  
  }

   
  
   private function editAds($req){
        
  if (isset($_POST['post1'])) {

    if (empty($_POST['ht'])) {
     echo  json_encode(['err'=>"Header text is required"]);
     exit();
    }
 
    if (empty($_POST['sht'])) {
     echo  json_encode(['err'=>"Subheader text is required"]);
     exit();
    }
   
    if ($_POST['sm'] ==4 && !filter_var($_POST['url'],FILTER_SANITIZE_URL)) {
     echo  json_encode(['err'=>"The url you enter is not valid"]);
     exit();
    }

    
    ///////////////////////////////////////////////////////////

    if ($_POST['post1']=='update') {
        $file = '';
        $path   = 'usage/images/advimg/';
        if (!empty($_FILES['file']['name'])) {
         $files =  FileUplaod::uploadArr($_FILES['file'],10000000,true,$path) ; 
        $file = $path.$files['fileName'];
         if ( array_key_exists('err', $files)) {
            echo  json_encode(['err'=> $files['err'] ]);
            exit();
           }
        
        
        // $magicianObj = new imageLib('usage/images/advimg/'.$file);
        // $magicianObj->resizeImage(597, 458, 'crop', true);
        // $magicianObj -> saveImage('usage/images/advimg/'.$file, 100);
        
        }else{
            $file = Escape::done($req->input("filename"));
        }
        
      //  print_r($_POST);
        
        
         $data = [
            'ht'=>Escape::done($req->input("ht")),
            'sht'=>Escape::done($req->input("sht")),
            'url'=>Escape::done($req->input("url")),
            'item'=>strlen(Escape::done($req->input("post0"))) !=0 && !empty(strlen(Escape::done($req->input("post0"))))? Escape::done($req->input("post0")) : Escape::done($req->input("name_")),
            'image'=>$file,
            'updates'=>$this->actday(),
          
          ];
        
          try {
        

            $d  =   DB::table('store_advert')->where('id',Escape::done($req->input('advid')) )->update($data);
           if(!$d){
            echo  json_encode(['err'=>'Error processing request']);
            exit();  
           }
           echo  json_encode(['suc'=>'Advert update']);
            
          } catch (\PDOException $e) {
              echo  json_encode(['err'=>'Error processing request']);
              
          }
        
           }  
        

    ////////////////////////////////////////////////////////

   } 
   }
   

   private function deleteAds($req){
       $ids  = explode(",",$_POST['post0']);
       try {
        foreach ($ids  as $key => $value) {
         $item = DB::table('store_advert')->where("id",$value)->first();
         if(empty((array)$item) ){
            echo json_encode(["err"=>"Item not found"]);
            exit();
         }
       
         if (file_exists($item->image)) {
           unlink($item->image);
          
          } 
     
               DB::table('store_advert')->where('id',$value)->delete(); 
       }
      
         echo json_encode(["suc"=>"advert deleted"]);
     
        } catch (\PDOException $e) {
          echo json_encode(["err"=>"Error processing request"]);
       }
     
       
   }

}

?>




