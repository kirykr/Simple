<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::orderBy('id', 'desc')->paginate(10);
		$permissions = Permission::all();

		return view('admin.roles.index', compact('roles','permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$permissions = Permission::all();

		return view('admin.roles.create', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		// testing
		// dd($request->input('permissions'));
		$input['name'] = $request->input("name");
		$input['display_name'] = $request->input("display_name");
		$input['description'] = $request->input("description");

		$role = Role::create($input)->id;
		$role->attachPermission([$request->input('permissions')]);

		return redirect()->route('admin.roles.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$role = Role::findOrFail($id);

		return view('admin.roles.show', compact('role'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$role = Role::findOrFail($id);
		$permissions = Permission::all();

		return view('admin.roles.edit', compact('role','permissions'));
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
		$input = $request->all();

		$role = Role::findOrFail($id);

		$input['name'] = $request->input("name");
		$input['display_name'] = $request->input("display_name");
		$input['description'] = $request->input("description");

		$role->update($input);
        $role->permissions()->sync($request->input('permission_id'));

		return redirect()->route('admin.roles.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Role::findOrFail($id);
		$role->delete();
		$role->perms()->sync([]);

		return redirect()->route('admin.roles.index')->with('message', 'Item deleted successfully.');
	}

}
