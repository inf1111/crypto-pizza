<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{

    // это страница с формой ввода только имейла, которая открывается по ссылке "забыли пассворд?" мне она не нужна т.к. у меня это окно
    /*public function getEmail()
    {
        return view('customauth.passwords.email');
    }*/

    // это экшен для формы выше, надо его переделать для аякс запроса.
    public function postEmail(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users',
            ]
        );

        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send(
            'mail.forgot-password',
            ['token' => $token],
            function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password Notification');
            }
        );

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
