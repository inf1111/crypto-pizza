<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Category;
use App\LikeP;
use App\Post;
use App\View;
use App\YoutubeLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Searchable\Search;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostController extends Controller
{

    public function toggleLikePost()
    {
        $validator = Validator::make(
            request()->only(['post_id']),
            [
                'post_id' => ['required', 'integer'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back();
        }

        $existingLike = LikeP::where('user_id', Auth::user()->id)->where('post_id', request()->post_id)->first();

        if ($existingLike) {
            $existingLike->delete();
        } else {
            LikeP::create([
                 "post_id" => request()->post_id,
                 "user_id" => Auth::user()->id
            ]);
        }

        return redirect()->back();
    }

    public function toggleBookmark()
    {
        $validator = Validator::make(
            request()->only(['post_id']),
            [
                'post_id' => ['required', 'integer'],
            ]
        );

        if ($validator->fails()) {
            return redirect()->back();
        }

        $existingBookmark = Bookmark::where('user_id', Auth::user()->id)->where('post_id', request()->post_id)->first();

        if ($existingBookmark) {
            $existingBookmark->delete();
        } else {
            Bookmark::create([
                 "post_id" => request()->post_id,
                 "user_id" => Auth::user()->id
            ]);
        }

        return redirect()->back();
    }

    public function home()
    {
        $eduTopPosts = Post::where('category_id', 5)->orderBy('date_time', 'desc')->take(4)->get();
        $topicOfDay = Post::where('topic_of_day', 1)->first();
        $editorsChoice = Post::where('editors_choice', 1)->first();
        $exclSliderPosts = Post::where('exclusive_slider', 1)->orderBy('date_time', 'desc')->take(10)->get();
        $exclPosts = Post::whereNotIn('category_id', [1,8])->orderBy('date_time', 'desc')->take(4)->get();
        $youTubeLinks = YoutubeLink::orderBy('date_time', 'desc')->take(10)->get();
        $recentNews = Post::whereIn('category_id', [1,8])->orderBy('date_time', 'desc')->take(10)->get();

        $mostViewedPostsIds = DB::table('views')
            ->select('post_id', DB::raw('count(1) as quantity'))
            ->groupBy('post_id')
            ->orderBy('quantity', 'desc')
            ->limit(5)
            ->get()
            ->pluck('post_id')
            ->toArray();

        $mostViewedPosts = collect([]);

        foreach ($mostViewedPostsIds as $postId) {
            $mostViewedPosts->add(Post::find($postId));
        }

        return view("home", [
            "eduTopPosts" => $eduTopPosts,
            "topicOfDay" => $topicOfDay,
            "editorsChoice" => $editorsChoice,
            "exclSliderPosts" => $exclSliderPosts,
            "exclPosts" => $exclPosts,
            "youTubeLinks" => $youTubeLinks,
            "recentNews" => $recentNews,
            "mostViewedPosts" => $mostViewedPosts
        ]);
    }

    public function index($category)
    {
        $category = Category::where('name', $category)->firstOrFail();

        $posts = Post::where('category_id', $category->id)->orderBy('date_time', 'desc')->paginate(10);

        return view("category", [
            'category' => $category,
            'posts' => $posts
        ]);
    }

    public function show($category, $slug)
    {
        $category = Category::where('name', $category)->firstOrFail();

        $post = Post::where('category_id', $category->id)->where('slug', $slug)->firstOrFail();

        $youTubeLinks = YoutubeLink::orderBy('date_time', 'desc')->take(2)->get();

        View::create([
            'post_id' => $post->id,
            'date' => now()
        ]);

        return view("post", [
            'post' => $post,
            'youTubeLinks' => $youTubeLinks
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

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        $x = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
        $x->withPath('search');
        return $x;
    }

}
