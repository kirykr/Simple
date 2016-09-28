<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \Cart as Cart;
use App\Computer;
use App\Other;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $content = Cart::instance(Auth::user()->id)->content();

        return view('shoppingCart', compact('content'));
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
        // return $request->all();
        $items = $request->all();
        // dd(substr($request->input('id'), 0, 1));
        if(substr($items['id'], 0, 1) == 'c')
          $computer = Computer::findOrFail($items['id']);
        else
          $computer = Other::findOrFail($items['id']);

        $qty = $items['qty'];
        $image = $request['image'];
        // $options = $items['options'];
        $options = [0 => 'Gold', 1 => 'Gray'];
        
        Cart::instance(Auth::user()->id)->add(['id' => $computer->id, 'image' =>  $image, 'name' => $computer->name, 'qty' => $qty, 'price' => $computer->sellprice, 'options' => $options ]);
       // $carts = Cart::content(); 
       // dd($carts);
        return redirect()->back();
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
    public function update(Request $request, $rowId)
    {
        
        $qty = $request['qty'];
        Cart::instance(Auth::user()->id)->update($rowId, $qty);
        return redirect('/carts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        
        Cart::instance(Auth::user()->id)->remove($rowId);
        return redirect('carts');
    }
}
