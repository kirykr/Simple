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
use App\Other;
use App\Bcinvoice;
use App\Cart;
use App\User;
use App\Bcinvoicedetail;
use App\Spec;
use App\Tmpdetail;
use App\Color;
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
	$computers = Computer::orderBy('id', 'desc')->paginate(12);
	$computer = new Computer();
	// $cart = count(Cart::where('customer_id','=',Auth::user()->id)->get());
	// dd($cart);
	// $others = Other::orderBy('id', 'desc')->paginate(12);
	// $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->get();
		// return $computers->all();
	$cart = new Cart();
	return view('welcome', compact('computers','cart','computer'));
	// return view('welcome')->with('computers', Computer::orderBy('id', 'desc')->paginate(12))->with('others', Other::orderBy('id', 'desc')->paginate(12));
    // return view('welcome');
});
// Route::get('/product/{id}', function ($id) {
// 	$computer = Computer::findOrFail($id);
// 		// return $computer->all();
// 	return view('product', compact('computer'));
//     // return view('welcome');
// });


Route::auth();

Route::get('/admin', function(){
	
	if(!Entrust::hasRole(['admin','owner','HR'])){
		// $cart=count(Cart::where('customer_id','=','1')->get());
		return redirect('/');
	}

	return view('admin.index');
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

	Route::resource('/admin/users', 'AdminUserController');
	Route::resource('/admin/posts','PostController');
	Route::resource('/admin/categories', 'CategoryController');
	Route::resource('/admin/computers','ComputerController');
	Route::resource('/admin/others','OtherController');
	Route::resource('/admin/specs','SpecController');
	Route::resource('/admin/types','TypeController');
	Route::resource('/admin/brands','BrandController');
	Route::resource('/admin/modells','ModellController');
	Route::resource('/admin/permissions','PermissionController'); 
	Route::resource("/admin/suppliers","SupplierController");
	Route::resource('/admin/roles','RoleController');
	Route::resource("/admin/cimports","CimportController");
	Route::resource("/admin/colors","ColorController");
	Route::resource("/admin/oimports","OimportController");
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
// Route::resource("bcinvoices","BcinvoiceController");

