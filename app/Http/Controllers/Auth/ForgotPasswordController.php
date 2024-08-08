<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use DB;
use Mail;
use Str;
use Session;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('front.auth.forgotPassword');
    }
    public function submitForgotPasswordForm (Request $request)
    {
        $request->validate(
            array(
                'email' => 'required|email|exists:users',
            )
        );
        $token = Str::random(64);
        $logo = asset('front/images/logo.png');
        DB::table('password_resets')->insert(
            array(
                'email'      => $request->email,
                'token'      => $token,
                'created_at' => Carbon::now(),
            )
        );
        Mail::send(
            'email.forgotPassword',
            array( 'token' => $token,'logo' => $logo ),
            function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password');
            }
        );
    //    return view('email.forgetPassword', array('token'=> $token)); 

        return back()->with('success', 'We have e-mailed your password reset link!');
    }
    public function showResetPasswordForm($token)
    {
        return view('email.forgotPasswordLink', array( 'token' => $token ));
    }

    public function submitResetPasswordForm(Request $request)
    {
        DB::enableQueryLog();
        $request->validate(
            array(
                'email'           => 'required|email|exists:users',
                'password'        => 'required|min:8|string',
                'confPassword'    => 'required|same:password',
            )
        );
        // dd($request);
        $updatePassword = DB::table('password_resets')->where([
            'email' => $request->email,
        ])->first();
        $query = DB::getQueryLog();
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        return redirect('login')->with('success', 'Your password has been changed!');
    }
}
