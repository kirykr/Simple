<?php 
namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\Other;
use Illuminate\Http\Request;
use App\Type;

class OtherController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$other = Other::find($id);
		return response()->json($other);
		// return view('admin.categories.index', compact('categories'));
	}

}