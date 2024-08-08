<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('payment',compact('plans'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(Plan $plan, Request $request)
    { 
        $intent = auth()->user()->createSetupIntent();
  
        return view("subscription", compact("plan", "intent"));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function subscription(Request $request)
    {
        // dd($request->all());
        
        $stripe = new \Stripe\StripeClient('sk_test_51PBuwNSHwu1CvbLUwixYwuzUBjL9SPyWv0uGpsluXVGCeN5z3TqlSknvuhUoDES2UGaH2T5bjvWZn8cwLcXTztEv00iJN8WSho');
        
        // Create a customer
        $customer = $stripe->customers->create([
            'name' => $request->user()->name,
            'address' => [
                'line1' => '510 Alipur',
                'postal_code' => '251306',
                'city' => 'Mxn',
                'state' => 'Up',
                'country' => 'India',
            ],
            'payment_method' => $request->token, // Attach payment method to the customer
            'invoice_settings' => [
                'default_payment_method' => $request->token // Set default payment method
            ]
        ]);
        
        // Attach the payment method to the customer
        $stripe->paymentMethods->attach(
            $request->token,
            ['customer' => $customer->id]
        );
        
        // Retrieve customer ID
        $customerId = $customer->id;
        
        // Retrieve plan
        $plan = Plan::find($request->plan);
        
        // Create subscription
        $response = $stripe->subscriptions->create([
            'customer' => $customerId,
            'items' => [['price' => $plan->stripe_plan]],
        ]);
     
        // Subscription success view
        return view("subscription_success");
    }
}
