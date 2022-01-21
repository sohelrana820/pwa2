<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $authUser = auth()->user();

        if ($authUser->active_status == 1 && $authUser->is_visible == 1) {
            return view('pages.dashboard');
        }

        Session::flash('error', 'You\'re temporary blocked!');

        // Session will be destroyed
        Auth::logout();

        // Redirect to login
        return redirect()->route('login');
    }
}
