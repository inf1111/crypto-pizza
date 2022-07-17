<?php

namespace App\Http\Controllers;

use App\Bookmark;
use App\Category;
use App\LikeP;
use App\Post;
use App\View;
use App\YoutubeLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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

        // get most viewed posts

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
            "mostViewedPosts" => $mostViewedPosts,
            "missedPosts" => $this->getMissedPosts()
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

        $postsOnTopic = Post::where('category_id', $category->id)->where('id', '<>', $post->id)->orderBy('date_time', 'desc')->take(5)->get();

        $youTubeLinks = YoutubeLink::orderBy('date_time', 'desc')->take(2)->get();

        View::create([
            'post_id' => $post->id,
            'date' => now()
        ]);

        Cookie::queue('p_' . $post->id, $post->id, 1000);

        return view("post", [
            'post' => $post,
            'youTubeLinks' => $youTubeLinks,
            'missedPosts' => $this->getMissedPosts(),
            'postsOnTopic' => $postsOnTopic
        ]);
    }

    public function search()
    {
        $youTubeLinks = YoutubeLink::orderBy('date_time', 'desc')->take(2)->get();

        if (request()->has("q") && request()->q != "") {

            //dd(Post::search(request()->q)->get(), Post::search(request()->q)->paginate(10)->total());

            $results = Post::search(request()->q)->paginate(10);

            return view("search", [
                'results' => $results,
                'total' => $results->total(),
                'q' => request()->q,

                'youTubeLinks' => $youTubeLinks,
            ]);

        }
        else {

            return view("search", [
                'results' => collect([]),
                'total' => 0,

                'youTubeLinks' => $youTubeLinks,
            ]);

        }
    }

    /**
     * Данные для блока "Возможно вы пропустили" - посты, которые пользователь не читал (сделано с пом. куки)
     */
    private function getMissedPosts()
    {
        $readPosts = [];

        foreach (request()->cookie() as $key => $val) {

            if (substr($key, 0, 2) === "p_") {
                $readPosts[] = $val;
            }

        }

        return Post::whereNotIn('id', $readPosts)->limit(4)->get();
    }

    /**
     * Загрузка постов при клике на кнопку "Показать еще"
     */
    public function loadMore()
    {
        $clicksQuantity = (int) request()->clicksQuantity;

        $readPosts = [];

        foreach (request()->cookie() as $key => $val) {

            if (substr($key, 0, 2) === "p_") {
                $readPosts[] = $val;
            }

        }

        $view = view('includes.load-more', [
            'missedPosts' => Post::whereNotIn('id', $readPosts)->limit(4 + $clicksQuantity * 4)->get(),
            'showLoadMoreBtn' => ((4 + $clicksQuantity * 4) >= Post::whereNotIn('id', $readPosts)->count() ) ? false : true,
        ]);
        return $view->render();
    }

}
