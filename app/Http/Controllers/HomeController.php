<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Computer;
use App\Cart;
use App\Other;
use DB;
use Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $computers = Product::orderBy('updated_at', 'desc')->paginate(12);
       $page = Input::get('page', 1);
        $paginate = 12;

         $table1 = DB::table('computers')->select('id','name','qtyinstock','sellprice','ppprice','provprice','created_at','updated_at');
         $afterunion = DB::table('others')->select('id','name','qtyinstock','sellprice','ppprice','provprice','created_at','updated_at')->union($table1)->get();
         
        $offSet = ($page * $paginate) - $paginate;
        $itemsForCurrentPage = array_slice($afterunion, $offSet, $paginate, true);
        $computers = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, count($afterunion), $paginate, $page); 

        $cart = new Cart();
        return view('welcome', compact('computers','cart'));
        // return view('home');
    }

     public function show()
    {
       
        return view('/');
    }
}
