<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{

    public function index()
    {
        return view("profile-index", [
            //"eduTopPosts" => $eduTopPosts
        ]);
    }

    public function commentsIndex()
    {
        $comments = Comment::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);

        return view("profile-comments", [
            "comments" => $comments
        ]);
    }

    public function bookmarksIndex()
    {
        $bookmarkedPosts = Auth::user()->bookmarkedPosts;

        return view("profile-bookmarks", [
            "bookmarkedPosts" => $bookmarkedPosts
        ]);
    }

    public function updateProfile()
    {
        //dd(request()->all());

        $validator = Validator::make(
            request()->all(),
            [
                'name' => 'nullable|min:2|max:30',
                'pass' => 'nullable|min:3|max:10|confirmed',
                'avatar' => 'nullable|mimes:jpeg,jpg,png,bmp,gif,svg,webp|dimensions:min_width=70,min_height=70',
            ],
            [
                'pass.confirmed' => 'Пароли должны совпадать.'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if (request()->hasFile("avatar")) {
            Image::make(request()->file('avatar'))->fit(70, 70)->save("avatars/" . $user->id . ".jpg");
            $user->avatar = "avatars/" . $user->id . ".jpg";
        }

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
