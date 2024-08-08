<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopOwnerController extends Controller
{
    public function index()
    {
        return view('shopOwner.dashboard');
    }
}
