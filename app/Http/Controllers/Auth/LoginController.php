<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;
        protected function redirectTo(){
            if(Auth()->user()->status=='dosen'){
                return route('indexDosen');
            }

            elseif(Auth()->user()->status=='mahasiswa'){
                return route('indexMhs');
            }

            elseif(Auth()->user()->status=='staff'){
                return route('indexStaff');
            }
        }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))){
            if(auth()->user()->status=='dosen'){
                return redirect()->route('indexDosen');
            }

            elseif(auth()->user()->status=='mahasiswa'){
                return redirect()->route('indexMhs');
            }
            elseif(auth()->user()->status=='staff'){
                return redirect()->route('indexStaff');
            }
        }else{
            return redirect()->route('login')->with('error', 'email adn password are wrong');
        }
    }
}
