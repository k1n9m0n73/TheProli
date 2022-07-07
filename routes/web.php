<?php
use Illuminate\Support\Facades\Route;
if (session_status() == PHP_SESSION_NONE) {
   session_start();
}
// echo '<pre>';
// print_r(config('mail')['mailers']['smtp']);
// echo '</pre>';
// use Illuminate\Support\Facades\Session;
// ini_set('error_reporting', 'E_ALL'); // or error_reporting(E_ALL);
// //ini_set('memory_limi','-1');
//ini_set('display_startup_errors', '1');ini_set('display_errors', '1');

//print_r(Session::all());

//echo phpinfo();
//print_r($_SERVER);
////(?<=___).+ ? means exclude
/*C:\\xampp\\htdocs\\project\\storage\\framework/cache/data'
///var/www/storage/framework/cache/data
php -r 'print_r(gd_info());' 
php -i
php artisan cache:clear
php artisan view:clear
php artisan route:clear
php artisan clear-compiled
composer dump-autoload
php artisan optimize
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
/*docker-compose exec app php artisan key:generate
docker-compose exec app php artisan config:cache
php artisan cache:clear
    
php artisan config:clear
php artisan config:cache
php artisan key:generate
3.change the permission of storage and vendor folders, also the bootstrap/cache.
Their permissions should be (755 :storage & vendor) and (644 : bootstrap/caches)
chmod -R 755 storage
chmod -R 755 vendor
chmod -R 644 bootstrap/cache
chmod -R 777 bootstrap/cache

*/

// $store_advert = array(
//    array('id' => '1','ht' => 'Adver1','sht' => 'Adver words','url' => 'category/items/3n4hSco1','item' => 'Cottage cheese','image' => 'u03MShDSdPeg.png','dates' => '2021-08-30','updates' => NULL),
//    array('id' => '2','ht' => 'Advert 2','sht' => 'Advert2 line','url' => 'category/items/3n4hSco1','item' => 'Cottage cheese','image' => 'bs13SjnDkdhW.jpg','dates' => '2021-08-30','updates' => NULL)
//  );
 
 
//$table  ='partner_documents';
// $t = DB::table($table)->get();//
 //DB::table($table )->truncate();
 //foreach($t  as $state_index => $value){
//    // echo $value['state_id'].'<br>';
   // try { 
      // $partner_documents = array(
      //    array('id' => '1','farmer' => '{"document":[{"exp":"No","doc":"Farmer voter\'s card or Farmer NIN or Farmer passport "},{"exp":"No","doc":"Guarantor voter\'s card or Guarantor NIN or Guarantor passport "},{"exp":"Yes","doc":"Farmer associate certificate"},{"exp":"Yes","doc":"Farmer certificate"},{"exp":"No","doc":"NAFDAC"}]}','aggregator' => '{"document":[{"exp":"No","doc":"Voter\'s card or driver\'s licence or national id card or nepa bill "},{"exp":"No","doc":"Guarantor\'s voter card or driver\'s licence or national id card or nepa bill "}]}','logistics' => '{"document":[{"exp":"Yes","doc":"Insurance Certificate"},{"exp":"Yes","doc":"NAFDAC certificate"},{"exp":"No","doc":"Driver\'s licence front view"},{"exp":"No","doc":"Driver\'s licence back view"},{"exp":"No","doc":"National Id card or Voter\'s Card or International passport "}]}','warehouse' => '{"document":[{"exp":"Yes","doc":"Insurance Certificate"},{"exp":"No","doc":"NAFDAC cetificate"},{"exp":"No","doc":"Memerandum of articulation"},{"exp":"Yes","doc":"Custome agent Licence"}]}','vehicle' => '{"document":[{"exp":"No","doc":"vehicle image"},{"exp":"Yes","doc":"vehicle license"},{"exp":"Yes","doc":"Road worthiness"},{"exp":"No","doc":"Proove of ownership"},{"exp":"Yes","doc":"Insurance certificate"}]}','created_at' => NULL,'updated_at' => NULL)
      //  );


   $d = '{"role_perm":"{\"pset__allow_to_add_category_and_subcategory\":\"1\",\"pset__allow_to_edit_category_and_subcategory\":\"1\",\"pset__allow_to_delete_category_and_subcategory\":\"1\",\"pset__allow_to_add_item_type\":\"1\",\"pset__allow_to_edit_item_type\":\"1\",\"pset__allow_to_delete_item_type\":\"1\",\"pset__allow_to_view_item_type\":\"1\",\"pset__allow_to_add_location\":\"1\",\"pset__allow_to_edit_location\":\"1\",\"pset__allow_to_delete_location\":\"1\",\"pset__allow_to_view_location\":\"1\",\"pset__allow_to_update_location_coordinate\":\"1\",\"pset__allow_to_add_hub\":\"1\",\"pset__allow_to_edit_hub\":\"1\",\"pset__allow_to_delete_hub\":\"1\",\"pset__allow_to_view_hub\":\"1\",\"pset__allow_to_edit_product_upload_settings\":\"1\",\"pset__allow_to_view_product_upload_settings\":\"1\",\"pset__allow_to_add_roles\":\"1\",\"pset__allow_to_edit_roles\":\"1\",\"pset__allow_to_delete_roles\":\"1\",\"pset__allow_to_view_roles\":\"1\",\"pset__allow_to_set_roles\":\"1\",\"pset__allow_to_set_permission\":\"1\",\"ppar__allow_to_edit_admin\":\"1\",\"ppar__allow_to_delete_admin\":\"1\",\"ppar__allow_to_view_admin\":\"1\",\"ppar__allow_to_set_admin_permission\":\"1\",\"ppar__allow_to_set_admin_role\":\"1\",\"ppar__allow_to_edit_aggregator\":\"1\",\"ppar__allow_to_delete_aggregator\":\"1\",\"ppar__allow_to_view_aggregator\":\"1\",\"ppar__allow_to_edit_farmer\":\"1\",\"ppar__allow_to_delete_farmer\":\"1\",\"ppar__allow_to_view_farmer\":\"1\",\"ppar__allow_to_edit_warehouse\":\"1\",\"ppar__allow_to_delete_warehouse\":\"1\",\"ppar__allow_to_view_warehouse\":\"1\",\"ppar__allow_to_edit_logistics\":\"1\",\"ppar__allow_to_delete_logistics\":\"1\",\"ppar__allow_to_view_logistics\":\"1\",\"ppar__allow_to_delete_customer\":\"1\",\"ppar__allow_to_view_customer\":\"1\",\"ppar__allow_to_edit_customer\":\"1\",\"ppar__allow_to_add_hub\":\"1\",\"ppar__allow_to_view_hub\":\"1\",\"ppar__allow_to_edit_hub\":\"1\",\"ppar__allow_to_delete_hub\":\"1\",\"papp__allow_to_approve_admin\":\"1\",\"papp__allow_to_approve_aggregator\":\"1\",\"papp__allow_to_approve_farmer\":\"1\",\"papp__allow_to_approve_logistics\":\"1\",\"papp__allow_to_approve_warehouse\":\"1\",\"ppro__allow_to_view_product_uplaod_code\":\"1\",\"ppro__allow_to_view_awaiting_product\":\"1\",\"ppro__allow_to_view_approved_product\":\"1\",\"ppro__allow_to_view_expired_product\":\"1\",\"ppro__allow_to_view_deal_product\":\"1\",\"ppro__allow_to_view_all_product\":\"1\",\"ppro__allow_to_delete_product\":\"1\",\"ppro__allow_to_view_product_details\":\"1\",\"ppro__allow_to_edit_product\":\"1\",\"ppro__allow_to_approve_product\":\"1\",\"pord__allow_to_view_order\":\"1\",\"pord__allow_to_view_rejected_order\":\"1\",\"pord__allow_to_view_return_order\":\"1\",\"pord__allow_to_cancel_order\":\"1\",\"pord__allow_to_view_details\":\"1\",\"psal__allow_add_marketing\":\"1\",\"psal__allow_edit_marketing\":\"1\",\"psal__allow_delete_marketing\":\"1\",\"psal__allow_view_marketing\":\"1\",\"pana__allow_to_view_product_analytic\":\"1\",\"pana__allow_to_view_order_analytic\":\"1\",\"pana__allow_to_view_product_owner_trasaction\":\"1\",\"pana__allow_to_view_sales_trasaction\":\"1\",\"pana__allow_to_view_event_log_analytics\":\"1\",\"pana__allow_to_view_finance_analytics\":\"1\",\"pana__allow_to_view_logistics_trasaction\":\"1\",\"pSet__allow_to_view_logistics1_settlement\":\"1\",\"pSet__allow_to_view_logistics2_settlement\":\"1\",\"pSet__allow_to_view_logistics3_settlement\":\"1\",\"pSet__allow_to_view_logistics4_settlement\":\"1\",\"pSet__allow_to_view_product_owner_settlement\":\"1\",\"pSet__allow_to_view_uploader(aggregator)_settlement\":\"1\",\"pSet__allow_to_view_storage(warehouse)_settlement\":\"1\",\"pSet__allow_to_view_vat_settlement\":\"1\",\"pSet__allow_to_view_insurance_settlement\":\"1\",\"pSet__allow_to_view_hub1_settlement\":\"1\",\"pSet__allow_to_view_hub2_settlement\":\"1\",\"preg__allow_to_add_partner_requirement\":\"1\",\"preg__allow_to_edit_partner_requirement\":\"1\",\"preg__allow_to_delete_partner_requirement\":\"1\",\"preg__allow_to_view_partner_requirement\":\"1\",\"pcod__allow_to_generate_code\":\"1\"}","role_resp":"[\"%3Cp%3Edgfghghg%20gfhghghgs%20gh%20gh%26nbsp%3B%20gdhehet%20grgretrtrtrtrr%20rrtrrt%3C\\\/p%3E\"]","add_by":"Blessing Obidie","add_on":1643730131}';
