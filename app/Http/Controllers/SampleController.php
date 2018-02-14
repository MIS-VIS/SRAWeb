<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User as user;
use App\Departments as department;

class SampleController extends Controller
{ 
    
    public function index(){
    	$test = gethostname();
    	return view('sample',compact('test'));
    } 


    public function register(){
      $user = new user;
      $user->user_id = '1001';
      $user->username = 'admin';
      $user->password = Hash::make('admin');
      $user->lastname = 'Langruto';
      $user->firstname = 'Bertram Jay';
      $user->middlename = 'Serva';
      $user->save();
    }

    public function list(){
       //$list = user::all();
       $list = array('a','b','c');
       return view('sample',compact('list'));
    }




}
