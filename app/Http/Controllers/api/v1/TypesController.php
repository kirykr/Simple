<?php 
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Type;
use Illuminate\Http\Request;
use App\Category;

class TypesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$type = Type::findOrFail($id);
		$categories = $type->categories;
		return response()->json($categories);

		// return view('admin.types.index', compact('types'));
	}

}