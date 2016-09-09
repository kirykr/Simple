<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Oimport;
use Illuminate\Http\Request;

class OimportController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$oimports = Oimport::orderBy('id', 'desc')->paginate(10);

		return view('admin.oimports.index', compact('oimports'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.oimports.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$oimport = new Oimport();

		$oimport->impdate = $request->input("impdate");
        $oimport->impindate = $request->input("impindate");
        $oimport->invoicenumber = $request->input("invoicenumber");
        $oimport->user_id = $request->input("user_id");
        $oimport->supplier_id = $request->input("supplier_id");
        $oimport->totalamount = $request->input("totalamount");

		$oimport->save();

		return redirect()->route('admin.oimports.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$oimport = Oimport::findOrFail($id);

		return view('admin.oimports.show', compact('oimport'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$oimport = Oimport::findOrFail($id);

		return view('admin.oimports.edit', compact('oimport'));
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
		$oimport = Oimport::findOrFail($id);

		$oimport->impdate = $request->input("impdate");
        $oimport->impindate = $request->input("impindate");
        $oimport->invoicenumber = $request->input("invoicenumber");
        $oimport->user_id = $request->input("user_id");
        $oimport->supplier_id = $request->input("supplier_id");
        $oimport->totalamount = $request->input("totalamount");

		$oimport->save();

		return redirect()->route('admin.oimports.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$oimport = Oimport::findOrFail($id);
		$oimport->delete();

		return redirect()->route('admin.oimports.index')->with('message', 'Item deleted successfully.');
	}

}
