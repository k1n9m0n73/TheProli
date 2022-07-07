<?php
namespace App\Http\Controllers\Aggregator\AdminControllerTrait;

use Illuminate\Http\Request;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use Module\Notification;
trait Product
{ 

    
public function productStat($request,$who){
 
     // print_r($_POST);
    $y  = \date('Y',strtotime($this->actday()));
     

    //echo $y;
    
     $all  = DB::table('item_store');
     if($_POST['post0'] !="undefined" && !empty($request->input('post0')) && !empty( $request->input('post1')) && !empty( $request->input('post5'))) {
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
      $_d1  = $request->input('post0').'-'.$month_map[$request->input('post1')].'-'.$request->input('post2');
      $_d2  = $request->input('post3').'-'.$month_map[$request->input('post4')].'-'.$request->input('post5');
      $date1 =  \strtotime($_d1  );
      $date2 =  \strtotime( $_d2 );
  
      $de   = [$date1, $date2];
      $de2  = [$date2, $date1];
    
  $all = $all->whereBetween('item_uploadOn',$de);
    
  }
     else{
      $all =   $all->where('item_uploadOn',$y);
     }
    // ->toSql(); 
    $all = $all->where("item_uploader",$this->user->user_id) ->get();
    //print_r($all);
  //  exit;
       $conf =  0;
       $unconf = 0;
       $total  = \count($all);
       
      $jan=0;$feb=0;$mar=0;$apr=0;$may=0;$jun=0;$jul=0;$aug=0;$sep=0;$oct=0;$nov=0;$dec=0; 
      $jan1=0;$feb1=0;$mar1=0;$apr1=0;$may1=0;$jun1=0;$jul1=0;$aug1=0;$sep1=0;$oct1=0;$nov1=0;$dec1=0;//cpnf 
      $jan0=0;$feb0=0;$mar0=0;$apr0=0;$may0=0;$jun0=0;$jul0=0;$aug0=0;$sep0=0;$oct0=0;$nov0=0;$dec0=0; //unconf
    
        foreach ($all as $key => $value) {
       if ($value->conf ==1) {
             $conf +=1;
           }else{
            $unconf +=1;
           }
    
           ///////////////////
    
         $month = date("M",$value->item_uploadOn);
    
        switch ($month) {
          case 'Jan':
            $jan +=1;
              if ($value->conf ==1) {
               $jan1+=1;
             }else{
              $jan0 +=1;
             }
            break;
           case 'Feb':
            $feb +=1;
            if ($value->conf ==1) {
               $feb1+=1;
             }else{
              $feb0 +=1;
             }
            break;
            case 'Mar':
            $mar +=1;
            if ($value->conf ==1) {
               $mar1+=1;
             }else{
              $mar0 +=1;
             }
            break;
           case 'Apr':
            $apr +=1;
            if ($value->conf ==1) {
               $apr1+=1;
             }else{
              $apr0 +=1;
             }
            break;
            case 'May':
            $may +=1;
            if ($value->conf ==1) {
               $may1+=1;
             }else{
              $may0 +=1;
             }
            break;
            case 'Jun':
            $jun +=1;
            if ($value->conf ==1) {
               $jun1+=1;
             }else{
              $jun0 +=1;
             }
            break;
            case 'Jul':
            $jul +=1;
            if ($value->conf ==1) {
               $jul+=1;
             }else{
              $jul +=1;
             }
            break;
            case 'Aug':
            $aug +=1;
            if ($value->conf ==1) {
               $aug1+=1;
             }else{
              $aug0 +=1;
             }
            break;
            case 'Sep':
            $sep +=1;
            if ($value->conf ==1) {
               $sep1+=1;
             }else{
              $sep0 +=1;
             }
            break;
            case 'Oct':
            $oct +=1;
            if ($value->conf ==1) {
               $oct1+=1;
             }else{
              $oct0 +=1;
             }
            break;
            case 'Nov':
            $nov +=1;
            if ($value->conf ==1) {
               $nov1+=1;
             }else{
              $nov0 +=1;
             }
            break;
             case 'Dec':
            $dec +=1;
            if ($value->conf ==1) {
               $dec1+=1;
             }else{
              $dec0 +=1;
             }
            break;
          default:
            # code...
            break;
        }/////////////////////////////end of switch
    
        }
        
       
       $Montot = [$jan,$feb,$mar,$apr,$may,$jun,$jul,$aug,$sep,$oct,$nov,$dec];
    
       $Moncon= [$jan1,$feb1,$mar1,$apr1,$may1,$jun1,$jul1,$aug1,$sep1,$oct1,$nov1,$dec1];
       $MonUncon= [$jan0,$feb0,$mar0,$apr0,$may0,$jun0,$jul0,$aug0,$sep0,$oct0,$nov0,$dec0];
    
       echo json_encode(['data'=> [$MonUncon,$Moncon,$Montot,$unconf,$conf,$total],'p'=>$_POST ]);
    
    
    
    }
    


}    

?>