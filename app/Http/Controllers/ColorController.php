<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Color;
use Illuminate\Http\Request;

class ColorController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$colors = Color::orderBy('id', 'desc')->paginate(10);

		return view('admin.colors.index', compact('colors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.colors.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$color = new Color();

		$color->name = $request->input("name");
        $color->description = $request->input("description");

		$color->save();

		return redirect()->route('admin.colors.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$color = Color::findOrFail($id);

		return view('admin.colors.show', compact('color'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$color = Color::findOrFail($id);

		return view('admin.colors.edit', compact('color'));
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
		$color = Color::findOrFail($id);

		$color->name = $request->input("name");
        $color->description = $request->input("description");

		$color->save();

		return redirect()->route('admin.colors.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$color = Color::findOrFail($id);
		$color->delete();

		return redirect()->route('admin.colors.index')->with('message', 'Item deleted successfully.');
	}

}
