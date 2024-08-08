<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Country;

class UserController extends Controller
{
    public function index()
    {
        // $countries = Country::all();
        return view('front.home');
    }
}
