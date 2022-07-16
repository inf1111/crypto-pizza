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

                    <div class="cardFill themeOfTheDay"><a class="cardFill__link" href="{{ route('post-show', [$category->name, $posts[0]->slug]) }}"> <img class="cardFill__image" src="/{{ $posts[0]->image }}" alt=""/>
                            <div class="cardFill__frame">
                                <div class="cardFill__top">
                                    {{--<div class="cardFill__comment hot">
                                        <svg class="icon icon-fire cardFill__commentIcon">
                                            <use xlink:href="/images/sprite.svg#fire"></use>
                                        </svg>
                                        <div class="cardFill__commentSize">154</div>
                                    </div>--}}
                                </div>
                                <div class="cardFill__bottom">
                                    <div class="cardFill__date"> {{ $posts[0]->date_formatted }} &bull; {{ $carbon::parse($posts[0]->date_time)->format('H:i') }} &bull; {{ $posts[0]->category->name_rus }}
                                    </div>
                                    <div class="cardFill__name">{{ $posts[0]->title }}</div>
                                </div>
                            </div></a>
                    </div>

                    <div class="cardFill editorChoice"><a class="cardFill__link" href="{{ route('post-show', [$category->name, $posts[1]->slug]) }}"> <img class="cardFill__image" src="/{{ $posts[1]->image }}" alt=""/>
                            <div class="cardFill__frame">
                                <div class="cardFill__top">
                                    {{--<div class="cardFill__comment">
                                        <svg class="icon icon-comment cardFill__commentIcon">
                                            <use xlink:href="/images/sprite.svg#comment"></use>
                                        </svg>
                                        <div class="cardFill__commentSize">12</div>
                                    </div>--}}
                                </div>
                                <div class="cardFill__bottom">
                                    <div class="cardFill__date"> {{ trans_choice("main.hours_number", $carbon::now()->copy()->diffInHours($posts[1]->date_time)) }} назад &bull; {{ $posts[0]->category->name_rus }}
                                    </div>
                                    <div class="cardFill__name">{{ $posts[1]->title }}</div>
                                </div>
                            </div></a>
                    </div>

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
                                        {{--<div class="newsCard__comment">
                                            <svg class="icon icon-comment newsCard__commentIcon">
                                                <use xlink:href="/images/sprite.svg#comment"></use>
                                            </svg>
                                            <div class="newsCard__commentSize">25</div>
                                        </div>--}}
                                    </div>
                                    <div class="newsCard__text">{{ $post->descr }}</div>
                                    <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$category->name, $post->slug]) }}">Читать полностью </a>
                                        {{--<div class="newsCard__timeRead">
                                            <svg class="icon icon-time newsCard__timeReadIcon">
                                                <use xlink:href="/images/sprite.svg#time"></use>
                                            </svg>
                                            <div class="newsCard__timeReadText">Время на прочтение 15 мин.</div>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>

                        @endif

                    @empty
                        <h1>No posts</h1>
                    @endforelse

                </div>

                {{ $posts->links("paging") }}

            </div>
            @include("includes.home-category-menu")
        </div>
    </div>

@endsection
