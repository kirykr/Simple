<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cimport;
use App\Computer;

class CimportdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $cimports = Cimport::orderBy('id', 'desc')->paginate(3);

      return view('admin.cimportdetails.index', compact('cimports'));
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
      $computer = Computer::findOrFail($id);
      $colors = $computer->colors()->select('name')->groupBy('name')->get();

      return view('admin.cimportdetails.show', compact('computer','colors'));
    }

    
}
