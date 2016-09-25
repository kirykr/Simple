<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Computer;
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
        $computers = Computer::orderBy('id', 'desc')->paginate(12);
        // $items = Cart::content();
        // return $computers->all();
        return view('welcome', compact('computers'));
        // return view('home');
    }

     public function show()
    {
       
        return view('/');
    }
}
