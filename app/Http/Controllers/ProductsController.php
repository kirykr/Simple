<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Computer;
use App\Other;
use App\Cart;

class ProductsController extends Controller
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

    return view('product', compact('cart'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $com = new Computer();
        // $cart = count(Cart::where('customer_id','=',Auth::user()->id)->get());
        // dd($cart);
        // $others = Other::orderBy('id', 'desc')->paginate(12);
        // $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->get();
            // return $computers->all();
        $cart = new Cart();
        $computer=null;
        $colors=null;
      if(substr($id, 0, 1) == 'c')
      {
        $computer = Computer::findOrFail($id);
        // $colors = $computer->colors()->list('name','id');
        $colors=$computer->colors()->groupby('color_id')->distinct()->get();
      }
      else
      {
        $computer = Other::findOrFail($id);
        $colors = $computer->colors()->groupby('color_id')->distinct()->get();
      }
        // return $computer->all();
      return view('product', compact('computer','colors','cart'));
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
