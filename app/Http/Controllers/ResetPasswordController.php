<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Validation\ValidationException;


/**
 * Методы для письма о смене пароля
 */
class ResetPasswordController extends Controller
{
    // форма ввода имейла, нового пароля, и его подтверждения, сделана без вспл. окон
    // здесь токен на валидность не проверяется, даже если токен неверный форма показывается, и этот токен передается в ее хидден поле
    public function newPasswordForm($token)
    {
        return view('set-new-pass', ['token' => $token]);
    }

    // сюда идут данные из формы выше, не аяксом
    public function newPasswordSet(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:3|max:10|confirmed',
                'password_confirmation' => 'required',
                'token' => 'required',
            ]
        );

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if (!$updatePassword) {
            throw ValidationException::withMessages(['email' => "Токен не соответствует имейлу"]);
        }

        $user = User::where('email', $request->email)->first();

        $user->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        Auth::login($user);

        return redirect()->route("profile-index")->with('new_password_set', true);
    }
}
