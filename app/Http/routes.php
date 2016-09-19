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
use App\Bcinvoice;
use App\User;
use App\Bcinvoicedetail;
use App\Other;
use App\Spec;
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
	$computers = Computer::orderBy('id', 'desc')->paginate(10);
		// return $computers->all();
	return view('welcome', compact('computers'));
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
		return redirect('/');
	}

	return view('admin.index');
});
// created Admin middleware and put all admin work inside
//Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function() {
// Route::get('/admin/shipping', 'ShippingController@index');
// Route::get('/admin/shipping/create','ShippingController@create');
	

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
	Route::resource('/admin/invoices','BcinvoiceController');
	Route::get('/admin/invoices/computers/{id}',function($id){
			$computer =  Computer::find($id);
			return $computer;
			});
	Route::resource('/admin/tmpinvoices','TmpinvoiceController');
	Route::resource('/admin/tmpinvoices/detail','TmpdetailController');
	
	//Route::resource("/admin/shipping","ShippingController");
	
	Route::group(array('prefix' => 'admin'), function(){
		Route::group(array('prefix' => 'api'), function(){
			Route::group(array('prefix' => 'v1'), function(){
				
				Route::resource('brands.types', 'api\v1\TypesController', ['only' => ['index']]);

				Route::resource('types.categories', 'api\v1\CategoriesController', ['only' => ['index']]);

				Route::resource('categories.modells', 'api\v1\ModellsController', ['only' => ['index']]);

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

