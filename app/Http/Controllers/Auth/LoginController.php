<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

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

/**
 * Show the application's login form.
 *
 * @return \Illuminate\Http\Response
 */
public function showLoginForm()
{
    // Get URLs
    $urlPrevious = url()->previous();
    $urlBase = url()->to('/');

    // Set the previous url that we came from to redirect to after successful login but only if is internal
    if(($urlPrevious != $urlBase . '/login') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase)) {
        session()->put('url.intended', $urlPrevious);
    }

    return view('auth.login');
}


    //protected $redirectTo = URL::previous();
    //RouteServiceProvider::HOME;
    /*public function redirectTo()
    {
        return Session::get('backUrl') ? Session::get('backUrl') :   $this->redirectTo;
    }*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //$this->redirectTo = url()->previous();
    }
}