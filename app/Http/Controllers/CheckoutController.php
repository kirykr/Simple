<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cart;
use App\Computer;
use App\Other;
use App\Color;
use App\Location;
use App\District;
use App\Bus;
use App\Account;
use App\Taxi;
use Carbon\Carbon;
use App\Cinvoice;
use App\Cinvoicedetail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use Redirect;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = new Cart();
        $computers = new Computer();
        $colors = new Color();
        $others= new Other();
        $locations = Location::lists('locname','id')->all();
        $khans = District::lists('disname','id')->all();
        $buses = Bus::whereNotIn('id',[3])->lists('bcname','id')->all();
        return view('checkout',compact('cart','computers','others','colors','locations','khans','buses'));
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
        //
        // dd(Input::all());
        $taxi = new Taxi();
        $cinv = new Cinvoice();
        $indate = Carbon::now();
        $khans = new District();
        $location = new Location();
        $acc = Account::where('account_id','=',$request->input('account_id'))->first();
        // dd(Input::all());
        // dd($acc->balance);
        $cinv->indate=$indate;
        $cinv->tamount = $request->input('total_amount');
        $cinv->discount=0;
        $cinv->shipamount=$request->input('shipamount');
        $cinv->subtotal=$request->input('grand_total');
        $cinv->tel=$request->input('telephone');
        $locate=$location->find($request->input('locations'));
        $cinv->location_id=$request->input('locations');
        $khan=$khans->find($request->input('khan'));
        // dd($locate->locname);
        // dd($khan->disname);
        // dd(Input::all());
        if($request->input('locations')==1){
            $cinv->shm_type=$request->input('shm_type');
            $cinv->shm_id=$request->input('bus_id');
            $cinv->address=$locate->locname.",".$khan->disname.",".$request->input('sangkat').','.$request->input('street').','.$request->input('housenumber')."Name:".$request->input('fname').' '.$request->input('lname').' Tel:'.$request->input('telephone');
            
        }
        else{
            $cinv->address=$locate->locname.",".$request->input('address').", Name:".$request->input('fname').' '.$request->input('lname').' Tel:'.$request->input('telephone');
            if($request->input('shm_type')=="App\\Taxi")
                {
                  $cinv->shm_type=$request->input('shm_type');
                  $taxi->taxiname=$request->input('taxiname');
                  $taxi->tel=$request->input('taxinum');
                  $taxi->save();
                  $cinv->shm_id=$taxi->id;
                }
                else
                {
                  $cinv->shm_type=$request->input('shm_type');
                  $cinv->shm_id=$request->input('bus_id');
                }
        }
        
        $cinv->pm_id=1;
        $cinv->customer_id=Auth::user()->id;
        $cinv->statuspaid=1;
        $cinv->statusship=0;
        $carts = Cart::where('customer_id','=',Auth::user()->id)->get();
        // dd($cinv);
        $cinv->save();
        foreach($carts as $cart){
            $cinvdetail= new Cinvoicedetail();
                if($cart->pro_type=="App\\Computer"){
                    $computer = Computer::find($cart->pro_id);
                    $serialnumbers = $computer->colors()->where([['color_id','=',$cart->color_id],['status','=','available']])->get();
                    for($i=0;$i<$cart->qty;$i++){
                        $serialnumber = $serialnumbers[$i]->pivot->serialnumber;
                        DB::table('color_computer')->where('serialnumber','=',$serialnumber)->delete();
                    }
                    
                    $computer = Computer::find($cart->pro_id);
                    $newqty = $computer->qtyinstock-$cart->qty;
                    $computer->qtyinstock=$newqty;
                    $computer->save();
                }else{
                    // dd("In");
                    $other = Other::find($cart->pro_id);
                    
                    $os = $other->colors()->where('other_id','=',$cart->pro_id)->where('color_id','=',$cart->color_id)->get();
                    // dd($os[0]->id);
                    for($i=0;$i<$cart->qty;$i++){
                        $o = $os[$i]->id;
                        DB::table('color_other')->where('id','=',$o)->delete();
                    }
                    $stock_id = $other->where('color');
                    $newqty = $other->qtyinstock-$cart->qty;
                    $other->qtyinstock=$newqty;
                    $other->save();
                }
            $cinvdetail->cinvoice_id=$cinv->id;
            $cinvdetail->pro_id=$cart->pro_id;
            $cinvdetail->qty=$cart->qty;
            $cinvdetail->price=$cart->price;
            $cinvdetail->amount=$cart->amount;
            $cinvdetail->pro_type=$cart->pro_type;
            $cinvdetail->color_id = $cart->color_id;
            $cinvdetail->save();
        }
            Cart::where('customer_id','=',Auth::user()->id)->delete();
            $acc->balance=$request->input('afterpaybalance');
            $acc->save();
            return Redirect::to('/');

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
    }
}
