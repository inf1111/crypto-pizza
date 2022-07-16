@inject('carbon', '\Illuminate\Support\Carbon')

@extends("layouts.main")

@section("scripts")
    <script>
        $(document).ready (function () {
            var clicksQuantity = 1;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $('#cardsContainer').on("click", "#loadMoreBtn", function() {
                $.ajax({
                    type: 'POST',
                    url: '{{ route("load-more") }}',
                    data: {
                        clicksQuantity: clicksQuantity
                    },
                    success: function(serverResponse) {
                        $('#cardsContainer').html(serverResponse);
                        clicksQuantity = clicksQuantity + 1;
                        alert(offset);
                    },
                    error: function(){
                        console.log('No response from server');
                    },
                });
            });
        });
    </script>
@endsection

@section("meta")
    <title>Crypto Pizza — лучший журнал о криптовалютах и блокчейн-технологии.</title>
    <meta data-n-head="ssr" name="description" content="Актуальные новости, сенсации, полезные статьи, интересные обзоры, аналитические прогнозы, интервью и многое другое из мира криптовалют.">
    <meta data-n-head="ssr" data-hid="og:description" property="og:description" content="Актуальные новости, сенсации, полезные статьи, интересные обзоры, аналитические прогнозы, интервью и многое другое из мира криптовалют.">
    <meta data-n-head="ssr" data-hid="og:title" property="og:title" content="Crypto Pizza — лучший журнал о криптовалютах и блокчейн-технологии.">
    <meta data-n-head="ssr" data-hid="og:image" property="og:image" content="{{ url()->current() }}/images/pizza.png">
@endsection

