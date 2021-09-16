<?php
//php artisan make:controller WelcomeController --resource --model=welcome
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //lets grab the users info to populate the form
        $userInfo=users::whereId($request->user()->id)->first();


        DB::table('users')
            ->where('id', $request->user()->id)
            ->update(['ipaddress' => \Request::ip()]);


        //remember were dumping _EVERYTHING_ including passwords, not sure how I feel about this :l
        return view('home', compact('userInfo'));
    }
}
