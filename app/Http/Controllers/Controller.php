<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


use App\User;
use App\Role;
use Hash;
use Alert;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
    protected $collection1;


    function __construct()
    {

         if (Auth::check()){
                     $array = [];
                      foreach(Auth::user()->roles as $rname ){
                          foreach($rname->modules as $mo){
                            $test= $mo->nav;
                            $array[]=array_add(['name' => 'ko'], 'module',$test);
                          }
                      }
                      //$result = array_unique($array);
                      //echo $rol;

                      $collection = collect($array);
                      $collection1 = $collection->unique('module');
                      foreach ($collection1 as $item) {
                          //echo $item['module'];
                      }
                      View::share('collection1', $collection1);
                  }else{
                    
                  }
          }



}
