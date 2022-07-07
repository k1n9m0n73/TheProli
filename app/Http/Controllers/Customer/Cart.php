<?php
namespace App\Http\Controllers\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Wishlist;
use App\Models\Customer;
class Cart extends Controller{
           
  use Session;

    private  $cart = '_cart_';
    private $has_login  = 'customer_user_login';
  

    public function __construct(){

      $this->user=   $this->exists($this->has_login) ?Customer::where('user_id',$this->get($this->has_login))->first():[];
    }

    public function index(Request $request)
    {
       return view('customer.components.carts',['csp_'=>['id'=> '$id'  ],'user'=>$this->user]);
    }

    public function setItem($item){
      if(!$this->exists($this->cart)){
        $this->put($this->cart,[]);
      }
        return $item;
      }


      public  function addItemToCart($item_id,$item){
      
           $add = false;
      //   print_r($request->session()->all());

          if ($this->get($this->cart) ) {
            array_values($this->get($this->cart));
            $existing_items_id_array = (array_column($this->get($this->cart), 'id'));
            
            if (in_array($item_id, $existing_items_id_array)) {
                
                return $add;      
          
            }else{
                $new     = $this->get($this->cart);
                $this->get($this->cart)[count($this->get($this->cart))] = $item;
                $new[count($this->get($this->cart))]  = $item;
                $this->put($this->cart,$new);
                $add = true;
            }


            }else{
              $initItem  = [];
              $initItem[0]  = $item;
              $this->put($this->cart,$initItem);
                $add = true;

            }  

        return $add;

        }
    
      public function getItem() {
        
        $savedCart   = [];
        if(!empty($this->user) ){
          $savedCart  = DB::table('customers')->select('cart')->where("user_id",$this->get($this->has_login))->first();
          $savedCart  = !empty($savedCart)? json_decode($savedCart->cart,true ):[];
          

        }
          

         if($this->get($this->cart) != null && !empty($this->get($this->cart))){
         
           foreach($this->get($this->cart) as $itemIdex => $cart){ 
                $item_category  = DB::table("item_store")->where("item_id" ,$cart['id'])->first();
                $cart['rem']  = $item_category->item_qty;
                 $savedCart[$itemIdex ]  = $cart;
        
           }

          
         }
          
      
      
        $this->put($this->cart,  $savedCart);
         //   print_r($request->session()->get(self::$cart));//$request->session::all()[self::$cart]  = $savedCart;
        echo json_encode([
          "suc"=>"Item added to cart",
          //"data"=>!empty($request->session::get(self::$cart))?($request->session::get(self::$cart)):(!empty($request->session::get('user_customer'))?$savedCart:[]),
          'data'=>$savedCart,
         // !empty($request->session::get('user_customer'))?json_decode($request->session::get('user_customer')->cart): (!empty($request->session::get(self::$cart))?$request->session::get(self::$cart):[] )  ,
          "url_"=>" ",
          'item_num'=>!empty($savedCart) ?count($savedCart):0 ,
          'tot'=>!empty($savedCart) ?count($savedCart):0 ,
          'has_session_login'=> $this->exists($this->has_login)?1:0,
          'user'=> $this->user,
          'addresses'=> $this->exists($this->has_login)? DB::table('address_book')->where('cid',$this->get($this->has_login))->get():[],
        ]);
      }  


    public function addItem(){
   
       

        if(isset($_POST['post0']) ){
         $item  =  json_decode($_POST['post0']);
         $item_category  = DB::table("item_store")->where("item_id" ,$item->item)->first();
        if (empty($item_category)) {
        echo json_encode(["err"=>"Such item does not exist"]);
            exit();
        }
        if ($item_category->market_status == 0) {
         echo  json_encode(["err"=>"This item is out off stock"]);
           exit();
        }
           
          $data = [
       
            'id'=>$item_category->item_id,
            'na'=>$item_category->item_name,
            'qty'=>!empty($item->qty) ?$item->qty:1,
            'pr'=>$item_category->item_discount==1?$item_category->item_sell_price:$item_category->item_sell_price-($item_category->item_sell_price*$item_category->item_discount) ,
            'img'=>json_decode($item_category->item_images)->img[0],  
            'disc' =>$item_category->item_discount,
            'rem'=>$item_category->item_qty,
            'col'=>$item_category->item_col,
            'state'=>$item_category->item_state,
            'wei'=>$item_category->item_weight,
            'unit'=>$item_category->item_unit,
            'typ'=>$item_category->item_type,
            'loadon'=>$item_category->item_uploadOn,
          ];
         
               
          $items =  $this->setItem($data);
          $b= $this->addItemToCart($item_category->item_id, $items); 
                
          if($b==true){
          if ( $this->exists($this->has_login)&& !empty($this->get($this->has_login)) ) {
           DB::table("customers")
           ->where('user_id',$this->get($this->has_login))
           ->update(['cart'=>json_encode($this->get($this->cart))]  ) ;
          }
        
    
          echo json_encode([ "suc"=>"Item added to cart"]);
         }if($b==false){
           echo json_encode(["err"=>"Item already in cart"]);  
         } 
         try {
      
         
                  
         } catch (\Throwable $th) {
           print_r($th);
         echo json_encode(["err"=>"Network error"]);
         }
       
           

           }
             
    
    
    
    
    
    
       }
    
    
    
    
    
