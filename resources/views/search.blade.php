@extends("layouts.main")
@section("meta")
    <title>Crypto Pizza — лучший журнал о криптовалютах и блокчейн-технологии.</title>
    <meta data-n-head="ssr" name="description" content="Актуальные новости, сенсации, полезные статьи, интересные обзоры, аналитические прогнозы, интервью и многое другое из мира криптовалют.">
    <meta data-n-head="ssr" data-hid="og:description" property="og:description" content="Актуальные новости, сенсации, полезные статьи, интересные обзоры, аналитические прогнозы, интервью и многое другое из мира криптовалют.">
    <meta data-n-head="ssr" data-hid="og:title" property="og:title" content="Crypto Pizza — лучший журнал о криптовалютах и блокчейн-технологии.">
    <meta data-n-head="ssr" data-hid="og:image" property="og:image" content="{{ url()->current() }}/images/pizza.png">
@endsection
@section("content")

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__item"> <a href="{{ route("home") }}">Главная</a></div>
            <div class="breadcrumbs__separator">—</div>
            <div class="breadcrumbs__item"><span>Поиск по сайту</span></div>
        </div>
        <div class="columns">
            <div class="columns--middle">
                <section class="search-box module">
                    <h1 class="search-box__title module__title">Поиск по запросу “{{ request()->q }}”</h1>
                    <div class="search-box__result">

                        @if($total === 0)
                            По запросу “{{ request()->q }}” не найдено упоминаний. Проверьте правильность вводимой фразы и повторите поиск.
                        @else
                            По запросу “{{ request()->q }}” найдено {{ trans_choice("main.mentions_number", $total) }}.
                        @endif

                    </div>
                    <form action="{{ route("search") }}" method="GET">
                        <div class="search-box__form">
                            <input type="search" name="q" placeholder="Введите запрос для поиска" minlength="3" required>
                            <button type="submit">
                                <svg class="icon icon-loop ">
                                    <use xlink:href="/images/sprite.svg#loop"></use>
                                </svg>
                            </button>
                        </div>
                    </form>

                    @forelse ($results as $res)

                        <div class="newsCard module"><a class="newsCard__image" href="{{ route('post-show', [$res->category->name, $res->slug]) }}"><img src="/{{ $res->image }}" alt=""/></a>
                            <div class="newsCard__content">
                                <div class="newsCard__title"><a href="{{ route('post-show', [$res->category->name, $res->slug]) }}">{{ $res->title }}</a></div>
                                <div class="newsCard__info">
                                    <div class="newsCard__date">{{ $res->date_formatted }}</div>
                                    <div class="newsCard__category">{{ $res->category->name_rus }}</div>
                                    {{--<div class="newsCard__comment">
                                        <svg class="icon icon-comment newsCard__commentIcon">
                                            <use xlink:href="/images/sprite.svg#comment"></use>
                                        </svg>
                                        <div class="newsCard__commentSize">25</div>
                                    </div>--}}
                                </div>
                                <div class="newsCard__text">{{ $res->descr }}</div>
                                <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$res->category->name, $res->slug]) }}">Читать полностью </a>
                                    <div class="newsCard__timeRead">
                                        <svg class="icon icon-time newsCard__timeReadIcon">
                                            <use xlink:href="/images/sprite.svg#time"></use>
                                        </svg>
                                        <div class="newsCard__timeReadText">Время на прочтение {{ $res->read_time }} мин.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty

                        <div class="search-box__empty"> <img src="/images/pizza3.webp" alt="">
                            <p>Нет результатов :(</p>
                        </div>

                    @endforelse

                </section>

                {{ $results->appends(['q' => $q])->links("paging") }}

            </div>

            @include("includes.post-search-menu")

        </div>
    </div>

@endsection
