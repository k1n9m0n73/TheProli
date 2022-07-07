<?php
namespace App\Http\Controllers\Warehouse\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Module\Escape;
use Module\FileUplaod;
class Profile extends Controller
{
    public function __construct()
    {  
     
          $this->middleware("auth:war");  
       
         $this->middleware(function ($request, $next ) {
            //////////////////////////////////////////////////////////////////////////////get the set user permission   
          $this->user= Auth::user();
          $this->table   = "warehouses";
         //////////////////////////////////////////////////////////////////////////////get the set user  role               
          return $next($request);
      });
       
     

    }

    public  function actday(){

      $tendif =  \time();
      
      $actDay = date('Y-m-d', $tendif);
      return $actDay; 
      
      }
      
      public  function actday2(){
      
      $tendif =  \time();
      
      $actDay = date('d M Y', $tendif);
      return $actDay; 
      
      }
      
      
      
      public  function actdaytime(){
      
      $tendif =  \time();
      
      $actDatTime  =date('Y-m-d H:i:s',$tendif ); 
      return $actDatTime;
      }
      
    public function index(Request $req)
    
    {  
      $poa  = [
         'Bubbed Wrap',
         'Carrier Bags',
         'Cardoard Boxes',
         'Export Boxes',
         'Gift Boxes',
         'Mailing Boxes',
         'Mailing Bags',
         'Packing chips',
         'Padded Envelops',
         'Pallet Boxes',
         'Postal Tubes',
         'Plastic Bags',
         'Agro sack'




      ];
  $so  = [
         'Open space storage' => [
              'Static Shelving',
              'Pallet Racking',
              'Wire Partitions',
              'Field storage (e.g animals stable)'
         ],
         'Close space(under roof system)'=>[
              'Static Shelving',
              'Mobile Shelving',
              'Multi-tier Racking',
              'Mezzanine Flooring',
              'Wire Partitions'
         ],
         'Temperature storage system'=>[
            'Ambient temperature system',
            'Refrigerator temperature system',
            'Freezer storage system'

         ]
     ];

        $po  = json_decode($this->user->po)->package;
        $soa = json_decode($this->user->so)->storage;
//print_r($soa);
        return view('warehouse.component.settings.profile',['user'=>Auth::user(),'po'=>$po,'poa'=>$poa,'soa'=>$soa,'so'=>$so ]);  
                     
                  
    }


   public function update(Request $request){
          
      

if (isset($_POST['update'])) {

   $chk = DB::table($this->table)->where('pn',$request->input("pn1"))->where('email',"!=",$this->user->email )->first();
   // , array($this->user->data()->pn."= '".$request->input("pn1")."' AND   email","!=" ,$this->user->data()->email));
   
   ///////////////////////////////////////////////////////////check main phone numbe
     if (!empty((array) $chk)) {
       echo  json_encode(['err'=>'That main phone number already exist']);
       exit();
   } 
   
   
   $val_arr  = [
      'bty'=>'Business type',
      'state'=>'State',
      'lga'=>'Lga',
      'area'=>'Area',
      'ad'=>'Address',
      'pn1'=>'Main phone number',
      'wc' =>"Warehouse capacity",
     
   ];
   
   if(empty($request->input('so'))){
      echo json_encode(['err'=>'storage option is required']);
      exit();
   }

   if(empty($request->input('po'))){
      echo json_encode(['err'=>'package option is required']);
      exit();
   }
   
   /***********************Checkif input is not array and is empty***************************/
        foreach ($val_arr as $key => $value) {
          if( empty(trim($_POST[$key]) )){
           echo json_encode(['err'=>$value.' is required']);
           exit();
          }
        }
       
   /***********************Checkif input is not array and is empty***************************/
    $selected_state_  = explode("__#__", $_POST['state']);
   $selected_lga_  = explode("__#__", $_POST['lga']);
   $selected_area_ = explode("__#__", $_POST['area']);
   
   $selected_city  = ['zone_id'=>$selected_state_[1] ,'state_id'=>$selected_lga_[0],'lga_name'=>$selected_lga_[1],'name'=>$selected_lga_[1],'latitude'=>$selected_area_[0],'longitude'=>$selected_area_[1],'area_name'=>$selected_area_[2]];
   
   $selected_state  = ['id'=>$selected_state_[0], 'zone_id'=> $selected_state_[1],'name'=>$selected_state_[2]];
        
   if(!preg_match("/\+234-\d{3}-\d{3}-\d{4}/",$request->input('pn1') )){
      echo  json_encode(['err'=>'Phone number format is not match the main phone number field, check the format again']);
      exit();
    }
            try{ 
   
                        
   
               $data =       [         
                                 'bn'=>  Escape::done($request->input('bn')),
                                 'bty'=>  Escape::done($request->input('bty')),
                              
                                 'cap'=> Escape::done($request->input('wc')),
                                 'so'=>json_encode(['storage'=>$request->input('so')]),
                                 'po'=>json_encode(['package'=>$request->input('po')]),
                           

                                 'ad'=>  Escape::done($request->input('ad')),
                                 'st'=>  $selected_state['name'],
                                 're'=>json_encode($selected_city),
                                 'pn'=>  Escape::done($request->input('pn1')),
                                 'opn'=> !empty($request->input('pn2')) ?Escape::done($request->input('pn2')):null,
                                 'updated_at'=> $this->actdaytime(),
                                 'event_time' => \strtotime( $this->actdaytime()),
                  

                  ];

                 // print_r($data);
           DB::table($this->table)->where('user_id',$this->user->user_id)->update($data);
     
   
    echo json_encode(["suc"=>"profile update successful","url"=>" " ]);   
   
   
                   }catch(\PDOException $e){
            
    //$_SESSION['error']= "Error handling data try again";
    echo json_encode(['err' =>'Error handling data try again']);
    exit();
   
            }
             
   
   
   
   }
   
   ///////////////isset
   

   }
    
   public function updateImage(Request $request){
      $imgPubPath   = 'usage/images/warimg/'; 
       
  
      $fileName = FileUplaod::uploadArr($_FILES['proImg'],1000000,true,$imgPubPath);

      if(array_key_exists('err', $fileName)){
       echo json_encode(['err'=>$fileName['err'] ]);
       exit();
      
      }else{
         $image = $imgPubPath.$fileName['fileName'];
         try {
            if(file_exists($this->user->img)){
               unlink($this->user->img);
            }
            DB::table($this->table)->where('user_id',$this->user->user_id)->update(['img'=>$image]); //code...
            echo json_encode(['suc'=>'Bank detail update successful',"image"=>$image]);
         } catch (\PDOException $th) {
            echo json_encode(['err'=>'Error processing request']); //throw $th;
         }
         
      }
   

   }
}