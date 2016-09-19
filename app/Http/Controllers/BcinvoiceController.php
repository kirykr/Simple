<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bcinvoice;
use App\Bcinvoicedetail;
use App\User;
use App\Computer;
use App\Other;
use App\Tmpdetail;
use App\Tmpinvoice;
use App\Color;
class BcinvoiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bcinvoices = Bcinvoice::orderBy('id', 'desc')->paginate(10);
		$computers = Computer::lists('name','id')->all();
		return view('admin.bcinvoices.index', compact('bcinvoices','computers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$computers=Computer::lists('name','id')->all();
		$others = Other::lists('name','id')->all();
		$colors = Color::lists('name','id')->all();
		$tmpinvoices=Tmpinvoice::find(1);
		return view('admin.bcinvoices.create',compact('computers','others','tmpinvoices','colors'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		$bcinvoice = new Bcinvoice();
		$bcinvoice->indate = $request->input("indate");
        $bcinvoice->tamount = $request->input("tamount");
        $bcinvoice->discount = $request->input("discount");
        $bcinvoice->subtotal = $request->input("subtotal");
        $bcinvoice->user_id = $request->input("user_id");
		$bcinvoice->save();

		$bcinv = Bcinvoicedetail::all();

		$bcinvoice->bcinvs()->saveMany($bcinv);

		return redirect()->route('admin.bcinvoices.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $bcinvoice = Bcinvoice::findOrFail($id);
		//showdetail of invoice
		$bcinvoice = Bcinvoice::find($id); 
		return view('admin.bcinvoices.show', compact('bcinvoice'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$bcinvoice = Bcinvoice::findOrFail($id);

		return view('admin.bcinvoices.edit', compact('bcinvoice'));
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
		$bcinvoice = Bcinvoice::findOrFail($id);

		$bcinvoice->indate = $request->input("indate");
        $bcinvoice->tamount = $request->input("tamount");
        $bcinvoice->discount = $request->input("discount");
        $bcinvoice->subtotal = $request->input("subtotal");
        $bcinvoice->user_id = $request->input("user_id");

		$bcinvoice->save();

		return redirect()->route('admin.bcinvoices.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$bcinvoice = Bcinvoice::findOrFail($id);
		$bcinvoice->delete();

		return redirect()->route('admin.bcinvoices.index')->with('message', 'Item deleted successfully.');
	}

}
