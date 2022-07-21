<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{

    public function store()
    {
        $validator = Validator::make(
            request()->only(['post_id', 'parent_id', 'text']),
            [
                'post_id' => ['required', 'exists:posts,id'],
                'parent_id' => ['required', 'integer'],
                'text' => ['required', 'min:3', 'max:255'],
            ]
        );
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        Comment::create(
            [
                'post_id' => request()->post_id,
                'parent_id' => request()->parent_id,
                'text' => request()->text,
                'user_id' => Auth::user()->id,
            ]
        );

        $post = Post::find(request()->post_id);

        return redirect()->to(route('post-show', [$post->category->name, $post->slug]).'#commentsAnchor');

    }

}
