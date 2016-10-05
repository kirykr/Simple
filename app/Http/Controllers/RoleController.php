<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Role;
use App\Permission;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
class RoleController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles = Role::all();
		$permissions = Permission::all();
		$modules=Module::all();
		return view('admin.roles.index', compact('roles','permissions','modules'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$permissions = Permission::all();
		$modules=Module::all();
		return view('admin.roles.create', compact('permissions','modules'));
		// $permissions = Permission::lists('name','id')->all();

		// return view('admin.roles.create', compact('permissions'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
	
		$role=new Role;
		$role->name=$request->name;
		$role->display_name=$request->display_name;
		$role->description=$request->description;

		$role->save();
		if(isset($request->modules)){
			$role->modules()->sync($request->modules,false);
		}else{

			//Session::flash('message', 'This is so dangerous!');
			//Session::flash('alert', 'alert-danger');
			//return redirect()->route('admin.roles.edit',$id);
			$role->modules()->sync(array());
		}
		//$role->modules()->sync($request->modules,false);
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
		$modules=Module::all();
		$moduleA=array();
		foreach($modules as $module){
				$moduleA[$module->id]=$module->name;
		}
		return view('admin.roles.edit', compact('role','permissions','moduleA'));
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
		/*$input = $request->all();

		$role = Role::findOrFail($id);

		$input['name'] = $request->input("name");
		$input['display_name'] = $request->input("display_name");
		$input['description'] = $request->input("description");

		$role->update($input);
        $role->permissions()->sync($request->input('permission_id'));
			*/
			$role=Role::find($id);
			$role->name=$request->name;
			$role->display_name=$request->display_name;
			$role->description=$request->description;

			$role->save();
			if(isset($request->modules)){
				$role->modules()->sync($request->modules);
			}else{

				//Session::flash('message', 'This is so dangerous!');
				//Session::flash('alert', 'alert-danger');
				//return redirect()->route('admin.roles.edit',$id);
				$role->modules()->sync(array());
			}


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
