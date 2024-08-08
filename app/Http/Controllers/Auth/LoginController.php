<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $2y$10$NdsJRKRLMJPiF10UIVV60OeFKJFmWEcDWt2rDn9ureRNlF4ZtWNHa
    }
    public function index()
    {
        return view('admin.auth.login');
    }
    public function showUserLogin()
    {
        return view('front.auth.login');
    }
    public function processLogin(Request $request)
    {
        $request->validate(
            array(
                'email'    => 'required',
                'password' => 'required',
            )
        );
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Session::put('uid', auth()->user()->id);
            Session::put('email', auth()->user()->email);
            if (auth()->user()->role == 1) {
                return redirect()->route('dashboard')->with('success', 'Logged in successfully');
            } elseif (auth()->user()->role == 3) {
                return redirect('home')->with('success', 'Logged in successfully');
            } elseif(auth()->user()->role == 2) {
                // dd('shop');
                return redirect()->route('plan.index')->with('success', 'Logged in successfully');
            }
        } else {
            return redirect('login')->withSuccess('Invalid Credentials');
        }
    }
    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
