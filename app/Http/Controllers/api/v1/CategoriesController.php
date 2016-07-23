<?php 
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;
use App\Type;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($types)
	{
		$type = Type::findOrFail($types);
		$categories = $type->categories;
		return response()->json($categories);

		// return view('admin.categories.index', compact('categories'));
	}

}