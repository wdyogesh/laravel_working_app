<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Partner;
use App\Host;
use App\Student;

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

        
    protected function redirectTo()
    {
        session(['user_id' => Auth::user()->id]);
        session(['user_role' => Auth::user()->roles()->first()->category]);
        session(['current_user_id' => Auth::user()->id]);
        if (Auth::user()->isAdmin()) {// do your margic here

            //$this->redirectTo = '/admin'
            //$admin = Admin::where('user_id', Auth::user()->id)->first();
            //session(['admin' => $admin->id]);
            return '/admin';

        }elseif(Auth::user()->isHost()) {
            //$host = Host::where('user_id', Auth::user()->id)->first();
            //session(['current_user_id' => Auth::user()->id]);
            return '/host';

        }elseif(Auth::user()->isStudent()) {
            //$student = Student::where('user_id', Auth::user()->id)->first();
            //session(['current_user_id' => Auth::user()->id]);
            return '/student';

        }elseif(Auth::user()->isPartner()) {
            //$partner = Partner::where('user_id', Auth::user()->id)->first();
            //session(['current_user_id' => Auth::user()->id]);
            return '/partner';
        }

        return '/';
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
