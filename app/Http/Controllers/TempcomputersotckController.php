<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tempcomputerstock;
use App\SerialTemp;
use Illuminate\Support\Facades\Input;

class TempcomputersotckController extends Controller
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
    public function store(Request $request)
    {
      $input = $request->all();
          // dd($input);
      // dd($request->input('serialnumber')[0]);
      if (Input::get('saveserail') == 'saveserail'){
        $tempcomputer = Tempcomputerstock::findOrFail($request->input('tempcomputer_id'));

        for($i = 0; $i < count($request->input('serialnumber')); $i++) {
          $tempcomputer->serialtemps()->save(new SerialTemp(['computer_id' => $request->input('computer_id'),'color_id' => $request->input('color_id'),'serialnumber' => $request->input('serialnumber')[$i]]));
        }
      }

      return redirect()->route('admin.cimports.create')->with('message', 'Item created successfully.');
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
      $tempcomputer = Tempcomputerstock::findOrFail($id);

      return view('admin.tempcomputersotck.show', compact('tempcomputer'));
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
       $tempcomputer = Tempcomputerstock::findOrFail($id);

       return view('admin.tempcomputersotck.edit', compact('tempcomputer'));
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
      $tempcomputer = Tempcomputerstock::findOrFail($id);
      $tempcomputer->delete();
      
      return redirect()->route('admin.cimports.create')->with('message', 'Item deleted successfully.');
    }
  }
