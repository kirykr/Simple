<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Computer;
use App\Other;

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
       $computers = Computer::orderBy('created_at', 'desc')->paginate(12);
        // $others = Other::orderBy('id', 'desc')->paginate(12);
        // $products = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.id')->get();
            // return $computers->all();
        return view('welcome', compact('computers'));
        // return view('home');
    }

     public function show()
    {
       
        return view('/');
    }
}
