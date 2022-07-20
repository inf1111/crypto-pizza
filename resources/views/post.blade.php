@inject('carbon', '\Illuminate\Support\Carbon')

@extends("layouts.main")
@section("meta")
    <title>{{ $post->title }}</title>
    <meta data-n-head="ssr" name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($post->text), 160) }}">
    <meta data-n-head="ssr" data-hid="og:description" property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($post->text), 160) }}">
    <meta data-n-head="ssr" data-hid="og:title" property="og:title" content="{{ $post->title }}">
    <meta data-n-head="ssr" property="og:type" content="article">
    <meta data-n-head="ssr" data-hid="og:image" property="og:image" content="{{ url($post->image) }}">
@endsection
@section("content")

    <div class="container">
        <div class="breadcrumbs">
            {{--{{ Breadcrumbs::render('post-show', $post->category, $post) }}--}}
            <div class="breadcrumbs__item"> <a href="{{ route("home") }}">Главная</a></div>
            <div class="breadcrumbs__separator">—</div>
            <div class="breadcrumbs__item"><a href="{{ route("cat-index", $post->category->name) }}">{{ $post->category->name_rus }}</a></div>
            <div class="breadcrumbs__separator">—</div>
            <div class="breadcrumbs__item"><span>{{ $post->title }}</span></div>
        </div>
        <div class="columns">
            <div class="share share--left">
                @auth
                <div class="share__item"><a class="share__link bookmark @if($post->bookmarked) is-active @endif" href="{{ route("toggle-bookmark", ["post_id" => $post->id]) }}">
                        <svg class="icon icon-bookmark @if($post->bookmarked) active @endif">
                            <use xlink:href="/images/sprite.svg#bookmark"></use>
                        </svg></a></div>
                @endauth
                <div class="share__item"><a class="share__link" href="https://twitter.com/intent/tweet?text={!! \Illuminate\Support\Str::limit(strip_tags($post->text), 200) !!}&url={{ url()->current() }}" target="_blank"><img src="/images/share/twitter.svg" alt=""></a></div>
                <div class="share__item"><a class="share__link" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"><img src="/images/share/facebook.svg" alt=""></a></div>
                <div class="share__item"><a class="share__link" href="https://t.me/share/url?url={{ url()->current() }}" target="_blank"><img src="/images/share/telegram.svg" alt=""></a></div>
                <div class="share__item"><a class="share__link" href="https://vk.com/share.php?url={{ url()->current() }}" target="_blank"><img src="/images/share/vk.svg" alt=""></a></div>
            </div>
            <div class="columns--middle">
                <div class="post">
                    <div class="post__header">
                        <h1 class="post__title">{{ $post->title }}</h1>
                        <div class="post-info">
                            <div class="post-info__date">{{ $post->date_formatted }}</div>
                            {{--<div class="post-info__bull"></div>
                            <div class="post-info__comment hot">
                                <svg class="icon icon-fire post-info__commentIcon">
                                    <use xlink:href="/images/sprite.svg#fire"></use>
                                </svg>
                                <div class="post-info__commentText">120</div>
                            </div>--}}
                            <div class="post-info__bull"></div>
                            <div class="post-info__timeRead">
                                <svg class="icon icon-time post-info__timeRead-icon">
                                    <use xlink:href="/images/sprite.svg#time"></use>
                                </svg>
                                <div class="post-info__timeRead-text">Время на прочтение {{ $post->read_time }} мин.</div>
                            </div>
                        </div>
                    </div>

                    @if(isset($post->contents) && count(json_decode($post->contents))>0)

                        <div class="post__article module">
                            <div class="post__article-title">Содержание статьи:</div>
                            <ul class="post__article-list">

                                @foreach(json_decode($post->contents) as $key => $item)

                                    <li class="post__article-item"><a class="post__article-link" href="#head_{{ $key }}">{!! $item !!}</a></li>

                                @endforeach

                            </ul>
                        </div>

                    @endisset

                    <div class="post__content">

                        {!! $post->text !!}

                    </div>
                </div>
                <div class="share share--horizontal">
                    <div class="share__social">
                        <div class="share__social-text">Поделиться<br>новостью:</div>
                        <div class="share__social-list">
                            <div class="share__item"> <a class="share__link" href="https://twitter.com/intent/tweet?text={!! \Illuminate\Support\Str::limit(strip_tags($post->text), 200) !!}&url={{ url()->current() }}" target="_blank"><img src="/images/share/twitter.svg" alt=""></a></div>

                            <div class="share__item"><a class="share__link" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank"><img src="/images/share/facebook.svg" alt=""></a></div>

                            <div class="share__item"><a class="share__link" href="https://t.me/share/url?url={{ url()->current() }}" target="_blank"><img src="/images/share/telegram.svg" alt=""></a></div>

                            <div class="share__item"><a class="share__link" href="https://vk.com/share.php?url={{ url()->current() }}" target="_blank"><img src="/images/share/vk.svg" alt=""></a></div>
                        </div>
                    </div>
                    @auth

                    <div class="share__bookmark">
                        <div class="share__bookmark-text">Добавить в закладки</div>
                        <div class="share__item"> <a class="share__link bookmark @if($post->bookmarked) is-active @endif" href="{{ route("toggle-bookmark", ["post_id" => $post->id]) }}">
                                <span >
                                    <svg class="icon icon-bookmark">
                                        <use xlink:href="/images/sprite.svg#bookmark"></use>
                                    </svg>
                                </span>
                            </a></div>

                    </div>


                    <div class="share__fav">
                        <div class="share__fav-text">Лайкните статью?</div>
                        <div class="share__item"> <a class="share__link fav @if($post->liked) is-active @endif" href="{{ route("toggle-like-post", ["post_id" => $post->id]) }}">
                                <svg class="icon icon-hearth ">
                                    <use xlink:href="/images/sprite.svg#hearth"></use>
                                </svg></a></div>
                    </div>

                    @endauth
                </div>

                @isset($postsOnTopic)

                    <div class="post-list module">
                        <div class="post-list__title">Статьи по теме</div>
                        <div class="post-list__list">

                            @foreach($postsOnTopic as $post)

                                <div class="post-list__item">
                                    <div class="post-list__date">{{ $carbon::parse($post->date_time)->format('d.m.Y') }}</div>
                                    <div class="post-list__name"> <a class="post-list__link" href="{{ route('post-show', [$post->category->name, $post->slug]) }}">{{ $post->title }}</a></div>
                                    {{--<div class="post-list__comment">
                                        <svg class="icon icon-comment ">
                                            <use xlink:href="/images/sprite.svg#comment"></use>
                                        </svg>
                                        <div class="post-list__commentText">25</div>
                                    </div>--}}
                                </div>

                            @endforeach

                        </div>
                    </div>

                @endisset

                <div class="post-comment module">
                    <div class="post-comment__title">Комментарии: <sup>{{ $post->comments()->count() }}</sup></div>

                    @if($post->comments()->count() === 0)

                        <div class="post-comment__auth"><img class="post-comment__pizza" src="/images/pizza.webp" alt="">
                            <div class="post-comment__description">Комментариев еще нет. Вы можете оставить первый.</div>
                        </div>

                    @else

                        @foreach($post->comments as $cmnt)

                            <div class="comment">
                                <div class="comment__header">
                                    <div class="comment__avatar @if($cmnt->user->isOnline) online @endif">
                                        <img src="
                                            @if(is_null($cmnt->user->avatar))
                                                /images/anon.png
                                            @else
                                                /{{ $cmnt->user->avatar }}
                                            @endif
                                        "/>
                                    </div>
                                    <div class="comment__author">{{ $cmnt->user->NameForComments }}</div>
                                    <div class="comment__bull"></div>
                                    <div class="comment__time">{{ $carbon::parse($cmnt->created_at)->format('d.m.Y H:i') }}</div>
                                    {{--<div class="comment__liked">
                                        <svg class="icon icon-like is-active">
                                            <use xlink:href="/images/sprite.svg#like"></use>
                                        </svg>
                                        <div class="comment__liked-value positive">+10</div>
                                        <svg class="icon icon-dislike ">
                                            <use xlink:href="/images/sprite.svg#dislike"></use>
                                        </svg>
                                    </div>--}}
                                </div>
                                <div class="comment__body">{{ $cmnt->text }}</div>
                                <div class="comment__footer">

                                    @auth

                                        <div class="comment__reply">
                                            <svg class="icon icon-reply ">
                                                <use xlink:href="/images/sprite.svg#reply"></use>
                                            </svg>Ответить
                                        </div>

                                    @endauth

                                </div>
                            </div>

                        @endforeach

                    @endif

                    {{--<div class="row aic jcc"><a class="btn btn--white" href="">
                            <svg class="icon icon-more ">
                                <use xlink:href="/images/sprite.svg#more"></use>
                            </svg>Еще комментарии (112) </a>
                    </div>--}}

                    @guest

                        <div class="post-comment__noauth">
                            <div class="post-comment__description">Чтобы оставлять комментарии вы должны быть зарегистрированы. </div>
                            <div class="post-comment__row"><a class="btn btn--black post-comment__btn" href="#" id="enter_from_comments_btn">Войти</a><a class="btn btn--white post-comment__btn" href="#" id="register_from_comments_btn">Зарегистрироваться </a></div>
                        </div>

                    @endguest

                    @auth

                        <div class="post-comment__write">
                            <h3 class="post-comment__write-title">Оставить комментарий:</h3>
                            <form action="{{ route("comment-store") }}" method="POST">
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="hidden" name="parent_id" value="0">
                                <div class="post-comment__write-box">
                                    <textarea class="textarea" name="text" placeholder="Введите текст комментария" minlength="3" maxlength="255" required oninvalid="this.setCustomValidity('Длина комментария - от 3 до 255 символов')" oninput="this.setCustomValidity('')"></textarea>
                                    <div class="post-comment__write-actions">
                                        {{--<button>
                                            <svg class="icon icon-emoji ">
                                                <use xlink:href="/images/sprite.svg#emoji"></use>
                                            </svg>
                                        </button>--}}
                                        <button type="submit">
                                            <svg class="icon icon-send ">
                                                <use xlink:href="/images/sprite.svg#send"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    @endauth

                </div>
            </div>

            @include("includes.post-search-menu")

        </div>
        <div class="module module--big-space">
            <h2 class="h2 module__title">Возможно вы пропустили:</h2>
            <div class="four-columns module">

                @foreach($missedPosts as $post)

                    <div class="newsCard"><a class="newsCard__image" href="{{ route('post-show', [$post->category->name, $post->slug]) }}"><img src="/{{ $post->image }}" alt=""/></a>
                        <div class="newsCard__content">
                            <div class="newsCard__title"><a href="{{ route('post-show', [$post->category->name, $post->slug]) }}">{{ $post->title }}</a></div>
                            <div class="newsCard__info">
                                <div class="newsCard__date">{{ $post->date_formatted }}</div>
                                <div class="newsCard__category">{{ $post->category->name_rus }}</div>
                                {{--<div class="newsCard__comment">
                                    <svg class="icon icon-comment newsCard__commentIcon">
                                        <use xlink:href="/images/sprite.svg#comment"></use>
                                    </svg>
                                    <div class="newsCard__commentSize">25</div>
                                </div>--}}
                            </div>
                            <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$post->category->name, $post->slug]) }}">Читать полностью </a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </div>

@endsection
