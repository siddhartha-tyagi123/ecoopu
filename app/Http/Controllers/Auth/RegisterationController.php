<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Hash;

class RegisterationController extends Controller
{
    public function index()
    {
        return view('front.auth.register');
    }
    public function userRegisteration(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required|email|unique:users',
            'phone'         =>  'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password'      => 'required|min:8',
            'confPassword'  => 'required|same:password'
        ]);
        $data = $request->all();
        $user = $this->createUser($data);
        event(new Registered($user));
        return redirect()->route('plan.index')->with('success', 'User Created');
        // if ($request->exists('isAdmin')) {
        //     $user->markEmailAsVerified();
        //     return redirect()->back()->with('success', 'User Created');
        // } else {
        //     return redirect('email/verify')->with('success', 'Verification link sent');
        // }
    }
    public function shopOwnerRegisteration(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'email'         =>  'required|email|unique:users',
            'phone'         =>  'required|unique:users|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password'      =>  'required|min:8',
            'confPassword'  =>  'required|same:password',
            'country'       =>  'required',
            'city'          =>  'required',
            'state'         =>  'required',
            'zipcode'       =>  'required',
            'address_1'     =>  'required',
            'tin'           =>  'required'
        ]);
        $data = $request->all();
        $user = $this->createShopOwner($data);
        event(new Registered($user));
        // return redirect('email/verify')->with('success', 'We have sent a verification link to your email address');
        return redirect()->route('plan.index')->with('success', 'Please proceed to the payment page.');
    }
    public function createUser(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],
            'password'  => Hash::make($data['password']),
            'role'      => $data['role']
        ]);
    }

    public function createShopOwner(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],
            'password'  => Hash::make($data['password']),
            'role'      => $data['role'],
            'country'   => $data['country'],
            'city'      => $data['city'],
            'state'     => $data['state'],
            'zipcode'   => $data['zipcode'],
            'address'   => $data['address_1'],
            'tin'       => $data['tin']
        ]);
    }
}
