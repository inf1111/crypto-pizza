<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Spatie\Searchable\Search;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{

    public function home()
    {
        $eduTopPosts = Post::where('category_id', 5)->orderBy('date_time', 'desc')->take(4)->get();

        return view("home", [
            "eduTopPosts" => $eduTopPosts
        ]);
    }

    public function index($category)
    {
        $category = Category::where('name', $category)->firstOrFail();

        $posts = Post::where('category_id', $category->id)->orderBy('date_time', 'desc')->paginate(1);

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

            $resultsNotPaginated = (new Search())
                ->registerModel(Post::class, 'title', 'text')
                ->search(request()->q);

            $resultsPaginated = $this->paginate($resultsNotPaginated);

            return view("search", [
                'results' => $resultsPaginated,
                'total' => $resultsNotPaginated->count(),
                'q' => request()->q
            ]);

        }
        else {

            return view("search", [
                'results' => [],
                'total' => 0
            ]);

        }

    }

    /* Пейджинация результатов поиска. Потребовалась, т.к. пакет spatie/laravel-searchable не предоставляет возможсность пейджинации результатов поиска */

    public function paginate($items, $perPage = 1, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $x = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        $x->withPath('search');
        return $x;
    }

}
