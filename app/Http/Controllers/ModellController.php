<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Modell;
use App\Category;
use Illuminate\Http\Request;

class ModellController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$modells = Modell::orderBy('id', 'desc')->paginate(10);

		return view('admin.modells.index', compact('modells'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::lists('name','id')->all();
		return view('admin.modells.create',compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$modell = new Modell();

		$modell->name = $request->input("name");
        $modell->description = $request->input("description");
        $modell->category_id = $request->input("category_id");

		$modell->save();

		return redirect()->route('admin.modells.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$modell = Modell::findOrFail($id);

		return view('admin.modells.show', compact('modell'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$modell = Modell::findOrFail($id);
		$categories = Category::lists('name','id')->all();

		return view('admin.modells.edit', compact('modell','categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$modell = Modell::findOrFail($id);

		$modell->name = $request->input("name");
        $modell->description = $request->input("description");
        $modell->category_id = $request->input("category_id");

		$modell->save();

		return redirect()->route('admin.modells.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$modell = Modell::findOrFail($id);
		$modell->delete();

		return redirect()->route('admin.modells.index')->with('message', 'Item deleted successfully.');
	}

}
