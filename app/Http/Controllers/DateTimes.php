<?php
 namespace App\Http\Controllers;
 trait DateTimes{

    public  function actday(){

        $tendif =  \time();
        
        $actDay = \date('Y-m-d', $tendif);
        return $actDay; 
        
        }
        
        public  function actday2(){
        
        $tendif =  \time();
        
        $actDay = \date('d M Y', $tendif);
        return $actDay; 
        
        }
        
        
        
        public  function actdaytime(){
        
        $tendif =  \time();
        
        $actDatTime  = \date('Y-m-d H:i:s',$tendif ); 
        return $actDatTime;
        }
        
    
    

 }
?>