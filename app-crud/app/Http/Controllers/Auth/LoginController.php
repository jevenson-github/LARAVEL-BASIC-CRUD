<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    

    // recalibrate the login process and page redirection 
    public function login(Request $request){
        
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email', 
            'password' => 'required|min:8'
        ]); 


        if(Auth()->attempt( array('email' => $input['email'], 'password' => $input['password']) )){

                if(Auth()->user()->is_admin == 1 ){
                    return redirect()->route('admin.home'); 
                }else { 
                    return redirect()->route('home'); 
                }
        }else {

             // Authentication failed
        return redirect()->back()->withErrors([ 
            'email' => 'Email does not match on our records.', 
            'password' => 'Password does not match on our records.', 
    
        ])->withInput($request->only('email'));



            // return redirect()->route('login')->with('error','Input proper data');
        }
        
    }
}
