<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Module\Escape;
use PhpParser\Node\Expr\Print_;
use PHPUnit\Util\Json;

class Event extends Controller
{  
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
        
        
        public function getIp(){
          foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
              if (array_key_exists($key, $_SERVER) === true){
                  foreach (explode(',', $_SERVER[$key]) as $ip){
                      $ip = trim($ip); // just to be safe
                      if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                          return $ip;
                      }
                  }
              }
          }
          return request()->ip()."_9089"; // it will return server ip when no client ip found
      }

      public function get_user_iP()
        {
            // Get real visitor IP behind CloudFlare network
            if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                      $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                      $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }
            $client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = $_SERVER['REMOTE_ADDR'];
        // echo "string";
         //echo $remote; 
           $ip = '';
        
         if(filter_var($client, FILTER_VALIDATE_IP))
            {
                $ip = $client;
            }
            elseif(filter_var($forward, FILTER_VALIDATE_IP))
            {
                $ip = $forward;
            }
            else
            {
                $ip = $remote;
            }
        //$detail = json_decode(file_get_contents("http://www.ipinfo.io/".$ip."/json"),true);
          //  $detail = json_decode(file_get_contents("https://www.ipinfo.io/{$ip}/json"));
        //  echo "https://extreme-ip-lookup.com/json/{$ip}";
       // echo $this->getIp();

       // echo "http://www.geoplugin.net/php.gp?ip={$ip}";
           // $detail = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip={$ip}"));
           // $detail = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=197.255.175.159"));
           $detail  = file_get_contents("https://extreme-ip-lookup.com/json/{$ip}");
           // echo  $ip ;
            // print_r($detail);
            
            return $detail  ;
        }
        function getBrowser() {
  
	
          $browser = '';
           $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
           if (preg_match('~(?:msie ?|trident.+?; ?rv: ?)(\d+)~', $ua, $matches)) $browser = 'ie ie'.$matches[1];
           elseif (preg_match('~(safari|chrome|firefox)~', $ua, $matches)) $browser = $matches[1];
         
           return $browser;
         }
         
         
         function operating_system_detection(){
           if ( isset( $_SERVER ) ) {
             $agent = $_SERVER['HTTP_USER_AGENT'];
           }
           else {
             global $HTTP_SERVER_VARS;
             if ( isset( $HTTP_SERVER_VARS ) ) {
               $agent = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
             }
             else {
               global $HTTP_USER_AGENT;
               $agent = $HTTP_USER_AGENT;
             }
           }
           $ros[] = array('Windows XP', 'Windows XP');
           $ros[] = array('(Windows NT 5.1|Windows NT5.1)', 'Windows XP');
           $ros[] = array('Windows 2000', 'Windows 2000');
           $ros[] = array('Windows NT 5.0', 'Windows 2000');
           $ros[] = array('Windows NT 4.0|WinNT4.0', 'Windows NT');
           $ros[] = array('Windows NT 5.2', 'Windows Server 2003');
           $ros[] = array('Windows NT 6.0', 'Windows Vista');
           $ros[] = array('Windows NT 7.0', 'Windows 7');
           $ros[] = array('Windows CE', 'Windows CE');
           $ros[] = array('(media center pc).([0-9]{1,2}\.[0-9]{1,2})', 'Windows Media Center');
           $ros[] = array('(win)([0-9]{1,2}\.[0-9x]{1,2})', 'Windows');
           $ros[] = array('(win)([0-9]{2})', 'Windows');
           $ros[] = array('(windows)([0-9x]{2})', 'Windows');
           // Doesn't seem like these are necessary...not totally sure though..
           $ros[] = array('(winnt)([0-9]{1,2}\.[0-9]{1,2}){0,1}', 'Windows NT');
           $ros[] = array('(windows nt)(([0-9]{1,2}\.[0-9]{1,2}){0,1})', 'Windows NT'); // fix by bg
           $ros[] = array('Windows ME', 'Windows ME');
           $ros[] = array('Win 9x 4.90', 'Windows ME');
           $ros[] = array('Windows 98|Win98', 'Windows 98');
           $ros[] = array('Windows 95', 'Windows 95');
           $ros[] = array('(windows)([0-9]{1,2}\.[0-9]{1,2})', 'Windows');
           $ros[] = array('win32', 'Windows');
           $ros[] = array('(java)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,2})', 'Java');
           $ros[] = array('(Solaris)([0-9]{1,2}\.[0-9x]{1,2}){0,1}', 'Solaris');
           $ros[] = array('dos x86', 'DOS');
           $ros[] = array('unix', 'Unix');
           $ros[] = array('Mac OS X', 'Mac OS X');
           $ros[] = array('Mac_PowerPC', 'Macintosh PowerPC');
           $ros[] = array('(mac|Macintosh)', 'Mac OS');
           $ros[] = array('(sunos)([0-9]{1,2}\.[0-9]{1,2}){0,1}', 'SunOS');
           $ros[] = array('(beos)([0-9]{1,2}\.[0-9]{1,2}){0,1}', 'BeOS');
           $ros[] = array('(risc os)([0-9]{1,2}\.[0-9]{1,2})', 'RISC OS');
           //$ros[] = array('os/2', 'OS/2');
           $ros[] = array('freebsd', 'FreeBSD');
           $ros[] = array('openbsd', 'OpenBSD');
           $ros[] = array('netbsd', 'NetBSD');
           $ros[] = array('irix', 'IRIX');
           $ros[] = array('plan9', 'Plan9');
           $ros[] = array('osf', 'OSF');
           $ros[] = array('aix', 'AIX');
           $ros[] = array('GNU Hurd', 'GNU Hurd');
           $ros[] = array('(fedora)', 'Linux - Fedora');
           $ros[] = array('(kubuntu)', 'Linux - Kubuntu');
           $ros[] = array('(ubuntu)', 'Linux - Ubuntu');
           $ros[] = array('(debian)', 'Linux - Debian');
           $ros[] = array('(CentOS)', 'Linux - CentOS');
           $ros[] = array('(Mandriva).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)', 'Linux - Mandriva');
           $ros[] = array('(SUSE).([0-9]{1,3}(\.[0-9]{1,3})?(\.[0-9]{1,3})?)', 'Linux - SUSE');
           $ros[] = array('(Dropline)', 'Linux - Slackware (Dropline GNOME)');
           $ros[] = array('(ASPLinux)', 'Linux - ASPLinux');
           $ros[] = array('(Red Hat)', 'Linux - Red Hat');
           // Loads of Linux machines will be detected as unix.
           // Actually, all of the linux machines I've checked have the 'X11' in the User Agent.
           //$ros[] = array('X11', 'Unix');
           $ros[] = array('(linux)', 'Linux');
           $ros[] = array('(amigaos)([0-9]{1,2}\.[0-9]{1,2})', 'AmigaOS');
           $ros[] = array('amiga-aweb', 'AmigaOS');
           $ros[] = array('amiga', 'Amiga');
           $ros[] = array('AvantGo', 'PalmOS');
           //$ros[] = array('(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1}-([0-9]{1,2}) i([0-9]{1})86){1}', 'Linux');
           //$ros[] = array('(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1} i([0-9]{1}86)){1}', 'Linux');
           //$ros[] = array('(Linux)([0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}(rel\.[0-9]{1,2}){0,1})', 'Linux');
           $ros[] = array('[0-9]{1,2}\.[0-9]{1,2}\.[0-9]{1,3}', 'Linux');
           $ros[] = array('(webtv)/([0-9]{1,2}\.[0-9]{1,2})', 'WebTV');
           $ros[] = array('Dreamcast', 'Dreamcast OS');
           $ros[] = array('GetRight', 'Windows');
           $ros[] = array('go!zilla', 'Windows');
           $ros[] = array('gozilla', 'Windows');
           $ros[] = array('gulliver', 'Windows');
           $ros[] = array('ia archiver', 'Windows');
           $ros[] = array('NetPositive', 'Windows');
           $ros[] = array('mass downloader', 'Windows');
           $ros[] = array('microsoft', 'Windows');
           $ros[] = array('offline explorer', 'Windows');
           $ros[] = array('teleport', 'Windows');
           $ros[] = array('web downloader', 'Windows');
           $ros[] = array('webcapture', 'Windows');
           $ros[] = array('webcollage', 'Windows');
           $ros[] = array('webcopier', 'Windows');
           $ros[] = array('webstripper', 'Windows');
           $ros[] = array('webzip', 'Windows');
           $ros[] = array('wget', 'Windows');
           $ros[] = array('Java', 'Unknown');
           $ros[] = array('flashget', 'Windows');
           // delete next line if the script show not the right OS
           //$ros[] = array('(PHP)/([0-9]{1,2}.[0-9]{1,2})', 'PHP');
           $ros[] = array('MS FrontPage', 'Windows');
           $ros[] = array('(msproxy)/([0-9]{1,2}.[0-9]{1,2})', 'Windows');
           $ros[] = array('(msie)([0-9]{1,2}.[0-9]{1,2})', 'Windows');
           $ros[] = array('libwww-perl', 'Unix');
           $ros[] = array('UP.Browser', 'Windows CE');
           $ros[] = array('NetAnts', 'Windows');
           $file = count ( $ros );
           $os = '';
           for ( $n=0 ; $n<$file ; $n++ ){
             //echop($ros[$n]).'<br>';
             if ( preg_match('/'.$ros[$n][0].'/i' , $agent, $name)){
               $os = @$ros[$n][1].' '.@$name[2];
               break;
             }
           }
           return trim ( $os );
         }
         
         function getOsBrowser(){
         return    $this->operating_system_detection(). ' using '.$this-> getBrowser().' browser';
         }
    public function eventLog(Request $request){
        $url  = $_POST['post2'];
        $stm = $_POST['post1'];
        $user= $_POST['post0'];
        if (empty($user)) {
         die("NO DIRECT ACCESS");
        }
         
        $data1 = ['user' =>$user,
        'time'=>strtotime($this->actdaytime()),
        'type'=>$user,
        'os'=>PHP_OS,
        'lat'=>$_POST['post3'],
        'lng'=>$_POST['post4'],
      ];
          $url  = $_POST['post2'];
          $stm = $_POST['post1'];
         if (!preg_match("/jpg|png|jpeg|pdf/", $url) ) {
             
          $id = substr(str_shuffle("abcdefghijklnmoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0,40);
        $y  = date("Y",strtotime($this->actday())); 
             $data = [
               'id'=>$id,
              'ip_address'    => $request->ip(),
              'user_agent'    => $this->getOsBrowser(),
              'log'           => json_encode($data1),
              'type'          => $user,
              'page'          => $url,
              //'user'          => $stm.' got',
              'date'          => strtotime($this->actday()),
              'year'          => $y,
            ];
           //print_r($data);
           // DB::table("event_log")->truncate();  
            //
            try {
                DB::table("event_log")->insert($data);
              echo json_encode(['suc'=>'done']);
               // $this->user->create($data,"event_log");
            } catch (\PDOException $e) {
         //    print_r($e);
            }
        
        
          } 
         
        
        }
        



  public function search(Request $request){
  
    if(isset($_POST['post0'])){
      $ob   = json_decode($_POST['post0']);
       $map  = [
         'aiNUI'=>['table'=>'shop_orders','props'=>1 ],
         'aiNUIUyy'=>['table'=>'item_store','props'=>2],
         'aiNUIWiid'=>['table'=>'admins','props'=>3],
         'iNOM0SuJ'=>['table'=>'aggregators','props'=>4],
         'uhGfQKrg'=>['table'=>'customers','props'=>5],
         'WErtRT33hf'=>['table'=>'farmers','props'=>6],
         'WErtRT33hfQWed1W'=>['table'=>'hubs','props'=>7],
         'jfjjjjjjj$WWR'=>['table'=>'logistics','props'=>8   ],
         'WErtRT33hfWa'=>['table'=>'warehouses','props'=>9],
       ];
      $table  = $map[$ob->find]['table'];
      $search = Escape::done($ob->Id);
      $props   = $map[$ob->find]['props'];
    // echo $props;
    //print_r($map[$ob->find]);
       if($props ==1){
        $item_category    = DB::table($table)
         ->where('order_id','LIKE', "%$search%")
         ->orWhere('tid','LIKE', "%$search%");
         
         if(isset($_POST['post3'])){
           ///////////////////////////////////////////////////////////////
          if($_POST['post3']=='store'){
          $item_category   = $item_category->where(function($DB) use($search){
            $DB->where('item_store','regexp', $_POST['post4']);
          });

        }
          
         
          //->where('item_store',Escape::done($_POST['post4']));
          //////////////////////////////////////////////////////////////////
         }

        $item_category  = $item_category ->get()
         ->toArray();
         ;
   
       $item_category2   = [];
         if(!empty($item_category)){
           foreach ($item_category as $key => $value) {
            $value  = (array)$value;
            
          $item_category2[$key]['fn_'] = json_decode($value['item_order'])->na;
          $item_category2[$key]['img_'] = json_decode($value['item_order'])->img;
          $item_category2[$key]['href_']  = '/admin/order/details__'.$value['data_id'];
          $item_category2[$key]['note_'] = "The search item is order ";
            }
            echo  json_encode(['data'=>$item_category2,'total'=>count($item_category)  ]);
         }else{
          echo  json_encode(['data'=>[],'total'=>0  ]); 
         }
         

       

       }
       else if($props ==2){
        
        $item_category    = DB::table($table)
        ->where('item_name','LIKE', "%$search%")
        ->orWhere('item_cateName','LIKE', "%$search%")
        ->orWhere('item_subcateName','LIKE', "%$search%")
        ->orWhere('item_type','LIKE', "%$search%")
        ->orWhere('item_sku','LIKE', "%$search%");
       

        $item_category  = $item_category ->get()->toArray()
        ;
        $item_category2 = [];
        if(!empty($item_category)){
        foreach ($item_category as $key => $value) {
          $value  = (array)$value;
             $item_category2[$key]['fn_'] = $value['item_name'];
            $item_category2[$key]['img_'] =json_decode($value['item_images'])->img[0];
            $item_category2[$key]['href_'] = '/admin/product/view_detail__'.$value['item_id'];
            $item_category2[$key]['note_'] = "The search item is one of the item on the PROLI market with sku ".$value['item_sku'];
       }
       echo  json_encode(['data'=>$item_category2,'total'=>count( $item_category)  ]);
        }else{
          echo  json_encode(['data'=>[],'total'=>0  ]);
        }


       }

       else if($props ==3){
        
        $item_category    =  DB::table($table)
        ->select('user_id','img','email','fn')
        ->where('email','LIKE', "%$search%")
        ->get()->toArray(); 
        $item_category2 = [];
        if(!empty($item_category)){
    foreach ($item_category as $key => $value) {
      $value  = (array) $value;

      $item_category2[$key]['fn_'] = $value['email'];
      $item_category2[$key]['img_'] = !empty($value['img'])  ? $value['img']:"usage/demo/img/profile-pics/8.jpg";
      $item_category2[$key]['href_']  ='/admin/user/admin/view_detail/'.$value['user_id'];
      $item_category2[$key]['note_'] = "The search item is admin ";
                     
        }

      echo  json_encode(['data'=>$item_category2,'total'=>count($item_category)  ]);
      }else{
        echo  json_encode(['data'=>[],'total'=>0  ]);
      }


       }
       else if($props ==4){
         //"pid,bn,img,email"
        $item_category    = DB::table($table)
        ->select('user_id','img','email','bn')
         ->where('email','LIKE', "%$search%")
         ->orWhere('bn','LIKE', "%$search%")->get()->toArray();
         ;
         $item_category2 = [];
         if(!empty($item_category)){
         foreach ($item_category as $key => $value) {
          $value  = (array) $value;
          $item_category2[$key]['fn_'] = $value['email'];
          $item_category2[$key]['img_'] = !empty($value['img'])  ? $value['img']:"usage/demo/img/profile-pics/8.jpg";
          $item_category2[$key]['href_']  ='/admin/user/agg/view_detail/'.$value['user_id'];
          $item_category2[$key]['note_'] = "The search item is aggregator partner";
          }

           echo  json_encode(['data'=>$item_category2,'total'=>count($item_category)  ]);
          }else{
            echo  json_encode(['data'=>[],'total'=>0  ]);
          }

       }
      
       else  if($props ==5){
        
      $item_category    = DB::table($table)
        ->select('user_id','img','email','fn')
         ->where('email','LIKE', "%$search%")
         ->orWhere('telephone','LIKE', "%$search%")->get()->toArray();
         ;
         $item_category2 = [];
         if(!empty($item_category)){
         foreach ($item_category as $key => $value) {
          $value  = (array) $value;
          $item_category2[$key]['fn_'] = $value['email'];
          $item_category2[$key]['img_'] = !empty($value['img'])  ? $value['img']:"usage/demo/img/profile-pics/8.jpg";
          $item_category2[$key]['href_']  ='/admin/user/cus/view_detail/'.$value['user_id'];
          $item_category2[$key]['note_'] = "The search item is customer partner";
          }

           echo  json_encode(['data'=>$item_category2,'total'=>count($item_category)  ]);
          }else{
            echo  json_encode(['data'=>[],'total'=>0  ]);
          }



       }
       else  if($props ==6){
        
        $item_category    = DB::table($table)
          ->select('user_id','img','email','bn')
           ->where('email','LIKE', "%$search%")
           ->orWhere('pn','LIKE', "%$search%")->get()->toArray();
           ;
           $item_category2 = [];
           if(!empty($item_category)){
           foreach ($item_category as $key => $value) {
            $value  = (array) $value;
            $item_category2[$key]['fn_'] = $value['bn'];
            $item_category2[$key]['img_'] = !empty($value['img'])  ? $value['img']:"usage/demo/img/profile-pics/8.jpg";
            $item_category2[$key]['href_']  ='/admin/user/far/view_detail/'.$value['user_id'];
            $item_category2[$key]['note_'] = "The search item is farmer partner";
            }
  
             echo  json_encode(['data'=>$item_category2,'total'=>count($item_category)  ]);
            }else{
              echo  json_encode(['data'=>[],'total'=>0  ]);
            }
  
  
  
         }
       

         else if($props ==7){
        
          $item_category    = DB::table($table)
            ->select('user_id','img','email','bn')
             ->where('email','LIKE', "%$search%")
             ->orWhere('pn','LIKE', "%$search%")->get()->toArray();
             ;
             $item_category2 = [];
             if(!empty($item_category)){
             foreach ($item_category as $key => $value) {
              $value  = (array) $value;
              $item_category2[$key]['fn_'] = $value['email'];
              $item_category2[$key]['img_'] = !empty($value['img'])  ? $value['img']:"usage/demo/img/profile-pics/8.jpg";
              $item_category2[$key]['href_']  ='/admin/user/hub/view_detail/'.$value['user_id'];
              $item_category2[$key]['note_'] = "The search item is hub partner";
              }
    
               echo  json_encode(['data'=>$item_category2,'total'=>count($item_category)  ]);
              }else{
                echo  json_encode(['data'=>[],'total'=>0  ]);
              }
    
    
    
           }



           else if($props ==8){
        
            $item_category    = DB::table($table)
              ->select('user_id','img','email','bn')
               ->where('email','LIKE', "%$search%")
               ->orWhere('pn','LIKE', "%$search%")->get()->toArray();
               ;
               $item_category2 = [];
               if(!empty($item_category)){
               foreach ($item_category as $key => $value) {
                $value  = (array) $value;
                $item_category2[$key]['fn_'] = $value['email'];
                $item_category2[$key]['img_'] = !empty($value['img'])  ? $value['img']:"usage/demo/img/profile-pics/8.jpg";
                $item_category2[$key]['href_']  ='/admin/user/log/view_detail/'.$value['user_id'];
                $item_category2[$key]['note_'] = "The search item is logistics partner";
                }
      
                 echo  json_encode(['data'=>$item_category2,'total'=>count($item_category)  ]);
                }else{
                  echo  json_encode(['data'=>[],'total'=>0  ]);
                }
      
      
      
             }



             else if($props ==9){
        
              $item_category    = DB::table($table)
                ->select('user_id','img','email','bn')
                 ->where('email','LIKE', "%$search%")
                 ->orWhere('pn','LIKE', "%$search%")->get()->toArray();
                 ;
                 $item_category2 = [];
                 if(!empty($item_category)){
                 foreach ($item_category as $key => $value) {
                  $value  = (array) $value;
                  $item_category2[$key]['fn_'] = $value['email'];
                  $item_category2[$key]['img_'] = !empty($value['img'])  ? $value['img']:"usage/demo/img/profile-pics/8.jpg";
                  $item_category2[$key]['href_']  ='/admin/user/war/view_detail/'.$value['user_id'];
                  $item_category2[$key]['note_'] = "The search item is warhouse partner";
                  }
        
                   echo  json_encode(['data'=>$item_category2,'total'=>count($item_category)  ]);
                  }else{
                    echo  json_encode(['data'=>[],'total'=>0  ]);
                  }
        
        
        
               }
         

       








    }

  }      
}

?>