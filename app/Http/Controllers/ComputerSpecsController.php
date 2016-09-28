<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Computer;
use App\Spec;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Session;

class ComputerSpecsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $computerId)
    {
        $this->validate($request, [
                    'description' => 'required|max:25',
                    'spec_id' => 'required',
                ]);
        // dd($request->all());
        // dd($computerId);
        $computer = Computer::find($computerId);

        if (Input::get('addspec') == 'addspec'){
          $spec = Spec::find($request->input('spec_id'));
          $computer->specs()->save($spec, ['description'=> $request->input('description')]); 

          Session::flash('create_user','The user has been created!');
          return redirect()->back();
        }
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
