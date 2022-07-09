<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

class PostController extends Controller
{


    public function home()
    {
        return view("home", [

        ]);
    }

    public function index($category)
    {
        $category = Category::where('name', $category)->firstOrFail();

        $posts = Post::where('category_id', $category->id)->paginate(1);

        return view("category", [
            'category' => $category->name,
            'posts' => $posts
        ]);
    }

    public function show($category, $slug)
    {
        $category = Category::where('name', $category)->firstOrFail();

        $post = Post::where('category_id', $category->id)->where('slug', $slug)->firstOrFail();

        return view("post", [
            'post' => $post
        ]);
    }
}
