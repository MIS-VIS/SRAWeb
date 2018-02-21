<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User as user;
use Session;

class SampleController extends Controller{ 
    


  public function test(){

    $test = session()->all();
    dd($test);

  }



}
