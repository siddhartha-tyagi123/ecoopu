<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;

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

    // public function subscription(Request $request)
    // {
    //     // dd($request->all());
        
    //     $stripe = new \Stripe\StripeClient('sk_test_51Pla0WAt9K91cNqZzfFpkUVgBOqwTnOJoob6DIB7RJ9AqYNuxhH4jEz7ucglHPmFNcbJJ3piX1tBuVp8tTarbAl500nSUYiYvU');
        
    //     // Create a customer
    //     $customer = $stripe->customers->create([
    //         'name' => $request->user()->name,
    //         'address' => [
    //             'line1' => '510 Alipur',
    //             'postal_code' => '251306',
    //             'city' => 'Mxn',
    //             'state' => 'Up',
    //             'country' => 'India',
    //         ],
    //         'payment_method' => $request->token, 
    //         'invoice_settings' => [
    //             'default_payment_method' => $request->token 
    //         ]
    //     ]);
        
    //     $stripe->paymentMethods->attach(
    //         $request->token,
    //         ['customer' => $customer->id]
    //     );
        
    //     $customerId = $customer->id;
        
    //     $plan = Plan::find($request->plan);
    //     $user = User::find(auth()->user()->id);
    //     $user->plan_id = $plan->id;
    //     $user->plan_status = "active";
    //     $user->save();
        
        
    //     $response = $stripe->subscriptions->create([
    //         'customer' => $customerId,
    //         'items' => [['price' => $plan->stripe_plan]],
    //     ]);
     
    //     return view("subscription_success");
    // }

    public function subscription(Request $request)
{
 
    $stripe = new \Stripe\StripeClient('sk_test_51Pla0WAt9K91cNqZzfFpkUVgBOqwTnOJoob6DIB7RJ9AqYNuxhH4jEz7ucglHPmFNcbJJ3piX1tBuVp8tTarbAl500nSUYiYvU');
    
 
    $customer = $stripe->customers->create([
        'name' => $request->user()->name,
        'address' => [
            'line1' => '510 Alipur',
            'postal_code' => '251306',
            'city' => 'Mxn',
            'state' => 'Up',
            'country' => 'India',
        ],
        'payment_method' => $request->token, 
        'invoice_settings' => [
            'default_payment_method' => $request->token 
        ]
    ]);

  
    $stripe->paymentMethods->attach(
        $request->token,
        ['customer' => $customer->id]
    );
    
 
    $plan = Plan::find($request->plan);
    $user = User::find(auth()->user()->id);
    $user->plan_id = $plan->id;
    $user->plan_status = "active";
    $user->save();
    
  
    $subscription = $stripe->subscriptions->create([
        'customer' => $customer->id,
        'items' => [['price' => $plan->stripe_plan]],
        'expand' => ['latest_invoice.payment_intent'],
    ]);
    // capture payment
      $response = $subscription->latest_invoice->payment_intent;
    
      $paymentInfo = new Subscription();
      $paymentInfo->user_id = $user->id;
      $paymentInfo->stripe_id = $paymentInfo->id;
      $paymentInfo->stripe_status = $paymentInfo->status;
      $paymentInfo->save();

      
        
    return view("subscription_success");

}

}
