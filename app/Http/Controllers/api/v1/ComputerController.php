<?php 
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\Computer;
use Illuminate\Http\Request;
use App\Type;

class ComputerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$computer = Computer::find($id);
		return response()->json($computer);
		// return view('admin.categories.index', compact('categories'));
	}

}