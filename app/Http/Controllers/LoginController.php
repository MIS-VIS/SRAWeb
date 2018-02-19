<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;


class LoginController extends Controller{



    protected $user;




    public function __construct(User $user){

        $this->user = $user;

    }





    public function index(){

    	return view('guest.login');

    } 






    public function post(LoginRequest $request){

    	if(Auth::attempt($request->except('_token'))) {

        if(Auth::user()->is_active == true){

          if(Auth::user()->is_logged == true){

            Auth::logout();
            Session::flash('SESSION_AUTH_MULTI_LOG', 'Your account is log-in to another device!!');
            return redirect('/')->withInput();

          }

          $user = $this->user->find(Auth::user()->id);
          $user->is_logged = true;
          $user->save();

    	  }

        Session::flash('SESSION_AUTH_UNACTIVATED', 'Your account is not activated!!');
        return redirect('/')->withInput();

      }

      Session::flash('SESSION_AUTH_UNMATCH', 'Invalid username or password!!');
      return redirect('/')->withInput();

    }





    public function logout(Request $request) {

      if($request->isMethod('POST')){

        if(Auth::check()){

          $user = $this->user->find(Auth::user()->id);
          $user->is_logged = false;
          $user->save();
          Auth::logout();
          Session::flush();
          return redirect('/');

        }

      }
        
      return abort(403);

    }





}
