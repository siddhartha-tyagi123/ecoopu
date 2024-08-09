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
         $planOrderList = Plan::with('orderlist')->get(); 

    foreach ($planOrderList as $planOrder) {

        $orderListCount = $planOrder->orderlist->count();
        dd($orderListCount); 
    }
        
         
        return view('customer.order_list',compact('orderList'));
    }
 




}
