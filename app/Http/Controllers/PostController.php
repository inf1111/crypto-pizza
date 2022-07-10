<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Spatie\Searchable\Search;

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
            'category' => $category,
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

    public function search()
    {

        if (request()->has("q") && request()->q != "") {
            $results = (new Search())
                ->registerModel(Post::class, 'title', 'text')
                ->search(request()->q);
        }
        else {
            $results = collect([]);
        }

        return view("search", [
            'results' => $results
        ]);
    }

}
