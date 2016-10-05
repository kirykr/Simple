<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$modules = Module::orderBy('id', 'desc')->paginate(10);

		return view('admin.modules.index', compact('modules'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.modules.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$module = new Module();

		$module->name = $request->input("name");
        $module->nav = $request->input("nav");
        $module->description = $request->input("description");

		$module->save();

		return redirect()->route('admin.modules.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$module = Module::findOrFail($id);

		return view('admin.modules.show', compact('module'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$module = Module::findOrFail($id);

		return view('admin.modules.edit', compact('module'));
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
		$module = Module::findOrFail($id);

		$module->name = $request->input("name");
        $module->nav = $request->input("nav");
        $module->description = $request->input("description");

		$module->save();

		return redirect()->route('admin.modules.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$module = Module::findOrFail($id);
		$module->delete();

		return redirect()->route('admin.modules.index')->with('message', 'Item deleted successfully.');
	}

}
