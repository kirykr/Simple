<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Computer;
use App\Product;
use App\Other;
use App\Bcinvoice;
use App\Cart;
use App\User;
use App\Bcinvoicedetail;
use App\Spec;
use App\Tmpdetail;
use App\Color;
use App\Brand;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| test Eloquent Relationship
|--------------------------------------------------------------------------
*/
// Route::get('/showbinvoice',function(){
// 	$user= User::find(15);
// 	foreach ($user->bcinvoices as $bcinvoice) {
// 		echo $bcinvoice."<br/>";
// 	}
// });
// Route::get('/showbinvoicedetail',function (){
// 	$bcinvoice = Bcinvoice::find(1);
// 	foreach ($bcinvoice->bcinvoicedetails as $bcinvoicedetail) {
// 		echo $bcinvoicedetail."<br/>";
// 	}
// });
// Route::get('/showdescription',function (){
// 	$computer = Computer::find('c57c50bb5e4709');
// 	//return $computer;
// 	foreach ($computer->specs as $spec) {
// 		echo $spec->pivot->description."<br/>";
// 	}
// });


Route::get('/', function () {
	// $computers = Product::orderBy('updated_at', 'desc')->paginate(12);
	$page = Input::get('page', 1);
	$paginate = 12;

	 $table1 = DB::table('computers')->select('id','name','qtyinstock','sellprice','ppprice','provprice','created_at','updated_at');
	 $afterunion = DB::table('others')->select('id','name','qtyinstock','sellprice','ppprice','provprice','created_at','updated_at')->union($table1)->get();

	$offSet = ($page * $paginate) - $paginate;
	$itemsForCurrentPage = array_slice($afterunion, $offSet, $paginate, true);
	$computers = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($afterunion), $paginate, $page);

	$cart = new Cart();

	return view('welcome', compact('computers','cart'));
});
// Route::get('/product/{id}', function ($id) {
// 	$computer = Computer::findOrFail($id);
// 		// return $computer->all();
// 	return view('product', compact('computer'));
//     // return view('welcome');
// });
Route::get('/laptops', function(){
	$computers = Computer::orderBy('updated_at', 'desc')->paginate(12);

	$cart = new Cart();
	return view('welcome', compact('computers','cart'));
});

Route::get('/accessories', function(){
	$computers = Other::orderBy('updated_at', 'desc')->paginate(12);

	$cart = new Cart();
	return view('welcome', compact('computers','cart'));
});


Route::get('/productbrands/{id}', function($id){
	$page = Input::get('page', 1);
	$paginate = 12;

	$table1 = DB::table('computers')->select('id','name','qtyinstock','sellprice','ppprice','provprice','brand_id')->where('brand_id','=', $id);

	$afterunion = DB::table('others')->select('id','name','qtyinstock','sellprice','ppprice','provprice','brand_id')->where('brand_id','=', $id)->union($table1)->get();

	$offSet = ($page * $paginate) - $paginate;
	$itemsForCurrentPage = array_slice($afterunion, $offSet, $paginate, true);
	$computers = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($afterunion), $paginate, $page);

	$cart = new Cart();
	return view('welcome', compact('computers','cart'));
});

Route::get('/user/profile', function(){


	$cart = new Cart();
	return view('/user.index', compact('cart'));
});

// public static function pluralize($quantity, $singular, $plural=null) {
//     if($quantity==1 || !strlen($singular)) return $singular;
//     if($plural!==null) return $plural;

//     $last_letter = strtolower($singular[strlen($singular)-1]);
//     switch($last_letter) {
//         case 'y':
//             return substr($singular,0,-1).'ies';
//         case 's':
//             return $singular.'es';
//         default:
//             return $singular.'s';
//     }
// }


// ================================== backend ===============================
Route::auth();

/*Route::get('/admin', function(){

	if(!Entrust::hasRole(['admin','owner','HR'])){
		return redirect('/admin');
	}

<<<<<<< HEAD
	return view('admin.index');
});*/

		Route::get('/admin', function(){
			if (Auth::check()){
				if(Auth::user()->is_active ==1){
					foreach(Auth::user()->roles as $rname){
						//if($rname->name){
						if(Entrust::hasRole([$rname->name])){
							$array = [];
							$arr = [];
							 foreach(Auth::user()->roles as $rname ){
									 foreach($rname->modules as $mo){
										 $test= $mo->nav;
										 $array[]=array_add(['name' => 'ko'], 'module',$test);
									 }
							 }
							 //$result = array_unique($array);
							 //echo $rol;

							 $collection = collect($array);
							 $collection1 = $collection->unique('module');
							 foreach ($collection1 as $item) {
									 //echo $item['module'];
								}
							return view('admin.index2', compact('collection1'));

						}
					}

				}
			}
			return redirect('/');
		});

// Route::get('/admin', 'AdminPageController@index');
	// return view('admin.index2');
// });

