<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Oimport;
use App\Other;
use App\Color;
use App\Supplier;
use App\Tempother;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
		$others = Other::lists('name','id')->all();
		$suppliers = Supplier::lists('name','id')->all();
		$colors = Color::lists('name','id')->all();
		$tempothers = Tempother::all();
		return view('admin.oimports.create', compact('others','suppliers','colors','tempothers'));
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
		
		$oimport = null;
		if (Input::get('newsubmit')){
			$input = $request->all();
			// $oimport = Oimport::create($input);
		}
		if (Input::get('addsubmit') == 'addsubmit'){
			 $this->validate($request, [
			        'other_id' => 'required|max:22',
			        'qtyinstock' => 'required|numeric|min:1',
			        'color_id' => 'required|numeric|min:1',
			        'sellprice' => 'required|numeric|min:1',
			        'cost' => 'required|numeric|min:1',
			    ]);
			 // dd($input);
			
			$input['color_name'] =  DB::table('colors')->where('id', $request->input('color_id'))->value('name');
			$input['other_name'] =  DB::table('others')->where('id', $request->input('other_id'))->value('name');
			$input['qty'] = $request->input('qtyinstock');

			$tempother= Tempother::create($input);
			return redirect()->back();
		}
		// Import others
		if (Input::get('savesubmit') == 'savesubmit'){

			 $this->validate($request, [
			        'supplier_id' => 'required|max:22',
			        'invoicenumber' => 'required|max:22',
			    ]);
			 // dd($request->all());
			$oimport = new Oimport();

			$oimport->impdate = Carbon::now();
      $oimport->impindate = Carbon::now();
      $oimport->invoicenumber = $request->input("invoicenumber");
      $oimport->totalamount = $request->input("totalamount");
      $oimport->user_id = $request->input("user_id");
      $oimport->supplier_id = $request->input("supplier_id");

			$oimport->save();

			$tempothers = Tempother::all();
			// dd($tempothers);

			foreach($tempothers as $tempother){
				$tempqty = 0;

				$color = Color::find($tempother->color_id);
				$other = Other::find($tempother->other_id);
				
				$tempqty = $tempother->qty + $other->qtyinstock;	
				if ($other->sellprice != $tempother->sellprice) {
					$other->sellprice = $tempother->sellprice;
				}
				$other->qtyinstock = $tempqty;
				$other->update();

				$oimport->otherdetails()->save($other,['color_id' => $tempother->color_id, 'qty' => $tempother->qty, 'cost' => $tempother->cost, 'amount' => $tempother->qty * $tempother->cost]);
				
				// foreach($tempother->serialtemps as $serial){
				$other->colors()->save($color, ['oimport_id' => $oimport->id, 'qty' => 1, 'cost' => $tempother->cost, 'amount' => $tempother->qty * $tempother->cost]);
				// }
				$oldsellprice = DB::table('color_other')->select('sellprice')->where([['other_id','=', $other->id],['color_id','=',$tempother->color_id]])->first();
				if($oldsellprice->sellprice != $tempother->sellprice){
					DB::table('color_other')->where([['other_id','=', $other->id],['color_id','=',$tempother->color_id]])->update(['sellprice' => $tempother->sellprice]);
				}
			}

			DB::statement("SET foreign_key_checks=0");
			Tempother::truncate();
			DB::statement("SET foreign_key_checks=1");
			return redirect()->back()->with('message', 'Item imported successfully.');
		}
		// dd($input);
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