       public function updateCart(){
         if(isset($_POST['post0'])){
           $cart_item  = $this->get($this->cart); 
           $target_item  = $cart_item[$_POST['post1']];
              
              $target_item['qty']  =  $_POST['post0'];
          //    $target_item['pr']   =  $target_item['pr']*$_POST['post0'];
              $cart_item[$_POST['post1']]  =  $target_item ;  
             // $request->session::get(self::$cart)[$_POST['post1']]  =   $target_item;
              $this->put($this->cart,$cart_item);
              if (!empty($this->get($this->cart)) ) {
                DB::table("customers")
                ->where('user_id',$this->get($this->cart))
                ->update(['cart'=>json_encode($this->get($this->cart))]  ) ;
               }
              if(!empty($target_item)){

                echo json_encode(['suc'=>'done']);
              }else{
                echo json_encode(['err'=>'such item not found']);
              }

         }else{
          echo json_encode(['err'=>'419 error']);
         }
     
    
    }
    
    
    public  function handleRemoveOneItem($positionOfItemToRemove){
      if($this->get($this->cart)[$positionOfItemToRemove]) {
        $items  =$this->get($this->cart) ;
         unset($items[$positionOfItemToRemove]);
         $this->put($this->cart, array_values($items)  );
         return true;
      }else{
        return false;
      }
      
    }
    
    
    
      
       public function removeItemSingle(){
         if(isset($_POST['post0']) ) {
             $item  =  json_decode($_POST['post0']); 
            try {
               $this->handleRemoveOneItem($item->item);
               
               if (!empty($this->get($this->has_login)) ) {
                DB::table("customers")
                ->where('user_id',$this->get($this->has_login))
                ->update(['cart'=>json_encode($this->get($this->cart))]  ) ;
               }
               echo json_encode(["suc"=>"One item removed"]);
            } catch (\Throwable $th) {
               
              echo json_encode(["err"=>"Network error , try again", 'errroe'=>$th]);
            }
    
            
           }
         
       
    
       }
    
     
    
    

    public function addToWishList(Request $request){

      if(empty($this->user) ){
        echo json_encode(["err"=>"You have to login","url"=>"/login"]);
       exit();
      }
      $item = json_decode($_POST['post0'])->item;
   
       $pick1 =DB::table('item_wishlist')
       //->where('ci',$request->session::get('user_customer')->user_id)
       ->where('item_id',$item )
       ->first();
    
       if (!empty($pick1) ) {
        echo json_encode(["err"=>"Item already exist in whishlist"]);
       exit();
       }else{
       $obj   = DB::table('item_store')
       //->where('ci',$request->session::get('user_customer')->user_id)
       ->where('item_id',$item )
       ->first();
      
         try{ 
         
          $data = [
            'ci' =>$request->session()->get('user_customer'),
            'item_id'=>$item,
            'cateId'=>$obj->item_cateId,
            'subcateId' =>$obj->item_subcateId,
            'date'    =>\time(),
            'year'    =>\date('Y',\time())
  
          ];  
          DB::table('item_wishlist')->insert($data);
          //Wishlist::create($data);
        echo  json_encode(['suc'=>$obj->item_name." added to wishlist"]);
        exit();
                }catch(\Throwable $e){
  
                  echo json_encode(["err"=>"Error proceesing request"]);
                  exit();
         
                } 
       
       
       
       
       
       
              }
       
       
       
       
   
   
   }
   

  

}


?>