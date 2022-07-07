<?php
namespace App\Http\Controllers\Admin\Analytics\Trait;
use Illuminate\Http\Request;
use Module\Escape;
use Illuminate\Support\Facades\DB;
use Module\Notification;
trait Event
{ 

    
public function eventVistor($request){
         //print_r($_POST);
         $y  = \strtotime($this->actday());
     

         //echo $y;
         
        
          try {
            $all  = DB::table('event_log')->select(
               'id AS a_',
              'user_agent AS a',
              'type AS b',
              'page AS c',
              'date AS d',
              'log AS e'
            );
            
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
            $de=[];
            if(!empty($request->input('month_from'))){
              $_d1  = $request->input('year_from').'-'.$month_map[$request->input('month_from')].'-'.$request->input('day_from');
            $_d2  = $request->input('year_to').'-'.$month_map[$request->input('month_to')].'-'.$request->input('day_to');
            $date1 =  \strtotime($_d1  );
            $date2 =  \strtotime( $_d2 ); 
            $de   = [$date1, $date2]; 
            $de_   = [$_d1, $_d2];  
            }
            
            if(!empty($_POST['component'])){
               $all =   $all->where('type',Escape::done($_POST['component'])); 
            }

            if (!empty($de)  ) {
               $all = $all ->whereBetween('date',$de);
               //" AND item_uploadOn BETWEEN '".$_POST['dtf']."' AND '".$_POST['dtt']."'";
        
           }  else{
              $all =   $all->where('date',$y);
             }
            // ->toSql(); 
            $all = $all
            //->orderByDesc("date")
            ->get();
         //   ->where('date',$y)->get();
           
             echo json_encode(['data'=>$all,'p'=>$_POST ]);//code...
          } catch (\PDOException $th) {
             //throw $th;
          }
         

     

    }
    
    public function eventVistorDelete($request){
       $events = explode(',',$request->input('post0'));
       try {
           $suc   = [];
         foreach ($events as $key => $event) {
           DB::table('event_log')->where('id',$event)->delete();
         
         }      
        echo json_encode(['suc'=>'event deleted' ]);
         //code... //code...
       } catch (\PDOException $th) {
         echo json_encode(['err'=>'Error processing request' ]);//throw $th;
       }
        
    }

}    

?>