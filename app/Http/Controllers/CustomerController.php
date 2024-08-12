<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderList;
use App\Models\Plan;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }

    public function orderList()
    {
         $orderList = OrderList::all();
         $orderCount = $orderList->count();
         $planOrderList = Plan::with('orderlists')->get();
       
        return view('customer.order_list',compact('orderList','planOrderList','orderCount'));
    }

  

 




}