@section("content")

    <div class="container">
        <div class="columns">
            <div class="columns--middle">
                <div class="mainInfo module">

                    @isset($topicOfDay)

                        <div class="cardFill themeOfTheDay"><a class="cardFill__link" href="{{ route('post-show', [$topicOfDay->category->name, $topicOfDay->slug]) }}"> <img class="cardFill__image" src="/{{ $topicOfDay->image }}" alt=""/>
                                <div class="cardFill__frame">
                                    <div class="cardFill__top">
                                        <div class="cardFill__tag">
                                            <svg class="icon icon-paper cardFill__tagIcon">
                                                <use xlink:href="./images/sprite.svg#paper"></use>
                                            </svg>
                                            <div class="cardFill__tagText">тема дня</div>
                                        </div>
                                        {{--<div class="cardFill__comment hot">
                                            <svg class="icon icon-fire cardFill__commentIcon">
                                                <use xlink:href="./images/sprite.svg#fire"></use>
                                            </svg>
                                            <div class="cardFill__commentSize">154</div>
                                        </div>--}}
                                    </div>
                                    <div class="cardFill__bottom">
                                        <div class="cardFill__date"> {{ $topicOfDay->date_formatted }} &bull; {{ $carbon::parse($topicOfDay->date_time)->format('H:i') }} &bull; {{ $topicOfDay->category->name_rus }}
                                        </div>
                                        <div class="cardFill__name">{{ $topicOfDay->title }}</div>
                                    </div>
                                </div></a>
                        </div>

                    @endisset

                    @isset($editorsChoice)

                        <div class="cardFill editorChoice"><a class="cardFill__link" href="{{ route('post-show', [$editorsChoice->category->name, $editorsChoice->slug]) }}"> <img class="cardFill__image" src="/{{ $editorsChoice->image }}" alt=""/>
                                <div class="cardFill__frame">
                                    <div class="cardFill__top">
                                        <div class="cardFill__tag">
                                            <svg class="icon icon-target cardFill__tagIcon">
                                                <use xlink:href="./images/sprite.svg#target"></use>
                                            </svg>
                                            <div class="cardFill__tagText">Выбор <br> редакции</div>
                                        </div>
                                        {{--<div class="cardFill__comment">
                                            <svg class="icon icon-comment cardFill__commentIcon">
                                                <use xlink:href="./images/sprite.svg#comment"></use>
                                            </svg>
                                            <div class="cardFill__commentSize">12</div>
                                        </div>--}}
                                    </div>
                                    <div class="cardFill__bottom">
                                        <div class="cardFill__date"> {{ trans_choice("main.hours_number", $carbon::now()->copy()->diffInHours($editorsChoice->date_time)) }} назад &bull; {{ $editorsChoice->category->name_rus }}
                                        </div>
                                        <div class="cardFill__name">{{ $editorsChoice->title }}</div>
                                    </div>
                                </div></a>
                        </div>

                    @endisset

                </div>
                <div class="newsFeed module">
                    <div class="newsFeed__header">
                        <div class="newsFeed__title">Последние новости</div>
                        <div class="newsFeed__all"> <a href="{{ route("cat-index", "news") }}">Все новости</a></div>
                    </div>
                    <div class="newsFeed__main">

                        <div class="newsFeed__first">
                            <div class="newsFeed__item">
                                <div class="newsFeed__image"> <a href="{{ route('post-show', [$recentNews->first()->category->name, $recentNews->first()->slug]) }}"><img src="/{{ $recentNews->first()->image }}" alt=""></a></div>
                                <div class="newsFeed__body">
                                    <div class="newsFeed__name"><a href="{{ route('post-show', [$recentNews->first()->category->name, $recentNews->first()->slug]) }}">{{ $recentNews->first()->title }}</a></div>
                                    <div class="newsFeed__info">
                                        {{--<div class="newsFeed__comment">
                                            <svg class="icon icon-comment newsFeed__commentIcon">
                                                <use xlink:href="./images/sprite.svg#comment"></use>
                                            </svg>
                                            <div class="newsFeed__commentSize">25</div>
                                        </div>--}}
                                        <div class="newsFeed__time">{{ $carbon::parse($recentNews->first()->date_time)->format('H:i') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="newsFeed__list" data-simplebar>

                            @foreach($recentNews as $key => $item)

                                @if ($key > 0)

                                    <div class="newsFeed__item">
                                        <div class="newsFeed__image"> <a href="{{ route('post-show', [$item->category->name, $item->slug]) }}"><img src="/{{ $item->image }}" alt=""></a></div>
                                        <div class="newsFeed__body">
                                            <div class="newsFeed__name"><a href="{{ route('post-show', [$item->category->name, $item->slug]) }}">{{ $item->title }}</a></div>
                                            <div class="newsFeed__info">
                                                {{--<div class="newsFeed__comment hot">
                                                    <svg class="icon icon-fire newsFeed__commentIcon">
                                                        <use xlink:href="./images/sprite.svg#fire"></use>
                                                    </svg>
                                                    <div class="newsFeed__commentSize">170</div>
                                                </div>--}}
                                                <div class="newsFeed__time">{{ $carbon::parse($item->date_time)->format('H:i') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="module">
                    <h2 class="h2 module__title">Эксклюзив</h2>

                    @foreach($exclPosts as $exPost)

                        <div class="newsCard module"><a class="newsCard__image" href="{{ route('post-show', [$exPost->category->name, $exPost->slug]) }}"><img src="/{{ $exPost->image }}" alt=""/></a>
                            <div class="newsCard__content">
                                <div class="newsCard__title"><a href="{{ route('post-show', [$exPost->category->name, $exPost->slug]) }}">{{ $exPost->title }}</a></div>
                                <div class="newsCard__info">
                                    <div class="newsCard__date">{{ $exPost->date_formatted }}</div>
                                    <div class="newsCard__category">{{ $exPost->category->name_rus }}</div>
                                    {{--<div class="newsCard__comment">
                                        <svg class="icon icon-comment newsCard__commentIcon">
                                            <use xlink:href="./images/sprite.svg#comment"></use>
                                        </svg>
                                        <div class="newsCard__commentSize">12</div>
                                    </div>--}}
                                </div>
                                <div class="newsCard__text">{{ $exPost->descr }}</div>
                                <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$exPost->category->name, $exPost->slug]) }}">Читать полностью </a>
                                    {{--<div class="newsCard__timeRead">
                                        <svg class="icon icon-time newsCard__timeReadIcon">
                                            <use xlink:href="./images/sprite.svg#time"></use>
                                        </svg>
                                        <div class="newsCard__timeReadText">Время на прочтение 7 мин.</div>
                                    </div>--}}
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
                <div class="module">
                    <div class="newsSwiper swiper-container">
                        <div class="newsSwiper__prev newsSwiper__navigation">
                            <svg class="icon icon-arrow-left ">
                                <use xlink:href="./images/sprite.svg#arrow-left"></use>
                            </svg>
                        </div>
                        <div class="newsSwiper__next newsSwiper__navigation">
                            <svg class="icon icon-arrow-right ">
                                <use xlink:href="./images/sprite.svg#arrow-right"></use>
                            </svg>
                        </div>
                        <div class="swiper-wrapper">

                            @isset($exclSliderPosts)

                                @foreach($exclSliderPosts as $slPost)

                                    <div class="cardFill newsSwiper__slide swiper-slide"><a class="cardFill__link" href="{{ route('post-show', [$slPost->category->name, $slPost->slug]) }}"> <img class="cardFill__image" src="/{{ $slPost->image }}" alt=""/>
                                            <div class="cardFill__frame">
                                                <div class="cardFill__top">
                                                    {{--<div class="cardFill__comment">
                                                        <svg class="icon icon-comment cardFill__commentIcon">
                                                            <use xlink:href="./images/sprite.svg#comment"></use>
                                                        </svg>
                                                        <div class="cardFill__commentSize">12</div>
                                                    </div>--}}
                                                </div>
                                                <div class="cardFill__bottom">
                                                    <div class="cardFill__date"> {{ trans_choice("main.hours_number", $carbon::now()->copy()->diffInHours($slPost->date_time)) }} назад &bull; {{ $slPost->category->name_rus }}
                                                    </div>
                                                    <div class="cardFill__name">{{ $slPost->title }}</div>
                                                </div>
                                            </div></a>
                                    </div>

                                @endforeach

                            @endisset

                        </div>
                    </div>
                </div>
            </div>
            @include("includes.home-category-menu")
        </div>
        <div class="module module--big-space">
            <h2 class="h2 module__title">Образование</h2>
            <div class="two-columns module">

                @forelse ($eduTopPosts as $eduPost)

                    <div class="newsCard"><a class="newsCard__image" href="{{ route('post-show', [$eduPost->category->name, $eduPost->slug]) }}"><img src="/{{ $eduPost->image }}" alt=""/></a>
                        <div class="newsCard__content">
                            <div class="newsCard__title"><a href="{{ route('post-show', [$eduPost->category->name, $eduPost->slug]) }}">{{ $eduPost->title }}</a></div>
                            <div class="newsCard__info">
                                <div class="newsCard__date">{{ $eduPost->date_formatted }}</div>
                                <div class="newsCard__category">{{ $eduPost->category->name_rus }}</div>
                                {{--<div class="newsCard__comment">
                                    <svg class="icon icon-comment newsCard__commentIcon">
                                        <use xlink:href="./images/sprite.svg#comment"></use>
                                    </svg>
                                    <div class="newsCard__commentSize">25</div>
                                </div>--}}
                            </div>
                            <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$eduPost->category->name, $eduPost->slug]) }}">Читать полностью </a>
                                <div class="newsCard__timeRead">
                                    {{--<svg class="icon icon-time newsCard__timeReadIcon">
                                        <use xlink:href="./images/sprite.svg#time"></use>
                                    </svg>
                                    <div class="newsCard__timeReadText">Время на прочтение 15 мин.</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <h1>No posts</h1>
                @endforelse

            </div>
            <div class="module__more"> <a class="module__more-link" href="{{ route("cat-index", ['education']) }}">Перейти в рубрику
                    <svg class="icon icon-rarr ">
                        <use xlink:href="./images/sprite.svg#rarr"></use>
                    </svg></a></div>
        </div>
    </div>

    <div class="gray-bg module module--big-space">
        <div class="container">
            <div class="youtube module">
                <div class="youtube__header"> <img class="youtube__headerIcon" src="./images/youtube/youtube.svg" alt="">
                    <div class="youtube__title">Наш YouTube канал</div><a class="btn btn--white youtube__channel" href="https://www.youtube.com/c/cartons" target="_blank">Перейти на канал</a>
                    <div class="youtube__navigation">
                        <div class="youtube__nav youtube__nav--prev">
                            <svg class="icon icon-prev ">
                                <use xlink:href="./images/sprite.svg#prev"></use>
                            </svg>
                        </div>
                        <div class="youtube__nav youtube__nav--next">
                            <svg class="icon icon-next ">
                                <use xlink:href="./images/sprite.svg#next"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="youtube__swiper swiper-container">
                    <div class="swiper-wrapper">

                        @isset($youTubeLinks)

                            @foreach($youTubeLinks as $link)

                                <div class="youtube__item swiper-slide"><a href="{{ $link->url }}" target="_blank">
                                        <div class="play">
                                            <div class="play__icon">
                                                <svg class="icon icon-play ">
                                                    <use xlink:href="./images/sprite.svg#play"></use>
                                                </svg>
                                            </div>
                                            <div class="play__text">Посмотреть<br>на YouTube</div>
                                        </div><img class="youtube__preview" src="/{{ $link->image }}" alt=""></a>
                                </div>
    
                            @endforeach

                        @endisset

                    </div>
                </div>
            </div>
            <h2 class="h2 module__title">Популярное за эту неделю</h2>
            <div class="two-columns">

                @foreach($mostViewedPosts as $vPost)

                    <div class="newsCard">
                        <div class="newsCard__content">
                            <div class="newsCard__title"><a href="{{ route('post-show', [$vPost->category->name, $vPost->slug]) }}">{{ $vPost->title }}</a></div>
                            <div class="newsCard__info">
                                <div class="newsCard__date">{{ $vPost->date_formatted }}</div>
                                <div class="newsCard__category">{{ $vPost->category->name_rus }}</div>
                                {{--<div class="newsCard__comment">
                                    <svg class="icon icon-comment newsCard__commentIcon">
                                        <use xlink:href="./images/sprite.svg#comment"></use>
                                    </svg>
                                    <div class="newsCard__commentSize">25</div>
                                </div>--}}
                            </div>
                            <div class="newsCard__text">{{ $vPost->descr }}</div>
                            <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$vPost->category->name, $vPost->slug]) }}">Читать полностью </a>
                                {{--<div class="newsCard__timeRead">
                                    <svg class="icon icon-time newsCard__timeReadIcon">
                                        <use xlink:href="./images/sprite.svg#time"></use>
                                    </svg>
                                    <div class="newsCard__timeReadText">Время на прочтение 15 мин.</div>
                                </div>--}}
                            </div>
                        </div>
                    </div>

                @endforeach

                <div class="subscribe subscribeBox">
                    <form action="" id="home_subs_form">
                        <div class="subscribe__row">
                            <div class="subscribe__content">
                                <div class="subscribe__icon"><img src="./images/subscribe/subscribe.svg" alt=""></div>
                                <div class="column">
                                    <div class="subscribe__title">Будьте в курсе последних событий криптоиндустрии</div>
                                    <div class="subscribe__text">Каждую неделю все самое важное у вас на почте</div>
                                </div>
                            </div>
                            <div class="subscribe__form">
                                <div class="subscribe__field">
                                    <div class="input-form with-icon">
                                        <svg class="icon icon-mail input-form__icon">
                                            <use xlink:href="./images/sprite.svg#mail"></use>
                                        </svg>
                                        <input
                                            id="home_subs_input"
                                            type="text"
                                            pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"
                                            oninvalid="this.setCustomValidity('Введенный текст не является имейлом')"
                                            oninput="this.setCustomValidity('')
                                        "/>
                                        <label>Ваш email</label>

                                        <div id="home_subs_msg">
                                            <div style="position: absolute; top: 2px; left: 0;">
                                                <svg class="icon icon-valid ">
                                                    <use xlink:href="/images/sprite.svg#valid"></use>
                                                </svg>
                                            </div>
                                            <span style="display: block; position: absolute; top: 0; left: 20px;">
                                            !!!
                                        </span>
                                        </div>

                                    </div>
                                </div>
                                <input class="btn btn--orange subscribe__submit" type="submit" value="Подписаться">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <div class="tgLine module--big-space">
            <div class="tgLine__header"><img class="tgLine__headerIcon" src="./images/tgLine/tg.svg" alt="">
                <div class="tgLine__headerText">Новости крипторынка у вас в телефоне</div>
            </div>
            <div class="tgLine__content">Еще больше интересного в Telegram-канале. Только актуальные и важные новости и события.</div><a class="btn btn--black tgLine__button" href="https://t.me/SIGEN_Media" target="_blank">Перейти в канал </a>
        </div>
        <div class="module module--big-space">
            <h2 class="h2 module__title">Возможно вы пропустили:</h2>

            <div id="cardsContainer">
                @include('includes.load-more', ['missedPosts' => $missedPosts])
                <span class="btn btn--white btn--more" id="loadMoreBtn">Еще </span>
            </div>

        </div>
    </div>

@endsection
