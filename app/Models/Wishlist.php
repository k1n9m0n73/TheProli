<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class WishList extends Model
{   
    public $timestamps = false;
    //protected $guarded = []; // to make all field fillable
     protected $table = 'item_wishlist';//the name of the guard in config/auth
     
     protected $fillable =[
        'ci', 'item_id', 'cateId', 'subcateId'
     ];

     protected $casts  = [];


    
}
