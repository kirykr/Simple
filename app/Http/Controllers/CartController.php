<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Cart;
use App\Color;
use App\Computer;
use App\Other;
use Auth;
use Redirect;

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

        // $content = Cart::instance(Auth::user()->id)->content();
        $cart = new Cart();
        $computers = new Computer();
        $colors = new Color();
        $others = new Other();
        return view('shoppingCart', compact('cart','computers','others','colors'));
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
        if(Input::get('col_id')==null)
        {
            return Redirect::back()->withErrors(['Please Make sure you choose item color before add to cart!!', 'The Message']);
        }
        else{ 
            $computer_id=$request->input('computer_id');
            $computer=null;
            $carts = Cart::where('customer_id','=',Auth::user()->id)->where('pro_id','=',$computer_id)->where('color_id','=',$request->input('col_id'))->get();
            $checkqtycart =Cart::where('pro_id','=',$computer_id)->where('color_id','=',$request->input('col_id'))->get();
            if(substr($computer_id, 0, 1) == 'c')
            {
                $computer = Computer::findOrFail($computer_id);
            }else{
                 $computer = Other::findOrFail($computer_id);
            }
            $colors = count($computer->colors()->where('color_id','=',$request->input('col_id'))->get());
            if($checkqtycart->sum('qty')<$colors)
            {
            if(count($carts)>0)
              {   
                // dd($checkqtycart[0]->qty);
                // if($carts[0]->qty<$request->input('qtycolorinstock'))
                $old_qty=$carts[0]->qty;
                $old_qty+=$request->input('quantity');
                $carts[0]->qty=$old_qty;
                $carts[0]->amount=$old_qty * $request->input('price');
                $carts[0]->save();
                // else{
                //     $qis=$request->input('qtycolorinstock');
                //     return Redirect::back()->withErrors(["Quantiy in stock is $qis, Please Check Your Cart!!", 'The Message']);
                // }
                
              }
            else
              {
              if($request->input('pro_type')=="App\Computer")
              {
                $cart = new Cart();
                $color_id=$request->input('col_id');
                $computer = Computer::find($computer_id);
                $cart->pro_id=$computer_id;
                $cart->qty=$request->input('quantity');
                $cart->price = $request->input('price');
                $cart->shipprice= 0;
                $cart->discount=0;
                $cart->amount = $cart->qty * $cart->price;
                $cart->customer_id= Auth::user()->id;
                $cart->color_id = $color_id;
                $cart->pro_type=$request->input('pro_type');
                $cart->save();
                
              }
              else
              {
                $cart = new Cart();
                $color_id=$request->input('col_id');
                $computer = Other::find($computer_id);
                $cart->pro_id=$computer_id;
                $cart->qty=$request->input('quantity');
                $cart->price = $request->input('price');
                $cart->shipprice= 0;
                $cart->discount=0;
                $cart->amount = $cart->qty * $cart->price;
                $cart->color_id = $color_id;
                $cart->customer_id= Auth::user()->id;
                $cart->pro_type=$request->input('pro_type');
                // dd($cart);
                $cart->save();
              }
            }
          }
          else
          {
                return Redirect::back()->withErrors(["This Color of Product is OUT OF STOCK (Meaning YOU OR SOMEONE already has the last remain item in your/their CART.)!!", 'The Message']);
          }
        return Redirect::back();
        }
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
        // Cart::instance(Auth::user()->id)->update($rowId, $qty);     
        // dd(Input::all());
        $computer_id=$request->input('proid');
        $checkqtycart =Cart::where('pro_id','=',$computer_id)->where('color_id','=',$request->input('colid'))->get();
        $computer = Computer::find($computer_id);
        $colors = count($computer->colors()->where('color_id','=',$request->input('colid'))->get());
        if($checkqtycart->sum('qty')<$colors){
          $qty = $request['qty'];
          $cart = Cart::find($rowId);
          $cart->find($rowId);
          $cart->qty = $qty;
          $cart->save();
          return redirect('/carts');
        }else{
          return Redirect::back()->withErrors(["This Color of Product is OUT OF STOCK (Meaning YOU OR SOMEONE already has the last remain item in your/their CART.)!!", 'The Message']);
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        // dd($rowId);
        $cart = Cart::find($rowId);
        $cart->delete();
        return redirect('carts');
    }
}
