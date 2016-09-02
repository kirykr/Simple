<?php 
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Type;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
class TypesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		// $type = Type::findOrFail($id);
		// $categories = $type->categories;
		// return response()->json($categories);
		$brand = Brand::findOrFail($id);
		$types = $brand->types;
		return response()->json($types);

		// return view('admin.types.index', compact('types'));
	}

}