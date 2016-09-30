<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Cimport;
use App\Supplier;
use App\Computer;
use App\Tempcomputerstock;
use App\Color;
use Carbon\Carbon;

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
		$colors = Color::lists('name','id')->all();
		$tempcomputers = Tempcomputerstock::all();

		return view('admin.cimports.create', compact('suppliers','computers','colors','tempcomputers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		$input = $request->all();
		
		$cimport = null;
		// if (Input::get('newsubmit') == 'newsubmit'){
		// 	$input = $request->all();
		// 	// $cimport = Cimport::create($input);
		// }
		if (Input::get('addsubmit') == 'addsubmit'){
			 $this->validate($request, [
			        'computer_id' => 'required|max:22',
			        'qtyinstock' => 'required|numeric|min:1',
			        'color_id' => 'required|numeric|min:1',
			        'sellprice' => 'required|numeric|min:1',
			        'cost' => 'required|numeric|min:1',
			    ]);

			// $input = $request->except(['photo_id']);

			$input['color_name'] =  DB::table('colors')->where('id', $request->input('color_id'))->value('name');
			$input['computer_name'] =  DB::table('computers')->where('id', $request->input('computer_id'))->value('name');
			$input['qty'] = $request->input('qtyinstock');
			$input['amount'] = $request->input('qtyinstock') * $request->input('cost');
			$tempcomputer= Tempcomputerstock::create($input);
			return redirect()->back();
		}

		// Import Computers
		// $input = $request->except(['computer_id', 'color_id','qtyinstock','sellprice','cost']);
		$cimport = new Cimport();
		/*$cimport	$input['impdate'] = Carbon::now();
		$input['impindate'] = Carbon::now();*/
		
		if (Input::get('savesubmit') == 'savesubmit'){
			 $this->validate($request, [
			        'supplier_id' => 'required|max:22',
			        'invoicenum' => 'required|max:22',
			        'serialtemp' => 'required|min:7',
			        // 'invoicenum' => 'required|max:22|unique:cimports,invoicenum'
			    ]);
			// dd($request->all());
			// $cimport->impdate = $request->input("impdate");
   //    $cimport->impindate = $request->input("impindate");
			$cimport->impdate = Carbon::now();
      $cimport->impindate = Carbon::now();
      $cimport->invoicenum = $request->input("invoicenum");
      $cimport->totalamount = $request->input("totalamount");
      $cimport->user_id = $request->input("user_id");
      $cimport->supplier_id = $request->input("supplier_id");

			$cimport->save();

			// $tempcomputers =  DB::table('tempcomputerstocks')->select('color_id', 'qty', 'cost', 'amount')->get();

			$comptemps = Tempcomputerstock::all();

			foreach($comptemps as $comptemp){
				$tempqty = 0;
				$color = Color::find($comptemp->color_id);
				
				$computer = Computer::find($comptemp->computer_id);
				$tempqty = $comptemp->qty + $computer->qtyinstock;	
				$computer->qtyinstock = $tempqty;
				$computer->update();

				$cimport->computerdetails()->save($computer,['color_id' => $comptemp->color_id, 'qty' => $comptemp->qty, 'cost' => $comptemp->cost, 'amount' => $comptemp->qty * $comptemp->cost]);
				
				foreach($comptemp->serialtemps as $serial){
						$computer->colors()->save($color, ['serialnumber' => $serial->serialnumber, 'quantity' => 1, 'cost' => $comptemp->cost, 'status' => 'available']);
				}

			}

			
			DB::statement("SET foreign_key_checks=0");
			DB::table('serial_temps')->truncate();
			Tempcomputerstock::truncate();
			DB::statement("SET foreign_key_checks=1");
			
			return redirect()->back();
		}
		// dd($input);
		

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
