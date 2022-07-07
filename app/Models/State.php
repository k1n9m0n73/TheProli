<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class State extends Model
{
 
     protected $table = 'states_data';//the name of the guard in config/auth
     
     protected $fillable =[
         'is_selected'
     ];

     protected $casts  = [];


     public  static function getSelectedStates($query)
     {

       return $query->where('is_selected','=',1);

     }

}