Route::get('/about', function(){

	$cart = new Cart();
	return view('about', compact('cart'));
});
Route::get('/contact', function(){

	$cart = new Cart();
	return view('contact', compact('cart'));
});
// created Admin middleware and put all admin work inside
//Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
// Route::get('/admin/shipping', 'ShippingController@index');
// Route::get('/admin/shipping/create','ShippingController@create');
Route::resource("/checkout","CheckoutController");
// Route::get("/get/getcartdetail",function(){
// 	$carts =
// });
Route::group(['middleware'=>'admin'], function(){
	//Route::resource('/admin/users', 'AdminUserController');

	//Route::get('/admin', 'AdminPageController@index');


	Route::get('image/{filename}','UserController@getImagePro')->name('admin.users.image');
	Route::get('imagedef','UserController@getImageDef')->name('admin.users.imagedef');

	Route::resource('/admin/users', 'UserController');
	Route::resource('/admin/posts','PostController');
	Route::resource('/admin/categories', 'CategoryController');
	Route::resource('/admin/computers','ComputerController');
	Route::resource('/admin/others','OtherController');
	Route::resource('/admin/specs','SpecController');
	Route::resource('/admin/types','TypeController');
	Route::resource('/admin/brands','BrandController');
	Route::resource('/admin/modells','ModellController');
	Route::resource('/admin/permissions','PermissionController');

	Route::resource('/admin/rol','ModulesController');
	Route::resource('/admin/modules','ModulesRoleController');

	Route::resource("/admin/suppliers","SupplierController");
	Route::resource('/admin/roles','RoleController');
	Route::resource("/admin/cimports","CimportController");
	Route::resource("/admin/colors","ColorController");
	Route::resource("/admin/oimports","OimportController");
	Route::resource("admin/modules","ModuleController");

	Route::resource("/admin/cimportdetails", "CimportdetailsController", ['only' => ['index','show']]);
	Route::resource("/admin/oimportdetails", "OimportdetailsController", ['only' => ['index','show']]);
	// Route::resource("/admin/computerspecs", "ComputerSpecsController");
	Route::post('/admin/computerspecs/{id}', array('as' => 'admin.computerspecs.store', 'uses' => 'ComputerSpecsController@store'));

	Route::resource("/admin/tempcomputersotck","TempcomputersotckController", ['only' => ['edit','store','update','destroy','show']]);
	Route::resource("/admin/tempother","TempotherController", ['only' => ['edit','store','update','destroy']]);
	Route::resource("/admin/bcinvoices","BecinvoiceController");
	// Route::resource('/admin/invoices','BcinvoiceController');
	// Route::get("/admin/invoices/","BcinvoiceController@index");
	// Route::get("/admin/invoicesasdf/{id}","BcinvoiceController@show2");
	Route::resource('/admin/tmpdetail',"TmpdetailController");
	Route::get('/admin/invoices/computers/{id}',function($id){
			$computer =  Computer::find($id);
			return response()->json($computer);
			});
	Route::get('/admin/invoices/others/{id}',function($id){
			$other =  Other::find($id);
			return response()->json($other);
			});
	Route::get("/admin/computers/descriptions/{id}",function($id){
			$computer = Computer::find($id);
			$descs = $computer->specs;
			return response()->json($descs);
	});
	Route::get("/admin/other/name/{id}",function($id){
			$other = Other::find($id);
			return response()->json($other);
	});
	Route::get("/admin/computers/serialnumbers/{id}/{cid}",function(Request $request,$id,$cid){
			$computer = Computer::find($id);
			$serialnumbers = $computer->colors()->where('color_id','=',$cid)->get();
			return response()->json($serialnumbers);
	});
	Route::get("/admin/computer/updatestatus/{id}",function(Request $request,$id){
			$computer = Computer::findOrFail($id);
			$status = $computer->colors()->where("serialnumber","=","$id");
			$status->status="unavailable";
			$status->save();
	});
	Route::get("/admin/computer/serialid/{id}",function(Request $request,$id){
			$serial_id = DB::table('color_computer')->select('id')->where('serialnumber','=', $id)->get();
			return response()->json($serial_id);
	});
	Route::get("/admin/computerinv/getamount",function(){
			$amount = Tmpdetail::all();
			$am = $amount->sum('amount');
			return response()->json($am);
	});
	Route::get("/admin/count/{cpid}/{clid}",function($cpid,$clid){
			$computer = Computer::find($cpid);
			$colors = $computer->colors()->where('color_id','=',$clid)->get();
			return count($colors);
	});
	Route::get("/admin/color/getname/{id}",function($id){
			$color= Color::find($id);
			return response()->json($color);
	});

	// Route::get('/admin/cimports/computers/serials/{id}/', function($id){
	// 	$computer = Computer::findOrFail($id);
	// 	$details = $computer->colors;
	// 	// dd($details);
	// 	return response()->json($details);
	// });

	Route::resource('/admin/tmpinvoices','TmpinvoiceController');
	Route::resource('/admin/tmpinvoices/detail','TmpdetailController');
	Route::get('/admin/printinvoice/{id}',function($id){
		$bcinvoice = Bcinvoice::find($id);
		return view('admin/printinvoice/invoiceprint',compact('bcinvoice'));
	});

	//Route::resource("/admin/shipping","ShippingController");

	Route::group(array('prefix' => 'admin'), function(){
		Route::group(array('prefix' => 'api'), function(){
			Route::group(array('prefix' => 'v1'), function(){

				Route::resource('brands.types', 'api\v1\TypesController', ['only' => ['index']]);

				Route::resource('types.categories', 'api\v1\CategoriesController', ['only' => ['index']]);

				Route::resource('categories.modells', 'api\v1\ModellsController', ['only' => ['index']]);

				Route::resource('computers', 'api\v1\ComputerController',['only' => ['show', 'update']]);

				Route::resource('others', 'api\v1\OtherController',['only' => ['show', 'update']]);

				Route::resource('computers.colors', 'api\v1\ComputersController', ['only' => ['index']]);

				Route::resource('colors.computers', 'api\v1\ColorsController', ['only' => ['index']]);

				Route::resource('others.colors' , 'api\v1\OthersController' , 	['only'	=>	['index']]);

				Route::resource('computers', 'api\v1\SellPricesController', ['only' => ['index']]);

			});
		});
	});
});

Route::resource('products', 'ProductsController');
Route::resource('/home', 'HomeController@index');
Route::resource('/carts', 'CartController');
