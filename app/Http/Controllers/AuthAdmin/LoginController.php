<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'logoutAdmin']);
    }

    public function logoutAdmin()
    {
        Auth::guard('web')->logout();
        return redirect()->route('admin.login');
    }

    public function showLoginForm()
    {
        return view('auth/loginTemplate');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
           'email' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credential)){
            return redirect()->intended(route('dashboard.index'));
        }
        return redirect()->back()->withInput($request->only('email'))->with('error', 'Masukkan email dan password yang benar');
    }


}
