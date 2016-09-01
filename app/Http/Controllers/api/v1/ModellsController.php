<?php 
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Brand;
use Illuminate\Http\Request;
use App\Modell;

class ModellsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$brand = Brand::findOrFail($id);
		$modells = $brand->modells;
		return response()->json($modells);

		// return view('admin.categories.index', compact('categories'));
	}

}