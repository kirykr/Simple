<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Computer;
use App\Other;
use DB;

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
        $table1 = DB::table('computers')->select('id','name','qtyinstock','sellprice','ppprice','provprice','created_at','updated_at');
         $computers = DB::table('others')->select('id','name','qtyinstock','sellprice','ppprice','provprice','created_at','updated_at')->union($table1)->get();
        return view('welcome', compact('computers'));
        // return view('home');
    }

     public function show()
    {
       
        return view('/');
    }
}
