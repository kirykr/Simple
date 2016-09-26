<?php 
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Computer;

class SellPricesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$computer = Computer::findOrFail($id);
		return response()->json($computer);

		// return view('admin.categories.index', compact('categories'));
	}

}