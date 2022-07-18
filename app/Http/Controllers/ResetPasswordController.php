<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class ResetPasswordController extends Controller
{

    // это форма ввода имейла, нового пароля, и его подтверждения, ее нет среди вспл. окон, надо сделать
    // здесь токен на валидность не проверяем, показываем форму даже если токен левый, но этот токен засовывыаем в хидден поле формы
    public function newPasswordForm($token)
    {
        return view('set-new-pass-exp', ['token' => $token]);
    }

    // сюда идут данные из формы выше, можено не аяком, при условии что форма выше не всплывающая
    public function newPasswordSet(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
                'token' => 'required',
            ]
        );

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        Auth::login($user);

        // можно прям в профиль индекс швырнуть и показать вверху это зеленое сообщение, оно там есть в верстке
        return redirect()->route("profile-index")->with('new_password_set', true);
    }
}