//print_r(json_decode($d));
   //$d = (array) DB::table($table)->select('id')->where("id", $value['id'] )->orWhere("state", 'regexp',$value['state'] )->first();
//DB::table($table)->insert($partner_documents);
//DB::table('admins')->where('id',1)->update(['perm'=>$d]);
  //->update(['category_img','usage/images/cat-icon/'.$value->category_img]);

  // print_r($t);
   //echo "<br>";

   // } catch (\Throwable $th) {
   //  print_r($th); //throw $th;
   // }
//}


Route::get('/', 'App\Http\Controllers\Customer\CustomerController@index')->name('home');
//Route::get('/', [App\Http\Controllers\Customer\Payment::class, 'handleGatewayCallback'])->name('payments');
Route::prefix('/')->group(function(){
Route::get('login', 'App\Http\Controllers\Customer\LoginController@index')->name('login');
Route::post('custom-login','App\Http\Controllers\Customer\LoginController@customLogin')->name('login.custom'); 
Route::get('registration', 'App\Http\Controllers\Customer\RegistrationController@index')->name('register-user');
Route::post('custom-registration', 'App\Http\Controllers\Customer\RegistrationController@customRegister')->name('register.custom'); 
Route::get('carts', 'App\Http\Controllers\Customer\Cart@index')->name('carts');
Route::post('get-carts', 'App\Http\Controllers\Customer\Cart@getItem')->name('get-carts');
Route::post('request-password', 'App\Http\Controllers\Customer\Password@requestPassword')->name('p-request');
Route::post('reset-password', 'App\Http\Controllers\Customer\Password@resetPassword')->name('r-request');
Route::post('get-delcost','App\Http\Controllers\Customer\Checkout@getCost')->name('r-request-detdel');
Route::post('updateAddress','App\Http\Controllers\Customer\Checkout@updateAddress')->name('r-request-detdel');
Route::post('deleteAddress','App\Http\Controllers\Customer\Checkout@deleteAddress')->name('r-request-adde-delete');
Route::post('useAddress','App\Http\Controllers\Customer\Checkout@useAddress')->name('r-request-adde-use');
Route::post('payment/{payment}','App\Http\Controllers\Customer\Payment@payment')->name('r-request-payment');
Route::get('payments/success','App\Http\Controllers\Customer\FinishOrder@payments')->name('r-request-payments');
Route::get('logout', 'App\Http\Controllers\Customer\CustomerController@logout')->name('logout');
Route::get('checkout', 'App\Http\Controllers\Customer\Checkout@index')->name('checkout');
Route::get('order_completed', 'App\Http\Controllers\Customer\Payment@viewOrderDone')->name('checkouts`_done');
Route::get('account/{requst}', 'App\Http\Controllers\Customer\Account\Account@index')->name('account.index');
Route::get('account/details/{requst}', 'App\Http\Controllers\Customer\Account\Account@details')->name('account.index');
Route::post('account_/{request}', 'App\Http\Controllers\Customer\Account\Account@request')->name('account.index');
Route::get('category/items/{id}', 'App\Http\Controllers\Customer\Items\Category@index')->name('item.category.index');
Route::get('subcategory/items/{id}/{id2}', 'App\Http\Controllers\Customer\Items\Subcategory@index')->name('subcategory.items');
Route::get('item_type/items/{id}/{id2}', 'App\Http\Controllers\Customer\Items\ItemTypes@index')->name('item_types.items');
Route::post('getCategory', 'App\Http\Controllers\Customer\Items\Category@getItems')->name('category__');
Route::post('getsubCategory_', 'App\Http\Controllers\Customer\Items\Subcategory@getItems')->name('subcategory_');
Route::post('itemTypes_', 'App\Http\Controllers\Customer\Items\ItemTypes@getItems')->name('types_');
Route::get('search_item/items/{id}/{id2}', 'App\Http\Controllers\Customer\Items\SearchItems@index')->name('search_types.items');
Route::post('serchItem_', 'App\Http\Controllers\Customer\Items\SearchItems@getItems')->name('searchItem__');
Route::get('item_details/product/{Lni0wIHKTUCyxE6fFhYeVGBO}', 'App\Http\Controllers\Customer\Items\ProductDetails@index')->name('product_details');
Route::post('product_details_', 'App\Http\Controllers\Customer\Items\ProductDetails@getItems')->name('prodyctDetails__');
Route::post('item_details/getRecent','App\Http\Controllers\Customer\Items\Recent@getItems' );
Route::post('/contact', 'App\Http\Controllers\Customer\Information@contact')->name('contact');
Route::get('/account/mail/{which_aspect}', 'App\Http\Controllers\Customer\Account\Message\Message@index'/*Aggregator is the controller*/);
Route::post('/account/mail/process/{which_aspect}', 'App\Http\Controllers\Customer\Account\Message\Message@processProduct'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

});


Route::prefix('index')->group(function(){
   Route::get('/', 'App\Http\Controllers\Customer\CustomerController@index')->name('home');
   Route::post('addToCart', 'App\Http\Controllers\Customer\Cart@addItem')->name('index.addToCart');
   Route::post('updateCart', 'App\Http\Controllers\Customer\Cart@updateCart')->name('index.updateToCart');
   Route::get('getCart', 'App\Http\Controllers\Customer\Cart@getItem')->name('index.getCART');
   Route::post('removeItemSingle', 'App\Http\Controllers\Customer\Cart@removeItemSingle')->name('index.getCart');
   Route::post('addWishList', 'App\Http\Controllers\Customer\Cart@addToWishList')->name('index.getWishlist');
   Route::get('password-reset/{em}/{tok}', 'App\Http\Controllers\Customer\Password@index')->name('pa-reset');
   Route::get('/information/{part}', 'App\Http\Controllers\Customer\Information@index')->name('information');
});


Route::prefix('admin')->group(function(){
   Route::post('/uploadImgUrl/{path}', 'App\Http\Controllers\Admin\UploadFlieUrl@upload')->name('getStoreUploadURl');///route for uploading the  base64 file
  
    Route::get('/', 'App\Http\Controllers\Admin\LoginController@index')->name(/*route name map to call method*/'admin');
    Route::get('/login', 'App\Http\Controllers\Admin\LoginController@index')->name(/*route name map to call method*/'admin.login');
    Route::post('custom-login','App\Http\Controllers\Admin\LoginController@customLogin')->name('admin.login.custom');    
    Route::get('/forget-password','App\Http\Controllers\Admin\ForgetPasswordController@index');
    Route::post('/request-password', 'App\Http\Controllers\Admin\ForgetPasswordController@requestPassword')->name('admin.request.password');
    Route::get('/password-reset/{email}/{token}','App\Http\Controllers\Admin\ResetPasswordController@index');//->name('admin.reset.password');
    Route::post('/resetPassword', 'App\Http\Controllers\Admin\ResetPasswordController@resetPassword')->name('admin.reset.password');
    Route::post('/login/submit','Auth\AdminLoginController@login')->name('admin.login.submit');    
    Route::get('/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard')->name('admin.dashboard');//->middleware('auth:admin');
    Route::get('/register', 'App\Http\Controllers\Admin\RegistrationController@index'/*Admin is the controller*/)->name('admin.register');
    Route::post('/takeRegister', 'App\Http\Controllers\Admin\RegistrationController@customRegister'/*Admin is the controller*/)->name('admin.register-user');
    Route::get('/logout', 'App\Http\Controllers\Admin\AdminController@logout'/*Admin is the controller*/)->name('admin.logout');
    Route::get('/getCurrentAdminData', 'App\Http\Controllers\Admin\AdminUserData@data'/*Admin is the controller*/)->name('admin.user-data');
   /*Settings module*/   
    Route::get('/setting/role/add', 'App\Http\Controllers\Admin\Setting\Role\RoleSettingController@index'/*Admin is the controller*/)->name('admin.setting.role.add')->middleware("auth:admin");
    Route::post('/setting/role/get', 'App\Http\Controllers\Admin\Setting\Role\RoleSettingController@getRole'/*Admin is the controller*/)->name('admin.setting.role.add');
    
    Route::post('/setting/role/handleadd/', 'App\Http\Controllers\Admin\Setting\Role\RoleSettingController@addRole'/*Admin is the controller*/)->name('admin.setting.role.handleadd');
    /*PATH
     PUT 
     dump 
     form data   
   /*Settings module nb*/

    Route::get('/setting/product-to-sell', 'App\Http\Controllers\Admin\Setting\Product\Product@getproductView'/*Admin is the controller*/);
    Route::post('/setting/process-product/{what}', 'App\Http\Controllers\Admin\Setting\Product\Product@processProduct'/*Admin is the controller*/);
    Route::get('/setting/location', 'App\Http\Controllers\Admin\Setting\Location\Location@getLocationView'/*Admin is the controller*/);
    Route::post('/setting/process-location/{what}', 'App\Http\Controllers\Admin\Setting\Location\Location@processLocation'/*Admin is the controller*/);
    Route::get('/setting/hub', 'App\Http\Controllers\Admin\Setting\Hub\Hub@getHubView'/*Admin is the controller*/);
    Route::post('/setting/process-hub/{what}', 'App\Http\Controllers\Admin\Setting\Hub\Hub@processHub'/*Admin is the controller*/);
    Route::get('/setting/product-upload-rules', 'App\Http\Controllers\Admin\Setting\ProductUploadRules\ProductUploadRules@getHubView'/*Admin is the controller*/);
    Route::post('/setting/process-product-upload-rules/{what}', 'App\Http\Controllers\Admin\Setting\ProductUploadRules\ProductUploadRules@processHub'/*Admin is the controller*/);
    Route::get('/setting/account-security', 'App\Http\Controllers\Admin\Setting\AccountSecurity\AccountSecurity@getSecurityView'/*Admin is the controller*/);
   Route::get('/setting/account-profile', 'App\Http\Controllers\Admin\Setting\AccountSecurity\AccountSecurity@getProfileView'/*Admin is the controller*/);
    Route::post('/setting/process-account-security/{what}', 'App\Http\Controllers\Admin\Setting\AccountSecurity\AccountSecurity@processSecurity'/*Admin is the controller*/);
    /*Settings module nb*/
    Route::post('/setting/role/update', 'App\Http\Controllers\Admin\Setting\Role\RoleSettingController@updateRole'/*Admin is the controller*/)->name('admin.setting.role.handleupdate');
    Route::post('/setting/role/delete', 'App\Http\Controllers\Admin\Setting\Role\RoleSettingController@deleteRole'/*Admin is the controller*/)->name('admin.setting.role.handledelete');
    Route::get('/setting/partner-registration-doc', 'App\Http\Controllers\Admin\Setting\PartnerDoc\RequireDocumentController@getView'/*Admin is the controller*/)->name('admin.setting.doc.view');
    Route::post('/setting/addPartnerDoc', 'App\Http\Controllers\Admin\Setting\PartnerDoc\RequireDocumentController@addDoc'/*Admin is the controller*/);
    Route::post('/setting/updatePartnerDoc', 'App\Http\Controllers\Admin\Setting\PartnerDoc\RequireDocumentController@updateDoc'/*Admin is the controller*/);
    Route::post('/setting/deletePartnerDoc', 'App\Http\Controllers\Admin\Setting\PartnerDoc\RequireDocumentController@deleteDoc'/*Admin is the controller*/);
   
   /*Settings module  setting/addPartnerDoc */ 

   /*Employment module*/ 
   Route::get('/employment/list', 'App\Http\Controllers\Admin\Employment@getView'/*Admin is the controller*/)->name('admin.employment');
   Route::post('/create-employment', 'App\Http\Controllers\Admin\Employment@addEmployment'/*Admin is the controller*/)->name('admin.addEmployment');
   Route::post('/employment/get', 'App\Http\Controllers\Admin\Employment@getEmployment'/*Admin is the controller*/)->name('admin.getEmployment');
   Route::post('/employment/update', 'App\Http\Controllers\Admin\Employment@updateEmployment'/*Admin is the controller*/)->name('admin.updateEmployment');
   Route::post('/employment/delete', 'App\Http\Controllers\Admin\Employment@deleteEmployment'/*Admin is the controller*/)->name('admin.deleteEmployment');
   /*Employment module*/ 

   /*Users module*/ 
     //Admin user//////////////////////////////////////////////////////////
   Route::get('/users/admin/new', 'App\Http\Controllers\Admin\Users\Admin@getNewView'/*Admin is the controller*/)->name('admin.new.admin');
   Route::get('/users/admin/approved', 'App\Http\Controllers\Admin\Users\Admin@getApproveView'/*Admin is the controller*/)->name('admin.approve.admin');
   Route::post('/users/admin/get/{id}', 'App\Http\Controllers\Admin\Users\Admin@getadminData'/*Admin is the controller*/)->name('admin.admindata');
   Route::post('/users/admin/delete', 'App\Http\Controllers\Admin\Users\Admin@deletedminData')->name('admin.deleteadminData');
   Route::get('/users/admin/view_detail/{id}', 'App\Http\Controllers\Admin\Users\Admin@getDetailView')->name('admin.viewadminDetailsData');
   Route::post('/users/admin/update/{id}', 'App\Http\Controllers\Admin\Users\Admin@updateData')->name('admin.updateData');
   Route::post('/users/admin/delete', 'App\Http\Controllers\Admin\Users\Admin@deleteAdminData')->name('admin.deleteadminData');
   //Aggregator user//////////////////////////////////////////////////////////
   Route::get('/users/agg/new', 'App\Http\Controllers\Admin\Users\Agg@getNewView'/*Admin is the controller*/)->name('agg.new.admin');
   Route::get('/users/agg/approved', 'App\Http\Controllers\Admin\Users\Agg@getApproveView'/*Admin is the controller*/)->name('agg.approve.admin');
   Route::post('/users/agg/get/{id}', 'App\Http\Controllers\Admin\Users\Agg@getadminData'/*Admin is the controller*/)->name('agg.admindata');
   Route::post('/users/agg/delete', 'App\Http\Controllers\Admin\Users\Agg@deletedminData')->name('agg.deleteadminData');
   Route::get('/users/agg/view_detail/{id}', 'App\Http\Controllers\Admin\Users\Agg@getDetailView')->name('agg.viewadminDetailsData');
   Route::post('/users/agg/update/{id}', 'App\Http\Controllers\Admin\Users\Agg@updateData')->name('agg.updateData');
   Route::post('/users/agg/delete', 'App\Http\Controllers\Admin\Users\Agg@deleteAdminData')->name('agg.deleteadminData');

    //Farmer user//////////////////////////////////////////////////////////
    Route::get('/users/far/new', 'App\Http\Controllers\Admin\Users\Far@getNewView'/*Admin is the controller*/)->name('far.new.admin');
    Route::get('/users/far/approved', 'App\Http\Controllers\Admin\Users\Far@getApproveView'/*Admin is the controller*/)->name('far.approve.admin');
    Route::post('/users/far/get/{id}', 'App\Http\Controllers\Admin\Users\Far@getadminData'/*Admin is the controller*/)->name('far.admindata');
    Route::post('/users/far/delete', 'App\Http\Controllers\Admin\Users\Far@deletedminData')->name('far.deleteadminData');
    Route::get('/users/far/view_detail/{id}', 'App\Http\Controllers\Admin\Users\Far@getDetailView')->name('far.viewadminDetailsData');
    Route::post('/users/far/update/{id}', 'App\Http\Controllers\Admin\Users\Far@updateData')->name('far.updateData');
    Route::post('/users/far/delete', 'App\Http\Controllers\Admin\Users\Far@deleteAdminData')->name('far.deleteadminData');
    //Logistic user//////////////////////////////////////////////////////////
    Route::get('/users/log/new', 'App\Http\Controllers\Admin\Users\Log@getNewView'/*Admin is the controller*/)->name('log.new.admin');
    Route::get('/users/log/approved', 'App\Http\Controllers\Admin\Users\Log@getApproveView'/*Admin is the controller*/)->name('log.approve.admin');
    Route::post('/users/log/get/{id}', 'App\Http\Controllers\Admin\Users\Log@getadminData'/*Admin is the controller*/)->name('log.admindata');
    Route::post('/users/log/delete', 'App\Http\Controllers\Admin\Users\Log@deletedminData')->name('log.deleteadminData');
    Route::get('/users/log/view_detail/{id}', 'App\Http\Controllers\Admin\Users\Log@getDetailView')->name('log.viewadminDetailsData');
    Route::post('/users/log/update/{id}', 'App\Http\Controllers\Admin\Users\Log@updateData')->name('log.updateData');
    Route::post('/users/log/delete', 'App\Http\Controllers\Admin\Users\Log@deleteAdminData')->name('log.deleteadminData');
    Route::post('/users/log/approve-chage-approve-status', 'App\Http\Controllers\Admin\Users\Log@switchVehicleApp')->name('log.deleteadminData');

      //Warehouse user//////////////////////////////////////////////////////////
   Route::get('/users/war/new', 'App\Http\Controllers\Admin\Users\War@getNewView'/*Admin is the controller*/)->name('war.new.admin');
   Route::get('/users/war/approved', 'App\Http\Controllers\Admin\Users\War@getApproveView'/*Admin is the controller*/)->name('war.approve.admin');
   Route::post('/users/war/get/{id}', 'App\Http\Controllers\Admin\Users\War@getadminData'/*Admin is the controller*/)->name('war.admindata');
   Route::post('/users/war/delete', 'App\Http\Controllers\Admin\Users\War@deletedminData')->name('war.deleteadminData');
   Route::get('/users/war/view_detail/{id}', 'App\Http\Controllers\Admin\Users\War@getDetailView')->name('war.viewadminDetailsData');
   Route::post('/users/war/update/{id}', 'App\Http\Controllers\Admin\Users\War@updateData')->name('war.updateData');
   Route::post('/users/war/delete', 'App\Http\Controllers\Admin\Users\War@deleteAdminData')->name('war.deleteadminData');

       //Customers user//////////////////////////////////////////////////////////
   Route::get('/users/cus', 'App\Http\Controllers\Admin\Users\Cus@getNewView'/*Admin is the controller*/)->name('cus.new.admin');
   Route::post('/users/cus/get/{id}', 'App\Http\Controllers\Admin\Users\Cus@getadminData'/*Admin is the controller*/)->name('cus.admindata');
   Route::post('/users/cus/delete', 'App\Http\Controllers\Admin\Users\Cus@deletedminData')->name('cus.deleteadminData');
   Route::get('/users/cus/view_detail/{id}', 'App\Http\Controllers\Admin\Users\Cus@getDetailView')->name('cus.viewadminDetailsData');
   Route::post('/users/cus/update/{id}', 'App\Http\Controllers\Admin\Users\Cus@updateData')->name('cus.updateData');
   Route::post('/users/cus/delete', 'App\Http\Controllers\Admin\Users\Cus@deleteAdminData')->name('cus.deleteadminData');
   /*Users module*/ 

  //Product module//////////////////////////////////////////////////////////
   Route::get('/product/{which_aspect}', 'App\Http\Controllers\Admin\Product\Product@index'/*Admin is the controller*/);
   Route::post('/product/process/{which_aspect}', 'App\Http\Controllers\Admin\Product\Product@processProduct'/*Admin is the controller*/);
   ////////////////////////////////////////////////////////////////////////////////////
      

     //ORDER module//////////////////////////////////////////////////////////
     Route::get('/order/{which_aspect}', 'App\Http\Controllers\Admin\Order\Order@index'/*Admin is the controller*/);
     Route::post('/order/process/{which_aspect}', 'App\Http\Controllers\Admin\Order\Order@processProduct'/*Admin is the controller*/);
     ////////////////////////////////////////////////////////////////////////////////////


     ////////////////////Notification module
     Route::get('/notification/{which_aspect}', 'App\Http\Controllers\Admin\Notification\Notification@index'/*Admin is the controller*/);
     Route::post('/notification/process/{which_aspect}', 'App\Http\Controllers\Admin\Notification\Notification@processProduct'/*Admin is the controller*/);
     ////////////////////////////////////////////////////////////////////////////////////

      
    ////////////////////Message module
    Route::get('/message/{which_aspect}', 'App\Http\Controllers\Admin\Message\Message@index'/*Admin is the controller*/);
    Route::post('/message/process/{which_aspect}', 'App\Http\Controllers\Admin\Message\Message@processProduct'/*Admin is the controller*/);
    ////////////////////////////////////////////////////////////////////////////////////

   ////////////////////Sale Module
   Route::get('/sales_ads/{which_aspect}', 'App\Http\Controllers\Admin\SalesAds\SalesAds@index'/*Admin is the controller*/);
   Route::post('/sales_ads/process/{which_aspect}', 'App\Http\Controllers\Admin\SalesAds\SalesAds@processProduct'/*Admin is the controller*/);
   ////////////////////////////////////////////////////////////////////////////////////

   //////////////////
      ////////////////////Settlement module
   Route::get('/settlement/{which_aspect}', 'App\Http\Controllers\Admin\Settlement\Settlement@index'/*Admin is the controller*/);
   Route::post('/settlement/process/{which_aspect}', 'App\Http\Controllers\Admin\Settlement\Settlement@processProduct'/*Admin is the controller*/);
   ////////////////////////////////////////////////////////////////////////////////////

  ////////////////////Analytical module
Route::get('/analytics/{which_aspect}', 'App\Http\Controllers\Admin\Analytics\Analytics@index'/*Admin is the controller*/);
Route::post('/analytics/process/{which_aspect}', 'App\Http\Controllers\Admin\Analytics\Analytics@processProduct'/*Admin is the controller*/);
////////////////////////////////////////////////////////////////////////////////////


Route::post('/dataGraph/{which_aspect}', 'App\Http\Controllers\Admin\AdminController@processGraph'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

Route::post('/counter/{which_aspect}', 'App\Http\Controllers\Admin\AdminController@counter'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////



    });
 
 Route::group(['prefix'=>'datafinder'],function(){
    Route::post('/state_data/all', 'App\Http\Controllers\DataApi\StateData@getState')->name('state_data.all');/// selected state
    Route::post('/states_data/all', 'App\Http\Controllers\DataApi\StateData@getStateAll')->name('states_data.all');//all state
    Route::post('/getCategory', 'App\Http\Controllers\DataApi\ItemCategory@data')->name('getCategory');
    Route::post('/getCategoryId', 'App\Http\Controllers\DataApi\ItemCategory@dataWithId')->name('getCategoryId__');
    Route::post('/getCategoryAll', 'App\Http\Controllers\DataApi\ItemCategory@all')->name('getCategoryAll');
    
    Route::post('/getsubCategory', 'App\Http\Controllers\DataApi\ItemSubCategory@data')->name('getsubCategory');
    Route::post('/getsubCategoryG', 'App\Http\Controllers\DataApi\ItemSubCategory@subcategoryGetter')->name('getsubCategoryG');
    Route::post('/getsubCategoryall', 'App\Http\Controllers\DataApi\ItemSubCategory@dataAll')->name('getsubCategoryAll');
    Route::post('/getSubcategoryNewArrival', 'App\Http\Controllers\DataApi\ItemSubCategory@newArrival')->name('getSubcategoryNewArrival');
    Route::post('/getSubcategorySpecial', 'App\Http\Controllers\DataApi\ItemSubCategory@special')->name('getSubcategorySpecial');
    Route::post('/getSubcategoryBestSeller', 'App\Http\Controllers\DataApi\ItemSubCategory@bestseller')->name('getSubcategoryBestSeller');
    
    Route::post('/getType', 'App\Http\Controllers\DataApi\ItemType@data')->name('getType');
    Route::post('/getTypeG', 'App\Http\Controllers\DataApi\ItemType@itemTypeGetter')->name('getTypeG');
    Route::post('/getTypes', 'App\Http\Controllers\DataApi\ItemType@types')->name('getTypes');
    Route::post('/getTypesAllAlt', 'App\Http\Controllers\DataApi\ItemType@data2')->name('getTypesAlt');
    Route::post('/search_item', 'App\Http\Controllers\DataApi\ItemSearch@data')->name('search_item');
    Route::post('/search_item_alphabet', 'App\Http\Controllers\DataApi\ItemSearch@serachByAlphabet')->name('search_item_by_alphabet');
    Route::post('/getBannerAdvert', 'App\Http\Controllers\DataApi\BannerAdvert@data')->name('getBannerAdvert');
    Route::post('/getStoreDeal', 'App\Http\Controllers\DataApi\StoreDeal@data')->name('getStoreDeal');


    
 });




 Route::prefix('aggregator')->group(function(){
   Route::get('/', 'App\Http\Controllers\Aggregator\RegistrationController@getRegisterView')->name('aggregator');
//   Route::get('/register', 'App\Http\Controllers\Aggregator\RegistrationController@getRegisterView')->name('aggregator');
   Route::post('/post_register', 'App\Http\Controllers\Aggregator\RegistrationController@register')->name('aggregator.register');
   Route::get('/getting_started', 'App\Http\Controllers\Aggregator\RegistrationController@gettingStarted')->name('aggregator.started');
   //Route::get('/register/getting_started', 'App\Http\Controllers\Aggregator\RegistrationController@gettingStarted')->name('aggregator.started');
   Route::get('/getting_started/regenerate-token/{email}', 'App\Http\Controllers\Aggregator\RegistrationController@gettingStarted')->name('aggregator.started.regenerate');
   Route::get('/getting_started/bank-details/{user_id}', 'App\Http\Controllers\Aggregator\RegistrationController@gettingStarted')->name('aggregator.started.regenerate');
   Route::post('/confirmEmail', 'App\Http\Controllers\Aggregator\RegistrationController@confirmEmail')->name('aggregator.started');
   Route::post('/myAccount', 'App\Http\Controllers\Aggregator\RegistrationController@myAccount')->name('aggregator.myaccount');
   Route::post('/regenerate-token', 'App\Http\Controllers\Aggregator\RegistrationController@regenerateTokens')->name('aggregator.regenerate-token');
   Route::get('/login', 'App\Http\Controllers\Aggregator\LoginController@index')->name('aggregator.login');
   Route::post('custom-login','App\Http\Controllers\Aggregator\LoginController@customLogin')->name('aggregator.login.custom');
   Route::get('/forget-password','App\Http\Controllers\Aggregator\ForgetPasswordController@index');
   Route::post('/request-password', 'App\Http\Controllers\Aggregator\ForgetPasswordController@requestPassword')->name('aggregator.request.password');
   Route::get('/password-reset/{email}/{token}','App\Http\Controllers\Aggregator\ResetPasswordController@index');//->name('aggregator.reset.password');
   Route::post('/resetPassword', 'App\Http\Controllers\Aggregator\ResetPasswordController@resetPassword')->name('aggregator.reset.password');
   Route::get('/dashboard', 'App\Http\Controllers\Aggregator\AggregatorController@dashboard')->name('aggregator.dashboard');//->middleware('auth:admin');
   Route::get('/getCurrentAdminData', 'App\Http\Controllers\Aggregator\AdminUserData@data'/*Admin is the controller*/)->name('aggregator.user-data');
   Route::get('/logout', 'App\Http\Controllers\Aggregator\AggregatorController@logout'/*Admin is the controller*/);

   //Product module//////////////////////////////////////////////////////////
   Route::get('/product/{which_aspect}', 'App\Http\Controllers\Aggregator\Product\Product@index'/*Admin is the controller*/);
   Route::post('/product/process/{which_aspect}', 'App\Http\Controllers\Aggregator\Product\Product@processProduct'/*Admin is the controller*/);
   Route::post('/product/upload', 'App\Http\Controllers\Aggregator\Product\UploadProduct@add'/*Admin is the controller*/)->name('product.upload');
   Route::post('/product/update', 'App\Http\Controllers\Aggregator\Product\UploadProduct@update'/*Admin is the controller*/)->name('product.update');
   Route::post('/product/set_deal', 'App\Http\Controllers\Aggregator\Product\UploadProduct@deal'/*Admin is the controller*/)->name('product.update');
   
   
   ///////account//////////////////////////////////////////////////////////////////////////////imageProfile
 
   //ORDER module//////////////////////////////////////////////////////////
   Route::get('/order/{which_aspect}', 'App\Http\Controllers\Aggregator\Order\Order@index'/*Aggregator is the controller*/);
   Route::post('/order/process/{which_aspect}', 'App\Http\Controllers\Aggregator\Order\Order@processProduct'/*Aggregator is the controller*/);
   ////////////////////////////////////////////////////////////////////////////////////


   ////////////////////Notification module
   Route::get('/notification/{which_aspect}', 'App\Http\Controllers\Aggregator\Notification\Notification@index'/*Aggregator is the controller*/);
   Route::post('/notification/process/{which_aspect}', 'App\Http\Controllers\Aggregator\Notification\Notification@processProduct'/*Aggregator is the controller*/);
   ////////////////////////////////////////////////////////////////////////////////////

      
    ////////////////////Message module
    Route::get('/message/{which_aspect}', 'App\Http\Controllers\Aggregator\Message\Message@index'/*Aggregator is the controller*/);
    Route::post('/message/process/{which_aspect}', 'App\Http\Controllers\Aggregator\Message\Message@processProduct'/*Aggregator is the controller*/);
    ////////////////////////////////////////////////////////////////////////////////////
   
    Route::post('/uploadImgUrl/{path}', 'App\Http\Controllers\Aggregator\UploadFlieUrl@upload')->name('getStoreUploadURl');///route for uploading the  base64 file
   


    ///////////////////////////////setting
    

Route::get('/settings/bank', 'App\Http\Controllers\Aggregator\Setting\Bank@index'/*Aggregator is the controller*/); 
Route::post('/settings/bank/account', 'App\Http\Controllers\Aggregator\Setting\Bank@update'/*Aggregator is the controller*/); 
Route::get('/settings/security', 'App\Http\Controllers\Aggregator\Setting\Security@index'/*Aggregator is the controller*/);
Route::post('/settings/security/resetPass2', 'App\Http\Controllers\Aggregator\Setting\Security@resetPass2'/*Aggregator is the controller*/); 
Route::post('/settings/document/update', 'App\Http\Controllers\Aggregator\Setting\Document@update'/*Aggregator is the controller*/); 
Route::get('/settings/document', 'App\Http\Controllers\Aggregator\Setting\Document@index'/*Aggregator is the controller*/); 
Route::get('/settings/profile', 'App\Http\Controllers\Aggregator\Setting\Profile@index'/*Admin is the controller*/)->name('profile.img');
Route::post('/settings/profile/update', 'App\Http\Controllers\Aggregator\Setting\Profile@update'/*Logistics is the controller*/); 
Route::post('/settings/profile/update-profile-image', 'App\Http\Controllers\Aggregator\Setting\Profile@updateProfileImage');/*Logistics is the */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////Settlement module
Route::get('/settlement/{which_aspect}', 'App\Http\Controllers\Aggregator\Settlement\Settlement@index'/*Aggregator is the controller*/);
Route::post('/settlement/process/{which_aspect}', 'App\Http\Controllers\Aggregator\Settlement\Settlement@processProduct'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

////////////////////Analytical module
Route::get('/analytics/{which_aspect}', 'App\Http\Controllers\Aggregator\Analytics\Analytics@index'/*Aggregator is the controller*/);
Route::post('/analytics/process/{which_aspect}', 'App\Http\Controllers\Aggregator\Analytics\Analytics@processProduct'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////


Route::post('/dataGraph/{which_aspect}', 'App\Http\Controllers\Aggregator\AdminUserData@processGraph'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

Route::post('/counter/{which_aspect}', 'App\Http\Controllers\Aggregator\AdminUserData@counter'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
Route::post('/search_f', 'App\Http\Controllers\Aggregator\Search@search'/*Aggregator is the controller*/);


});



Route::prefix('farmer')->group(function(){
   Route::get('/', 'App\Http\Controllers\Farmer\RegistrationController@getRegisterView')->name('farmer');
   //Route::get('/register', 'App\Http\Controllers\Farmer\RegistrationController@getRegisterView')->name('farmer');
   Route::post('/post_register', 'App\Http\Controllers\Farmer\RegistrationController@register')->name('farmer.register');
   Route::get('/getting_started', 'App\Http\Controllers\Farmer\RegistrationController@gettingStarted')->name('farmer.started');
   Route::get('/register/getting_started', 'App\Http\Controllers\Farmer\RegistrationController@gettingStarted')->name('farmer.started');
   Route::get('/getting_started/regenerate-token/{email}', 'App\Http\Controllers\Farmer\RegistrationController@gettingStarted')->name('farmer.started.regenerate');
   Route::get('/getting_started/bank-details/{user_id}', 'App\Http\Controllers\Farmer\RegistrationController@gettingStarted')->name('farmer.started.regenerate');
   Route::post('/confirmEmail', 'App\Http\Controllers\Farmer\RegistrationController@confirmEmail')->name('farmer.started');
   Route::post('/myAccount', 'App\Http\Controllers\Farmer\RegistrationController@myAccount')->name('farmer.myaccount');
   Route::post('/regenerate-token', 'App\Http\Controllers\Farmer\RegistrationController@regenerateTokens')->name('farmer.regenerate-token');
   Route::get('/login', 'App\Http\Controllers\Farmer\LoginController@index')->name('farmer.login');
   Route::post('custom-login','App\Http\Controllers\Farmer\LoginController@customLogin')->name('farmer.login.custom');
   Route::get('/forget-password','App\Http\Controllers\Farmer\ForgetPasswordController@index');
   Route::post('/request-password', 'App\Http\Controllers\Farmer\ForgetPasswordController@requestPassword')->name('farmer.request.password');
   Route::get('/password-reset/{email}/{token}','App\Http\Controllers\Farmer\ResetPasswordController@index');//->name('farmer.reset.password');
   Route::post('/resetPassword', 'App\Http\Controllers\Farmer\ResetPasswordController@resetPassword')->name('farmer.reset.password');
   Route::get('/dashboard', 'App\Http\Controllers\Farmer\FarmerController@dashboard')->name('farmer.dashboard');//->middleware('auth:admin');
   Route::get('/getCurrentAdminData', 'App\Http\Controllers\Farmer\AdminUserData@data'/*Admin is the controller*/)->name('farmer.user-data');
   Route::get('/logout', 'App\Http\Controllers\Farmer\FarmerController@logout'/*Admin is the controller*/);



  //Product module//////////////////////////////////////////////////////////
Route::get('/product/{which_aspect}', 'App\Http\Controllers\Farmer\Product\Product@index'/*Admin is the controller*/);
Route::post('/product/process/{which_aspect}', 'App\Http\Controllers\Farmer\Product\Product@processProduct'/*Admin is the controller*/);
Route::post('/product/upload', 'App\Http\Controllers\Farmer\Product\UploadProduct@add'/*Admin is the controller*/)->name('product.upload');
Route::post('/product/update', 'App\Http\Controllers\Farmer\Product\UploadProduct@update'/*Admin is the controller*/)->name('product.update');
Route::post('/product/set_deal', 'App\Http\Controllers\Farmer\Product\UploadProduct@deal'/*Admin is the controller*/)->name('product.update');


///////account//////////////////////////////////////////////////////////////////////////////imageProfile

//ORDER module//////////////////////////////////////////////////////////
Route::get('/order/{which_aspect}', 'App\Http\Controllers\Farmer\Order\Order@index'/*Farmer is the controller*/);
Route::post('/order/process/{which_aspect}', 'App\Http\Controllers\Farmer\Order\Order@processProduct'/*Farmer is the controller*/);
////////////////////////////////////////////////////////////////////////////////////


////////////////////Notification module
Route::get('/notification/{which_aspect}', 'App\Http\Controllers\Farmer\Notification\Notification@index'/*Farmer is the controller*/);
Route::post('/notification/process/{which_aspect}', 'App\Http\Controllers\Farmer\Notification\Notification@processProduct'/*Farmer is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

   
 ////////////////////Message module
 Route::get('/message/{which_aspect}', 'App\Http\Controllers\Farmer\Message\Message@index'/*Farmer is the controller*/);
 Route::post('/message/process/{which_aspect}', 'App\Http\Controllers\Farmer\Message\Message@processProduct'/*Farmer is the controller*/);
 ////////////////////////////////////////////////////////////////////////////////////

 Route::post('/uploadImgUrl/{path}', 'App\Http\Controllers\Farmer\UploadFlieUrl@upload')->name('getStoreUploadURl');///route for uploading the  base64 file



 ///////////////////////////////setting
 

Route::get('/settings/bank', 'App\Http\Controllers\Farmer\Setting\Bank@index'/*Farmer is the controller*/); 
Route::post('/settings/bank/account', 'App\Http\Controllers\Farmer\Setting\Bank@update'/*Farmer is the controller*/); 
Route::get('/settings/security', 'App\Http\Controllers\Farmer\Setting\Security@index'/*Farmer is the controller*/);
Route::post('/settings/security/resetPass2', 'App\Http\Controllers\Farmer\Setting\Security@resetPass2'/*Farmer is the controller*/); 
Route::post('/settings/document/update', 'App\Http\Controllers\Farmer\Setting\Document@update'/*Farmer is the controller*/); 
Route::get('/settings/document', 'App\Http\Controllers\Farmer\Setting\Document@index'/*Farmer is the controller*/); 
Route::get('/settings/profile', 'App\Http\Controllers\Farmer\Setting\Profile@index'/*Admin is the controller*/)->name('profile.img');
Route::post('/settings/profile/update', 'App\Http\Controllers\Farmer\Setting\Profile@update'/*Logistics is the controller*/); 
Route::post('/settings/profile/update-profile-image', 'App\Http\Controllers\Farmer\Setting\Profile@updateProfileImage');/*Logistics is the */
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////Settlement module
Route::get('/settlement/{which_aspect}', 'App\Http\Controllers\Farmer\Settlement\Settlement@index'/*Farmer is the controller*/);
Route::post('/settlement/process/{which_aspect}', 'App\Http\Controllers\Farmer\Settlement\Settlement@processProduct'/*Farmer is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

////////////////////Analytical module
Route::get('/analytics/{which_aspect}', 'App\Http\Controllers\Farmer\Analytics\Analytics@index'/*Farmer is the controller*/);
Route::post('/analytics/process/{which_aspect}', 'App\Http\Controllers\Farmer\Analytics\Analytics@processProduct'/*Farmer is the controller*/);
////////////////////////////////////////////////////////////////////////////////////


Route::post('/dataGraph/{which_aspect}', 'App\Http\Controllers\Farmer\AdminUserData@processGraph'/*Farmer is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

Route::post('/counter/{which_aspect}', 'App\Http\Controllers\Farmer\AdminUserData@counter'/*Farmer is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
Route::post('/search_f', 'App\Http\Controllers\Farmer\Search@search'/*Farmer is the controller*/);









});


Route::prefix('logistics')->group(function(){
   Route::get('/', 'App\Http\Controllers\Logistics\RegistrationController@getRegisterView')->name('logistics');
   //Route::get('/register', 'App\Http\Controllers\Logistics\RegistrationController@getRegisterView')->name('logistics');
   Route::post('/post_register', 'App\Http\Controllers\Logistics\RegistrationController@register')->name('logistics.register');
   Route::get('/getting_started', 'App\Http\Controllers\Logistics\RegistrationController@gettingStarted')->name('logistics.started');
  // Route::get('/getting_started', 'App\Http\Controllers\Logistics\RegistrationController@gettingStarted')->name('logistics.started');
   Route::get('/register/getting_started/regenerate-token/{email}', 'App\Http\Controllers\Logistics\RegistrationController@gettingStarted')->name('logistics.started.regenerate');
   Route::get('/getting_started/bank-details/{user_id}', 'App\Http\Controllers\Logistics\RegistrationController@gettingStarted')->name('logistics.started.regenerate');
   Route::post('/confirmEmail', 'App\Http\Controllers\Logistics\RegistrationController@confirmEmail')->name('logistics.started');
   Route::post('/myAccount', 'App\Http\Controllers\Logistics\RegistrationController@myAccount')->name('logistics.myaccount');
   Route::post('/regenerate-token', 'App\Http\Controllers\Logistics\RegistrationController@regenerateTokens')->name('logistics.regenerate-token');
   Route::get('/login', 'App\Http\Controllers\Logistics\LoginController@index')->name('logistics.login');
   Route::post('custom-login','App\Http\Controllers\Logistics\LoginController@customLogin')->name('logistics.login.custom');
   Route::get('/forget-password','App\Http\Controllers\Logistics\ForgetPasswordController@index');
   Route::post('/request-password', 'App\Http\Controllers\Logistics\ForgetPasswordController@requestPassword')->name('logistics.request.password');
   Route::get('/password-reset/{email}/{token}','App\Http\Controllers\Logistics\ResetPasswordController@index');//->name('logistics.reset.password');
   Route::post('/resetPassword', 'App\Http\Controllers\Logistics\ResetPasswordController@resetPassword')->name('logistics.reset.password');
   Route::get('/dashboard', 'App\Http\Controllers\Logistics\LogisticsController@dashboard')->name('logistics.dashboard');//->middleware('auth:admin');
   Route::get('/getCurrentAdminData', 'App\Http\Controllers\Logistics\AdminUserData@data'/*Admin is the controller*/)->name('logistics.user-data');
   Route::get('/upload_vehicle/{user_id}', 'App\Http\Controllers\Logistics\RegistrationController@viewVeh'/*Admin is the controller*/);
   Route::post('/uploadVehicle', 'App\Http\Controllers\Logistics\RegistrationController@uploadVehicle'/*Admin is the controller*/);
   Route::get('/logout', 'App\Http\Controllers\Logistics\LogisticsController@logout'/*Admin is the controller*/);

   ////////////////////////////////////////////////////////////////////////
    Route::get('/vehicle/{what_view}', 'App\Http\Controllers\Logistics\Vehicles\Vehicles@index'/*Admin is the controller*/);
   Route::post('/vehicleAction/{what_view}', 'App\Http\Controllers\Logistics\Vehicles\Vehicles@vehicleAction'/*Admin is the controller*/);
   
   //
   /////////////////////////////////////////////////////////////////////////
   
     //ORDER module//////////////////////////////////////////////////////////
     Route::get('/order/{which_aspect}', 'App\Http\Controllers\Logistics\Order\Order@index'/*Logistics is the controller*/);
     Route::post('/order/process/{which_aspect}', 'App\Http\Controllers\Logistics\Order\Order@processProduct'/*Logistics is the controller*/);
     ////////////////////////////////////////////////////////////////////////////////////

     ////////////////////Notification module
   Route::get('/notification/{which_aspect}', 'App\Http\Controllers\Logistics\Notification\Notification@index'/*Logistics is the controller*/);
Route::post('/notification/process/{which_aspect}', 'App\Http\Controllers\Logistics\Notification\Notification@processProduct'/*Logistics is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

 
////////////////////Message module
Route::get('/message/{which_aspect}', 'App\Http\Controllers\Logistics\Message\Message@index'/*Logistics is the controller*/);
Route::post('/message/process/{which_aspect}', 'App\Http\Controllers\Logistics\Message\Message@processProduct'/*Logistics is the controller*/);
Route::post('/uploadImgUrl/{path}', 'App\Http\Controllers\Logistics\UploadFlieUrl@upload')->name('getStoreUploadURl');///route for uploading the  base64 file
 

////////////////////setting
Route::get('/settings/bank', 'App\Http\Controllers\Logistics\Setting\Bank@index'/*Logistics is the controller*/); 
Route::post('/settings/bank/account', 'App\Http\Controllers\Logistics\Setting\Bank@update'/*Logistics is the controller*/); 
Route::get('/settings/security', 'App\Http\Controllers\Logistics\Setting\Security@index'/*Logistics is the controller*/);
Route::post('/settings/security/resetPass2', 'App\Http\Controllers\Logistics\Setting\Security@resetPass2'/*Logistics is the controller*/); 
Route::post('/settings/document/update', 'App\Http\Controllers\Logistics\Setting\Document@update'/*Logistics is the controller*/); 
Route::get('/settings/document', 'App\Http\Controllers\Logistics\Setting\Document@index'/*Logistics is the controller*/); 

Route::get('/settings/profile', 'App\Http\Controllers\Logistics\Setting\Profile@index'/*Logistics is the controller*/);
Route::post('/settings/profile/update', 'App\Http\Controllers\Logistics\Setting\Profile@update'/*Logistics is the controller*/); 
Route::post('/settings/profile/update-profile-image', 'App\Http\Controllers\Logistics\Setting\Profile@updateImage'/*Logistics is the controller*/); 


////////////////////////////////////////////////////////////////////////////////////
////////////////////Analytical module
Route::get('/analytics/{which_aspect}', 'App\Http\Controllers\Logistics\Analytics\Analytics@index'/*Logistics is the controller*/);
Route::post('/analytics/process/{which_aspect}', 'App\Http\Controllers\Logistics\Analytics\Analytics@processProduct'/*Admin is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

////////////////////Settlement module
Route::get('/settlement/{which_aspect}', 'App\Http\Controllers\Logistics\Settlement\Settlement@index'/*Logistics is the controller*/);
Route::post('/settlement/process/{which_aspect}', 'App\Http\Controllers\Logistics\Settlement\Settlement@processProduct'/*Admin is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

Route::post('/dataGraph/{which_aspect}', 'App\Http\Controllers\Logistics\AdminUserData@processGraph'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
Route::post('/counter/{which_aspect}', 'App\Http\Controllers\Logistics\AdminUserData@counter'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
Route::post('/search_f', 'App\Http\Controllers\Logistics\Search@search'/*Aggregator is the controller*/);

Route::post('/checkDocument/{which_part}', 'App\Http\Controllers\Logistics\AdminUserData@check'/*Aggregator is the controller*/);

});

Route::prefix('warehouse')->group(function(){
   Route::get('/', 'App\Http\Controllers\Warehouse\RegistrationController@getRegisterView')->name('warehouse');
   //Route::get('/register', 'App\Http\Controllers\Warehouse\RegistrationController@getRegisterView')->name('warehouse');
   Route::post('/post_register', 'App\Http\Controllers\Warehouse\RegistrationController@register')->name('warehouse.register');
   Route::get('/getting_started', 'App\Http\Controllers\Warehouse\RegistrationController@gettingStarted')->name('warehouse.started');
  // Route::get('/register/getting_started', 'App\Http\Controllers\Warehouse\RegistrationController@gettingStarted')->name('warehouse.started');
   Route::get('/getting_started/regenerate-token/{email}', 'App\Http\Controllers\Warehouse\RegistrationController@gettingStarted')->name('warehouse.started.regenerate');
   Route::get('/getting_started/bank-details/{user_id}', 'App\Http\Controllers\Warehouse\RegistrationController@gettingStarted')->name('warehouse.started.regenerate');
   Route::post('/confirmEmail', 'App\Http\Controllers\Warehouse\RegistrationController@confirmEmail')->name('warehouse.started');
   Route::post('/myAccount', 'App\Http\Controllers\Warehouse\RegistrationController@myAccount')->name('warehouse.myaccount');
   Route::post('/regenerate-token', 'App\Http\Controllers\Warehouse\RegistrationController@regenerateTokens')->name('warehouse.regenerate-token');
   Route::get('/login', 'App\Http\Controllers\Warehouse\LoginController@index')->name('warehouse.login');
   Route::post('custom-login','App\Http\Controllers\Warehouse\LoginController@customLogin')->name('warehouse.login.custom');
   Route::get('/forget-password','App\Http\Controllers\Warehouse\ForgetPasswordController@index');
   Route::post('/request-password', 'App\Http\Controllers\Warehouse\ForgetPasswordController@requestPassword')->name('warehouse.request.password');
   Route::get('/password-reset/{email}/{token}','App\Http\Controllers\Warehouse\ResetPasswordController@index');//->name('warehouse.reset.password');
   Route::post('/resetPassword', 'App\Http\Controllers\Warehouse\ResetPasswordController@resetPassword')->name('warehouse.reset.password');
   Route::get('/dashboard', 'App\Http\Controllers\Warehouse\WarehouseController@dashboard')->name('warehouse.dashboard');//->middleware('auth:admin');
   Route::get('/getCurrentAdminData', 'App\Http\Controllers\Warehouse\AdminUserData@data'/*Admin is the controller*/)->name('warehouse.user-data');
   Route::get('/logout', 'App\Http\Controllers\Warehouse\WarehouseController@logout'/*Admin is the controller*/);

    //Product module//////////////////////////////////////////////////////////
   Route::get('/product/{which_aspect}', 'App\Http\Controllers\Warehouse\Product\Product@index'/*Admin is the controller*/);
Route::post('/product/process/{which_aspect}', 'App\Http\Controllers\Warehouse\Product\Product@processProduct'/*Admin is the controller*/);
Route::post('/product/upload', 'App\Http\Controllers\Warehouse\Product\UploadProduct@add'/*Admin is the controller*/)->name('product.upload');
Route::post('/product/update', 'App\Http\Controllers\Warehouse\Product\UploadProduct@update'/*Admin is the controller*/)->name('product.update');
Route::post('/product/set_deal', 'App\Http\Controllers\Warehouse\Product\UploadProduct@deal'/*Admin is the controller*/)->name('product.update');


///////account//////////////////////////////////////////////////////////////////////////////imageProfile
Route::get('/account/profile', 'App\Http\Controllers\Warehouse\Pofile\Profile@index'/*Admin is the controller*/)->name('profile.img');
Route::post('/updateProfile', 'App\Http\Controllers\Warehouse\Pofile\Profile@imageProfile'/*Admin is the controller*/)->name('profile.uploadimg');

  //ORDER module//////////////////////////////////////////////////////////
  Route::get('/order/{which_aspect}', 'App\Http\Controllers\Warehouse\Order\Order@index'/*Warehouse is the controller*/);
  Route::post('/order/process/{which_aspect}', 'App\Http\Controllers\Warehouse\Order\Order@processProduct'/*Warehouse is the controller*/);
  ////////////////////////////////////////////////////////////////////////////////////


  ////////////////////Notification module
  Route::get('/notification/{which_aspect}', 'App\Http\Controllers\Warehouse\Notification\Notification@index'/*Warehouse is the controller*/);
  Route::post('/notification/process/{which_aspect}', 'App\Http\Controllers\Warehouse\Notification\Notification@processProduct'/*Warehouse is the controller*/);
  ////////////////////////////////////////////////////////////////////////////////////

   
 ////////////////////Message module
 Route::get('/message/{which_aspect}', 'App\Http\Controllers\Warehouse\Message\Message@index'/*Warehouse is the controller*/);
 Route::post('/message/process/{which_aspect}', 'App\Http\Controllers\Warehouse\Message\Message@processProduct'/*Warehouse is the controller*/);
 ////////////////////////////////////////////////////////////////////////////////////
  
////////////////////Message module
Route::get('/message/{which_aspect}', 'App\Http\Controllers\Warehouse\Message\Message@index'/*Warehouse is the controller*/);
Route::post('/message/process/{which_aspect}', 'App\Http\Controllers\Warehouse\Message\Message@processProduct'/*Warehouse is the controller*/);
Route::post('/uploadImgUrl/{path}', 'App\Http\Controllers\Warehouse\UploadFlieUrl@upload')->name('getStoreUploadURl');///route for uploading the  base64 file
 

////////////////////setting
Route::get('/settings/bank', 'App\Http\Controllers\Warehouse\Setting\Bank@index'/*Warehouse is the controller*/); 
Route::post('/settings/bank/account', 'App\Http\Controllers\Warehouse\Setting\Bank@update'/*Warehouse is the controller*/); 
Route::get('/settings/security', 'App\Http\Controllers\Warehouse\Setting\Security@index'/*Warehouse is the controller*/);
Route::post('/settings/security/resetPass2', 'App\Http\Controllers\Warehouse\Setting\Security@resetPass2'/*Warehouse is the controller*/); 
Route::get('/settings/profile', 'App\Http\Controllers\Warehouse\Setting\Profile@index'/*Warehouse is the controller*/);
Route::post('/settings/profile/update', 'App\Http\Controllers\Warehouse\Setting\Profile@update'/*Warehouse is the controller*/); 
Route::post('/settings/profile/update-profile-image', 'App\Http\Controllers\Warehouse\Setting\Profile@updateImage'/*Warehouse is the controller*/); 
Route::post('/settings/document/update', 'App\Http\Controllers\Warehouse\Setting\Document@update'/*Warehouse is the controller*/); 

Route::get('/settings/document', 'App\Http\Controllers\Warehouse\Setting\Document@index'/*Warehouse is the controller*/); 
////////////////////////////////////////////////////////////////////////////////////
////////////////////Analytical module
Route::get('/analytics/{which_aspect}', 'App\Http\Controllers\Warehouse\Analytics\Analytics@index'/*Warehouse is the controller*/);
Route::post('/analytics/process/{which_aspect}', 'App\Http\Controllers\Warehouse\Analytics\Analytics@processProduct'/*Admin is the controller*/);
////////////////////////////////////////////////////////////////////////////////////

////////////////////Settlement module
Route::get('/settlement/{which_aspect}', 'App\Http\Controllers\Warehouse\Settlement\Settlement@index'/*Warehouse is the controller*/);
Route::post('/settlement/process/{which_aspect}', 'App\Http\Controllers\Warehouse\Settlement\Settlement@processProduct'/*Admin is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
 Route::post('/uploadImgUrl/{path}', 'App\Http\Controllers\Warehouse\UploadFlieUrl@upload')->name('getStoreUploadURl');///route for uploading the  base64 file
 
Route::post('/dataGraph/{which_aspect}', 'App\Http\Controllers\Warehouse\AdminUserData@processGraph'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
Route::post('/counter/{which_aspect}', 'App\Http\Controllers\Warehouse\AdminUserData@counter'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
Route::post('/search_f', 'App\Http\Controllers\Warehouse\Search@search'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
Route::post('/checkDocument/{which_part}', 'App\Http\Controllers\Warehouse\AdminUserData@check'/*Aggregator is the controller*/);


});


Route::prefix('hub')->group(function(){
 
   Route::post('/myAccount', 'App\Http\Controllers\Hub\RegistrationController@myAccount')->name('hub.myaccount');
  // Route::post('/regenerate-token', 'App\Http\Controllers\Hub\RegistrationController@regenerateTokens')->name('hub.regenerate-token');
   Route::get('/', 'App\Http\Controllers\Hub\LoginController@index')->name('hub.login');
   Route::get('/login', 'App\Http\Controllers\Hub\LoginController@index')->name('hub.login');
   Route::post('custom-login','App\Http\Controllers\Hub\LoginController@customLogin')->name('hub.login.custom');
   Route::get('/forget-password','App\Http\Controllers\Hub\ForgetPasswordController@index');
   Route::post('/request-password', 'App\Http\Controllers\Hub\ForgetPasswordController@requestPassword')->name('hub.request.password');
   Route::get('/password-reset/{email}/{token}','App\Http\Controllers\Hub\ResetPasswordController@index');//->name('hub.reset.password');
   Route::post('/resetPassword', 'App\Http\Controllers\Hub\ResetPasswordController@resetPassword')->name('hub.reset.password');
   Route::get('/dashboard', 'App\Http\Controllers\Hub\HubController@dashboard')->name('hub.dashboard');//->middleware('auth:admin');
   Route::get('/getCurrentAdminData', 'App\Http\Controllers\Hub\AdminUserData@data'/*Admin is the controller*/)->name('hub.user-data');
   Route::get('/upload_vehicle/{user_id}', 'App\Http\Controllers\Hub\RegistrationController@viewVeh'/*Admin is the controller*/);
   Route::post('/uploadVehicle', 'App\Http\Controllers\Hub\RegistrationController@uploadVehicle'/*Admin is the controller*/);
   Route::get('/logout', 'App\Http\Controllers\Hub\HubController@logout'/*Admin is the controller*/);

     //ORDER module//////////////////////////////////////////////////////////
Route::get('/order/{which_aspect}', 'App\Http\Controllers\Hub\Order\Order@index'/*Logistics is the controller*/);
Route::post('/order/process/{which_aspect}', 'App\Http\Controllers\Hub\Order\Order@processProduct'/*Logistics is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
 
Route::post('/dataGraph/{which_aspect}', 'App\Http\Controllers\Hub\AdminUserData@processGraph'/*Aggregator is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
Route::post('/counter/{which_aspect}', 'App\Http\Controllers\Hub\AdminUserData@counter'/*Aggregator is the controller*/);

  ////////////////////Notification module
  Route::get('/notification/{which_aspect}', 'App\Http\Controllers\Hub\Notification\Notification@index'/*Hub is the controller*/);
  Route::post('/notification/process/{which_aspect}', 'App\Http\Controllers\Hub\Notification\Notification@processProduct'/*Hub is the controller*/);
  ////////////////////////////////////////////////////////////////////////////////////

   
 ////////////////////Message module
 Route::get('/message/{which_aspect}', 'App\Http\Controllers\Hub\Message\Message@index'/*Hub is the controller*/);
 Route::post('/message/process/{which_aspect}', 'App\Http\Controllers\Hub\Message\Message@processProduct'/*Hub is the controller*/);
 ////////////////////////////////////////////////////////////////////////////////////
  
////////////////////Message module
Route::get('/message/{which_aspect}', 'App\Http\Controllers\Hub\Message\Message@index'/*Hub is the controller*/);
Route::post('/message/process/{which_aspect}', 'App\Http\Controllers\Hub\Message\Message@processProduct'/*Hub is the controller*/);
Route::post('/uploadImgUrl/{path}', 'App\Http\Controllers\Hub\UploadFlieUrl@upload')->name('getStoreUploadURl');///route for uploading the  base64 file
 

////////////////////setting
Route::get('/settings/bank', 'App\Http\Controllers\Hub\Setting\Bank@index'/*Hub is the controller*/); 
Route::post('/settings/bank/account', 'App\Http\Controllers\Hub\Setting\Bank@update'/*Hub is the controller*/); 
Route::get('/settings/security', 'App\Http\Controllers\Hub\Setting\Security@index'/*Hub is the controller*/);
Route::post('/settings/security/resetPass2', 'App\Http\Controllers\Hub\Setting\Security@resetPass2'/*Hub is the controller*/); 
Route::get('/settings/profile', 'App\Http\Controllers\Hub\Setting\Profile@index'/*Hub is the controller*/);
Route::post('/settings/profile/update', 'App\Http\Controllers\Hub\Setting\Profile@update'/*Hub is the controller*/); 
Route::post('/settings/profile/update-profile-image', 'App\Http\Controllers\Hub\Setting\Profile@updateImage'/*Hub is the controller*/); 
Route::post('/settings/document/update', 'App\Http\Controllers\Hub\Setting\Document@update'/*Hub is the controller*/); 

Route::get('/settings/document', 'App\Http\Controllers\Hub\Setting\Document@index'/*Hub is the controller*/); 
////////////////////////////////////////////////////////////////////////////////////
////////////////////Analytical module
Route::get('/analytics/{which_aspect}', 'App\Http\Controllers\Hub\Analytics\Analytics@index'/*Hub is the controller*/);
Route::post('/analytics/process/{which_aspect}', 'App\Http\Controllers\Hub\Analytics\Analytics@processProduct'/*Admin is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
Route::post('/search_f', 'App\Http\Controllers\Hub\Search@search'/*Aggregator is the controller*/);
////////////////////Settlement module
Route::get('/settlement/{which_aspect}', 'App\Http\Controllers\Hub\Settlement\Settlement@index'/*Hub is the controller*/);
Route::post('/settlement/process/{which_aspect}', 'App\Http\Controllers\Hub\Settlement\Settlement@processProduct'/*Admin is the controller*/);
////////////////////////////////////////////////////////////////////////////////////
});


 Route::post('/uploadImgUrl/{path}', 'App\Http\Controllers\DataApi\UploadFlieUrl@upload')->name('getStoreUploadURl');///route for uploading the  base64 file
 Route::post('/event', 'App\Http\Controllers\Event@eventLog')->name('eventLog'); 
 Route::post('/search_f', 'App\Http\Controllers\Event@search')->name('searchF'); 
 
 //getBannerAdvert 
// Route::group(['middleware'=>'nameofmiddleware','prefix'=>'nameofcomponent'],function(){

// });