@inject('carbon', '\Illuminate\Support\Carbon')

@extends("layouts.main")
@section("content")

    <div class="container">
        <div class="breadcrumbs">
            {{--{{ Breadcrumbs::render('category', $category) }}--}}
            <div class="breadcrumbs__item"> <a href="{{ route("home") }}">Главная</a></div>
            <div class="breadcrumbs__separator">—</div>
            <div class="breadcrumbs__item"><span>{{ $category->name_rus }}</span></div>
        </div>
        <div class="columns module">
            <div class="columns--middle">
                <h1 class="page-title">{{ $category->name_rus }}</h1>
                <div class="mainInfo module">

                    @isset($posts[0])

                        <div class="cardFill themeOfTheDay"><a class="cardFill__link" href="{{ route('post-show', [$category->name, $posts[0]->slug]) }}"> <img class="cardFill__image" src="/{{ $posts[0]->image }}" alt=""/>
                                <div class="cardFill__frame">
                                    <div class="cardFill__top">

                                        @include("includes.comments.cardfill-comment", ['post' => $posts[0]])

                                    </div>
                                    <div class="cardFill__bottom">
                                        <div class="cardFill__date"> {{ $posts[0]->date_formatted }} &bull; {{ $carbon::parse($posts[0]->date_time)->format('H:i') }} &bull; {{ $posts[0]->category->name_rus }}
                                        </div>
                                        <div class="cardFill__name">{{ $posts[0]->title }}</div>
                                    </div>
                                </div></a>
                        </div>

                    @endisset

                    @isset($posts[1])

                        <div class="cardFill editorChoice"><a class="cardFill__link" href="{{ route('post-show', [$category->name, $posts[1]->slug]) }}"> <img class="cardFill__image" src="/{{ $posts[1]->image }}" alt=""/>
                                <div class="cardFill__frame">
                                    <div class="cardFill__top">

                                        @include("includes.comments.cardfill-comment", ['post' => $posts[1]])

                                    </div>
                                    <div class="cardFill__bottom">
                                        <div class="cardFill__date"> {{ trans_choice("main.hours_number", $carbon::now()->copy()->diffInHours($posts[1]->date_time)) }} назад &bull; {{ $posts[0]->category->name_rus }}
                                        </div>
                                        <div class="cardFill__name">{{ $posts[1]->title }}</div>
                                    </div>
                                </div></a>
                        </div>

                    @endisset

                </div>
                <div class="module">

                    @forelse ($posts as $key => $post)

                        @if($key >= 2)

                            <div class="newsCard module"><a class="newsCard__image" href="{{ route('post-show', [$category->name, $post->slug]) }}"><img src="/{{ $post->image }}" alt=""/></a>
                                <div class="newsCard__content">
                                    <div class="newsCard__title"><a href="{{ route('post-show', [$category->name, $post->slug]) }}">{{ $post->title }}</a></div>
                                    <div class="newsCard__info">
                                        <div class="newsCard__date">{{ $post->date_formatted }}</div>
                                        <div class="newsCard__category">{{ $post->category->name_rus }}</div>

                                        @include("includes.comments.newscard-comment", ['post' => $post])

                                    </div>
                                    <div class="newsCard__text">{{ $post->descr }}</div>
                                    <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$category->name, $post->slug]) }}">Читать полностью </a>
                                        <div class="newsCard__timeRead">
                                            <svg class="icon icon-time newsCard__timeReadIcon">
                                                <use xlink:href="/images/sprite.svg#time"></use>
                                            </svg>
                                            <div class="newsCard__timeReadText">Время на прочтение {{ $post->read_time }} мин.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif

                    @empty
                        <h4>No posts</h4>
                    @endforelse

                </div>

                {{ $posts->links("paging") }}

            </div>

            <aside class="sidebar">

                @include("includes.menus.currency-wiget")

                @include("includes.menus.pizza-day")

                @include("includes.menus.telegram")

                @include("includes.menus.comments", [
                    'title' => "В этой рубрике обсуждают:",
                    'comments4menu' => $comments4menu
                ])

            </aside>

        </div>
    </div>

@endsection
