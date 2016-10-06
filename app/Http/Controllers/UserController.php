<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

use App\Http\Requests;
use Storage;
use App\User;
use App\Role;
use Hash;
use Alert;
use Image;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

     $users = User::all();




     return view('admin.users.index', compact('users'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all();
      // dd($roles);]

      return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required|max:35|unique:users,name',
        'email' => 'required|email|unique:users,email',
        'password' => 'required'
        ]);


      if($avatar=$request->file('avatar')){

        $fileName = time() . '.' . $avatar->getClientOriginalExtension();
        $path = public_path('/uploads/avatars/' . $fileName);
        Image::make($avatar)->resize(200,200)->save($path);
        $img = Image::make($avatar)->resize(200, 200, 
          function ($c) {
            $c->aspectRatio();
            $c->upsize();
          }
          )->resizeCanvas(200, 200, 'center', false, array(255, 255, 255, 0))->save($path);

        $img->destroy();  
      }else{
        $fileName='';
      }

      $user= New User();
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->is_active=$request->is_active;
      $user->avatar=$fileName;
      $user->save();

      if(isset($request->roles)){
        $user->roles()->sync($request->roles,false);
      }else{

                //Session::flash('message', 'This is so dangerous!');
                //Session::flash('alert', 'alert-danger');
                //return redirect()->route('admin.roles.edit',$id);
        $user->roles()->sync(array());
      }

return redirect()->route('admin.users.index')->with('message', 'Item created successfully.');
/*
        $user= New User();


        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->is_active=$request->is_active;

        $fileUpload= $request->name.'-'.$fileName;
        Storage::put("product/".$fileUpload,
        file_get_contents($file->getRealPath())
        );
        $user->photo=$fileUpload;
        $user->save();

        if(isset($request->roles)){
          $user->roles()->sync($request->roles,false);
        }else{

          //Session::flash('message', 'This is so dangerous!');
          //Session::flash('alert', 'alert-danger');
          //return redirect()->route('admin.roles.edit',$id);
          $user->roles()->sync(array());
        }
       return redirect()->route('admin.users.index')->with('message', 'Item created successfully.');
       */
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
      $user = User::findOrFail($id);

      $roles=Role::all();
      $roleA=array();
      foreach($roles as $role){
        $roleA[$role->id]=$role->name;
      }
      return view('admin.users.edit', compact('user','roleA'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $this->validate($request, [
        'name' => "required|max:35|unique:users,name,$id",
        'email' => "required|email|unique:users,email,$id",
        'password' => 'required'
        ]);

      $user=User::find($id);
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=Hash::make($request->password);
      $user->is_active=$request->is_active;

      if($avatar=$request->file('avatar')){

        $fileName = time() . '.' . $avatar->getClientOriginalExtension();
        $path = public_path('/uploads/avatars/' . $fileName);
        Image::make($avatar)->resize(200,200)->save($path);
        $img = Image::make($avatar)->resize(200, 200, 
          function ($c) {
            $c->aspectRatio();
            $c->upsize();
          }
          )->resizeCanvas(200, 200, 'center', false, array(255, 255, 255, 0))->save($path);

        $img->destroy();  
      }else{
        $fileName='';
      }

    $user->avatar = $fileName;
    $user->save();

    if(isset($request->roles)){
      $user->roles()->sync($request->roles,false);
    }else{

        //Session::flash('message', 'This is so dangerous!');
        //Session::flash('alert', 'alert-danger');
        //return redirect()->route('admin.roles.edit',$id);
      $user->roles()->sync(array());
    }


    return redirect()->route('admin.users.index')->with('message', 'User updated successfully.');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);
      $img=$user->avatar;
      //File::Delete('public/uploads/avatars/'.$img);
      $image_path = public_path('/uploads/avatars/'.$img);
      if (File::exists($image_path)) {
        //File::delete($image_path);
        unlink($image_path);
      }
      $user->delete();

      return redirect()->route('admin.users.index')->with('message', 'User deleted successfully.');
    }

    public function getImagePro($filename){
      $file=Storage::get('product/'.$filename);
      return new Response($file,200);
    }

    public function getImageDef($filename){
      $file=Storage::get('product/default-no-image.png');
      return new Response($file,200);
    }
  }
