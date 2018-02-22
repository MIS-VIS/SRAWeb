<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User as user;
use App\Departments as department;

class SampleController extends Controller{ 
    


  public function test(){

    return view('sample');

  }



}
