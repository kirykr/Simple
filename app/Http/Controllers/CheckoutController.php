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
        $locations = Location::lists('locname','id')->all();
        $khans = District::lists('disname','id')->all();
        $buses = Bus::lists('bcname','id')->all();
        return view('checkout',compact('cart','computers','colors','locations','khans','buses'));
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
        dd(Input::all());
        $taxi = new Taxi();
        $cinv = new Cinvoice();
        $indate = Carbon::now();
        $khan = new District();
        $cinv->indate=$indate;
        $cinv->tamount = $request->input('total_amount');
        $cinv->discount=0;
        $cinv->shipamount=$request->input('shipamount');
        $cinv->subtoal=$request->input('grand_total');
        $cinv->tel=$request->input('telephone');
        if($request->input('locations')==1){
          $cinv->location_id=$request->input('locations');
          $cinv->address;
          $khan->find($request->input('khan'));
        }
        else{

        }
        
        $cinv->pm_id=1;
        $cinv->customer_id=Auth::useer()->id;
        $cinv->statuspaid=1;
        $cinv->statusship=0;

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
        // dd($indate);
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
