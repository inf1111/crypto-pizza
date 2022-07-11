<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function index()
    {
        return view("profile-index", [
            //"eduTopPosts" => $eduTopPosts
        ]);
    }

    public function updateProfile()
    {
        //dd(request()->all());

        $validator = Validator::make(
            request()->all(),
            [
                'name' => 'nullable|min:2|max:30',
                'pass' => 'nullable|min:3|max:10|confirmed'
            ],
            [
                'pass.confirmed' => 'Пароли должны совпадать.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if (request()->has("name") && !empty(request()->name)) {
            $user->name = request()->name;
        }

        if (request()->has("pass") && !empty(request()->pass)) {
            $user->password = Hash::make(request()->pass);
        }

        $user->save();

        if (request()->has("subscribed")) {

            if (! Auth::user()->subscribed) {
                Subscriber::create(['email' => Auth::user()->email]);
            }

        } else {
            Subscriber::where('email', Auth::user()->email)->delete();
        }

        return redirect()->back()->with('success', true);

    }

}
