<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Spec;
use Illuminate\Http\Request;

class SpecController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$specs = Spec::orderBy('id', 'desc')->paginate(10);

		return view('admin.specs.index', compact('specs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$specs = Spec::orderBy('id', 'desc')->paginate(10);
		return view('admin.specs.create', compact('specs'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$spec = new Spec();

		$spec->name = $request->input("name");

		$spec->save();

		return redirect()->route('admin.specs.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$spec = Spec::findOrFail($id);

		return view('admin.specs.show', compact('spec'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$spec = Spec::findOrFail($id);

		return view('admin.specs.edit', compact('spec'));
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
		$spec = Spec::findOrFail($id);

		$spec->name = $request->input("name");

		$spec->save();

		return redirect()->route('admin.specs.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$spec = Spec::findOrFail($id);
		$spec->delete();

		return redirect()->route('admin.specs.index')->with('message', 'Item deleted successfully.');
	}

}
