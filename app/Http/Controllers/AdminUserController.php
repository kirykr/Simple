<?php
namespace App\Http\Controllers;

use Entrust;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use Alert;
use Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('admin');
    }
   
    public function index()
    {
       
        $users = User::orderBy('id', 'asc')->paginate(5);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $users = User::all();
        $roles = Role::lists('name','id')->all();
        // dd($roles);]

        return view('admin.users.create', compact('roles'));
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        // check if the password is empt

        // $role = Role::where('id','=',$request->role_id)->first();

        if($request->password == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
        }
        
        if($file = $request->file('photo_id'))
        {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $input['password'] = bcrypt($request->password);
        // dd($input);
        $userId = User::create($input)->id;
        $user = User::findOrFail($userId);
        $user->roles()->attach($request->role_id);
        
        Session::flash('create_user','The user has been created!');
        flash()->overlay('User has been created successfully','CREATE USER');

        return redirect('/admin/users');
        // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        Alert::success('Success Message', 'Optional Title');
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        // Find roles and put in the form
        $roles = Role::lists('name','id')->all();

        
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {

        // return $request->all();
        // check if the password is empty
        // $role = Role::where('id','=',$request->role_id)->first();
        $user = User::findOrFail($id);
        //testing
        // dd($request->input('role_id'));

        if(trim($request->password) == ''){
            $input = $request->except('password');
        }else{
            $input = $request->all();
        }
        
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input['role_id'] = $request->input('role_id');
        $input['password'] = bcrypt($request->password);

        $user->update($input);
        $user->roles()->sync([$request->input('role_id')]);

        Alert::success('Success Message', 'User is updated successfully!');
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::findOrFail($id);
        $roleId = $user->roles->first()->id;
        // dd($roleId);
        $name = $user->name;
        if($user->photo->path !== '')
            unlink(public_path() . $user->photo->path);
        
        // $user->roles()->sync([$roleId]);
        $user->delete();
        $user->roles()->sync([]);

        Session::flash('delete_user','The user has been deleted!');
        flash()->overlay('User '. $name . ' has been successfully deleted!','DELETE');

        return redirect('admin/users');
    }
}
