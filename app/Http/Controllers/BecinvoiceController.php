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
use App\Cimport;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
	

class BecinvoiceController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$invoices = Bcinvoice::orderBy('id', 'desc')->paginate(10);
		$computers = Computer::lists('name','id')->all();
		return view('admin.bcinvoices.index', compact('invoices','computers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$computers = Computer::lists('name','id')->all();
		$others = Other::lists('name','id')->all();
		$colors = Color::lists('name','id')->all();
		$tmpdetails=Tmpdetail::all();
		return view('admin.bcinvoices.create',compact('computers','others','tmpdetails','colors'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		if (Input::get('btn_adddetail'))
		{	
			$chars = $request->input("serial_id");
			$char = explode(",",$chars);
			$tp = Tmpdetail::all();
			 $this->validate($request, [
			        'qty' => 'required',
			        'color_id' => 'required',
			        'description'=>'required',
			    ]);
			$tmpdetail = new Tmpdetail();
			if($request->input("pro_type")=="App\\Computer"){
				$this->validate($request,['computer_id' => 'required','serialnumber'=>'required']);
				foreach($tp as $id){
					if($id->pro_id==$request->input("computer_id")&& $id->color_id==$request->input("color_id")){
						$oqty=$id->qty;
						$desc = (string)$id->description;
						$amount = $id->amount;
						$serialid=(string)$chars;
						$oqty+=$request->input("qty");
						$desc= $desc.(string)$request->input("serialupdate");
						$amount +=$request->input("amount");
						$id->qty=$oqty;
						$id->description=$desc;
						$id->amount=$amount;
						$id->serial_id.=",".(string)$serialid;
						// dd($id->serial_id);
						$id->save();

						for($i=0;$i<count($char);$i++)
						{
							DB::table('color_computer')->where('id',$char[$i])->update(['status'=>'unavailable']);
						}
						return redirect()->route('admin.bcinvoices.create')->with('message', 'Item Update successfully.');
					}
				}
				$tmpdetail->pro_id= $request->input("computer_id");
				

			}else{
				$this->validate($request,['other_id'=>'required']);
				foreach($tp as $id){
					if($id->pro_id==$request->input("other_id") && $id->color_id==$request->input("color_id")){
						$oqty=$id->qty;
						$oqty+=$request->input("qty");
						$amount = $id->amount;
						$amount +=$request->input("amount");
						$id->qty=$oqty;
						$id->amount=$amount;
						$id->save();
						return redirect()->route('admin.bcinvoices.create')->with('message', 'Item Update successfully.');
					}
				}
				$tmpdetail->pro_id= $request->input("other_id");
			}
			
			$tmpdetail->description= $request->input("description");
			$tmpdetail->qty= $request->input("qty");
			$tmpdetail->price= $request->input("sellPrice");
			$tmpdetail->amount=$request->input("amount");
			$tmpdetail->pro_type=$request->input("pro_type"); 
			$tmpdetail->color_id=$request->input("color_id");
			$tmpdetail->serial_id=$request->input("serial_id");
			$tmpdetail->save();
			for($i=0; $i < count($char);$i++)
			{	
				DB::table('color_computer')->where('id',$char[$i])->update(['status'=>'unavailable']);
			}
			return redirect()->route('admin.bcinvoices.create')->with('message', 'Item Add successfully.');
		}else if(Input::get('btn_pay')){

			$bcinvoice = new Bcinvoice();
			$bcinvoice->indate = $request->input("indate");
	        $bcinvoice->tamount = $request->input("total");
	        $bcinvoice->discount = $request->input("discount")/100;
	        $bcinvoice->subtotal = $request->input("subtotal");
	        $bcinvoice->user_id = Auth::user()->id;
			$bcinvoice->save();
			$bcinvoice->indate=$bcinvoice->created_at;
			$bcinvoice->save();
			$tmpinvs = Tmpdetail::all();
			foreach($tmpinvs as $tmpinv){
				$bcinvdetail = new Bcinvoicedetail();
				if($tmpinv->pro_type=="App\\Computer"){
					$computer = Computer::find($tmpinv->pro_id);
					$serialnumbers = $computer->colors()->where([['color_id','=',$tmpinv->color_id],['status','=','unavailable']])->get();
					$serialnumber = $serialnumbers[0]->pivot->serialnumber;
					DB::table('color_computer')->where('serialnumber','=',$serialnumber)->delete();
					$computer = Computer::find($tmpinv->pro_id);
					$newqty = $computer->qtyinstock-$tmpinv->qty;
					$computer->qtyinstock=$newqty;
					$computer->save();
				}else{
					$other = Other::find($tmpinv->pro_id);
					$newqty = $other->qtyinstock-$tmpinv->qty;
					$other->qtyinstock=$newqty;
					$other->save();
				}
				$bcinvdetail->bcinvoice_id=$bcinvoice->id;
				$bcinvdetail->pro_id=$tmpinv->pro_id;
				$bcinvdetail->description= $tmpinv->description;
				$bcinvdetail->qty=$tmpinv->qty;
				$bcinvdetail->price=$tmpinv->price;
				$bcinvdetail->amount=$tmpinv->amount;
				$bcinvdetail->pro_type=$tmpinv->pro_type;
				$bcinvdetail->color_id=$tmpinv->color_id;
				$bcinvdetail->save();
			}
			Tmpdetail::truncate();
			return Redirect::to('/admin/printinvoice/'.$bcinvoice->id);
		}else{
			$this->validate($request,['radio'=>'required']);
			// if($request->input("radio")!=""){
				$tmp = Tmpdetail::find($request->input("radio"));
	            $chars=(string)$tmp->serial_id;
	            $char = explode(",",$chars);
	            for($i=0;$i<count($char);$i++)
	            {
	                DB::table('color_computer')->where('id',$char[$i])->update(['status'=>'available']);
	            }
	            $tmp->delete();
	            return redirect()->route('admin.bcinvoices.create')->with('message', 'Item deleted successfully.');
			// }else{
			// 	return redirect()->back()->with('message', 'Please select row before delete.');
			// }
			
		}

			
			

		
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
