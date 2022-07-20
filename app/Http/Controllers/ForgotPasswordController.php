<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * Методы для форм, которые идут до отправки письма о смене пароля
 */
class ForgotPasswordController extends Controller
{

    public function postEmail(Request $request)
    {
        $validator = Validator::make(
            request()->only(['email']),
            [
                'email' => 'required|email|exists:users',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                [
                    "status" => "error",
                    "error_msg" => "Данного имейла нет в базе",
                ]
            );
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send(
            'mail.forgot-password',
            [
                'token' => $token,
                'email' => $request->email
            ],
            function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Reset Password Notification');
            }
        );

        return response()->json([
            "status" => "ok"
        ]);
    }
}
