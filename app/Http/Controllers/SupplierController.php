<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$suppliers = Supplier::orderBy('id', 'desc')->paginate(10);

		return view('admin.suppliers.index', compact('suppliers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.suppliers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$supplier = new Supplier();

		$supplier->name = $request->input("name");
        $supplier->contactperson = $request->input("contactperson");
        $supplier->tel = $request->input("tel");
        $supplier->address = $request->input("address");

		$supplier->save();

		return redirect()->route('admin.suppliers.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$supplier = Supplier::findOrFail($id);

		return view('admin.suppliers.show', compact('supplier'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$supplier = Supplier::findOrFail($id);

		return view('admin.suppliers.edit', compact('supplier'));
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
		$supplier = Supplier::findOrFail($id);

		$supplier->name = $request->input("name");
        $supplier->contactperson = $request->input("contactperson");
        $supplier->tel = $request->input("tel");
        $supplier->address = $request->input("address");

		$supplier->save();

		return redirect()->route('admin.suppliers.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$supplier = Supplier::findOrFail($id);
		$supplier->delete();

		return redirect()->route('admin.suppliers.index')->with('message', 'Item deleted successfully.');
	}

}
