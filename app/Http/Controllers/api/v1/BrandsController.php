<?php 
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Brand;
use App\Type;
use Illuminate\Http\Request;

class BrandsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$brand = Brand::findOrFail($id);
		$types = $brand->types;
		return response()->json($types);

		// return view('admin.categories.index', compact('categories'));
	}

}