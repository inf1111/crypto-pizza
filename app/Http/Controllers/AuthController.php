<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        $validator = Validator::make(
            request()->only(['email', 'pass', 'passRepeat']),
            [
                'email' => ['required', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/Uis', 'max:255'],
                'pass' => 'required|min:3|max:10',
                'passRepeat' => 'required|min:3|max:10',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "error_msg" => "Validation error",
            ]);
        }

        if (request()->pass !== request()->passRepeat) {

            return response()->json([
                "status" => "error",
                "error_msg" => "You entered 2 different passwords",
            ]);

        }

        if (User::where('email', request()->email)->exists()) {

            return response()->json([
                "status" => "error",
                "error_msg" => "This email already exists",
            ]);

        }

        User::create([
            'email' => request()->email,
            'password' => Hash::make(request()->pass)
        ]);

        return response()->json([
            "status" => "ok"
        ]);
    }

    public function login()
    {
        $validator = Validator::make(
            request()->only(['email', 'pass']),
            [
                'email' => ['required', 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/Uis', 'max:255'],
                'pass' => 'required|min:3|max:10',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "status" => "error",
                "error_msg" => "Validation error",
            ]);
        }

        $existingUser = User::where('email', request()->email)->first();

        if (! $existingUser) {
            return response()->json([
                "status" => "error",
                "error_msg" => "E-mail doesn't exist",
            ]);
        }

        if (! Hash::check(request()->pass, $existingUser->password)) {
            return response()->json([
                "status" => "error",
                "error_msg" => "Wrong password",
            ]);
        }

        Auth::login($existingUser);

        return response()->json([
            "status" => "ok"
        ]);

    }

    public function logout()
    {
        Auth::guard('web')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->back();
    }

}
