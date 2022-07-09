<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /* экшен для AJAX-запросов из всех форм подписки на новости*/
    public function create()
    {
        $validator = Validator::make(request()->only(['email']), [
            'email' => ["unique:subscribers,email", 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/Uis'],
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "error"]);
        }

        Subscriber::create(
            [
                'email' => request()->email
            ]
        );

        return response()->json(["status" => "ok"]);
    }
}
