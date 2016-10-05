<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Oimport;
use App\Other;

class OimportdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      $oimports = Oimport::orderBy('updated_at', 'desc')->paginate(3);

      return view('admin.oimportdetails.index', compact('oimports'));
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
      $other = Other::findOrFail($id);
      $colors = $other->colors()->select('name')->groupBy('name')->get();

      return view('admin.oimportdetails.show', compact('other','colors'));
    }

    
}
