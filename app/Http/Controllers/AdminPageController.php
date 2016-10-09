<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
use App\Module;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
class AdminPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$user=Auth::user()->name;
      $roles=DB::table('users')->where('name',$user)->first();
      $rol=$roles->role_id;//role id
      $role=Role::find($rol);
      $rolename=$role->name;//role name
      */
      //$modrole=DB::table('module_roles')->where('role_id',$rol)->get();//id role and moudule id
      //$a=$modrole->mod_id;

      //$role=Auth::user()->roles;

      //echo Auth::user()->name;

      /*foreach($u as $u){
        echo $u->name;
      }*/

      $array = [];
      $arr = [];
       foreach(Auth::user()->roles as $rname ){
           foreach($rname->modules as $mo){
             $test= $mo->nav;
             $array[]=array_add(['name' => 'ko'], 'module',$test);
           }
       }
       //$result = array_unique($array);
       //echo $rol;

       $collection = collect($array);
       $collection1 = $collection->unique('module');
       foreach ($collection1 as $item) {
           //echo $item['module'];
        }
//         $e = $result[$i];
//         $arr[] = array("module" => $e);

       /*
       foreach ($arr as $memu){
         echo $memu['module'];
         //$result = array_unique();
       }*/
       //dd($array,$collection1) ;

       //$user=\Auth::user();
       //dd($user->hasRole('owner'));

     //return view('admin.index', compact('collection1'));



      return view('admin.index', compact('u','result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
    }
}
