<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cimport;
use App\Supplier;
use App\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CimportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cimports = Cimport::orderBy('id', 'desc')->paginate(10);

		return view('admin.cimports.index', compact('cimports'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$suppliers = Supplier::lists('name','id')->all();
		$computers = Computer::lists('name','id')->all();
		return view('admin.cimports.create', compact('suppliers','computers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$cimport = null;
		if (Input::get('newsubmit')){
			$input = $request->all();
			$cimport = Cimport::create($input);
		}
		if (Input::get('addsubmit')){
			$input = $request->except(['photo_id']);
			
		}

		dd($input);
		

		return redirect()->route('admin.cimports.create')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$cimport = Cimport::findOrFail($id);

		return view('admin.cimports.show', compact('cimport'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$cimport = Cimport::findOrFail($id);

		return view('admin.cimports.edit', compact('cimport'));
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
		$cimport = Cimport::findOrFail($id);

		$cimport->impdate = $request->input("impdate");
        $cimport->impindate = $request->input("impindate");
        $cimport->invoicenum = $request->input("invoicenum");
        $cimport->totalamount = $request->input("totalamount");
        $cimport->user_id = $request->input("user_id");
        $cimport->supplier_id = $request->input("supplier_id");

		$cimport->save();

		return redirect()->route('admin.cimports.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cimport = Cimport::findOrFail($id);
		$cimport->delete();

		return redirect()->route('admin.cimports.index')->with('message', 'Item deleted successfully.');
	}

}
