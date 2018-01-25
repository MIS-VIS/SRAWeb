<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\User as user;
use ViewHelper; 
use Session;
use Auth;


class LoginController extends Controller{


    public function index(){
    	return view('guest.login');
    } 



    public function post(LoginRequest $request){
    	if(Auth::attempt($request->except('_token'))) {
        if(Auth::user()->is_active == true){
          if(Auth::user()->is_logged == true){
            Auth::logout();
            Session::flash('multilog', 'Your account is log-in to another device!!');
            return redirect('/')->withInput();
          }
          $user = user::find(Auth::user()->id);
          $user->is_logged = true;
          $user->save();
    	  }
        Session::flash('unactivated', 'Your account is not activated!!');
        return redirect('/')->withInput();
      }
      Session::flash('unmatch', 'Invalid username or password!!');  
      return redirect('/')->withInput();
    }




    public function logout(Request $request) {
      if(Auth::check()){
        $user = user::find(Auth::user()->id);
        $user->is_logged = false;
        $user->save();
        Auth::logout();
        return redirect('/');
      }
      return redirect('/');
    }



}
