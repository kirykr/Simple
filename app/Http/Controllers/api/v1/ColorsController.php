<?php 
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Computer;
use App\Color;
class ColorsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$color = Color::findOrFail($id);
		$serials = $color->computers;
		return response()->json($serials);

		// return view('admin.categories.index', compact('categories'));
	}

}