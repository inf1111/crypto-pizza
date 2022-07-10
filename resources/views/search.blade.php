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

                        <div class="newsCard module"><a class="newsCard__image" href="{{ $res->url }}"><img src="/{{ $res->searchable->image }}" alt=""/></a>
                            <div class="newsCard__content">
                                <div class="newsCard__title"><a href="{{ $res->url }}">{{ $res->title }}</a></div>
                                <div class="newsCard__info">
                                    <div class="newsCard__date">{{ $res->searchable->date_formatted }}</div>
                                    <div class="newsCard__category">{{ $res->searchable->category->name_rus }}</div>
                                    <div class="newsCard__comment">
                                        <svg class="icon icon-comment newsCard__commentIcon">
                                            <use xlink:href="/images/sprite.svg#comment"></use>
                                        </svg>
                                        <div class="newsCard__commentSize">25</div>
                                    </div>
                                </div>
                                <div class="newsCard__text">{{ $res->searchable->descr }}</div>
                                <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ $res->url }}">Читать полностью </a>
                                    <div class="newsCard__timeRead">
                                        <svg class="icon icon-time newsCard__timeReadIcon">
                                            <use xlink:href="/images/sprite.svg#time"></use>
                                        </svg>
                                        <div class="newsCard__timeReadText">Время на прочтение 15 мин.</div>
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
            <aside class="sidebar">
                <div class="currency module">
                    <div class="currency__header">
                        <div class="currency__tab is-active" data-tab="1">Все</div>
                        <div class="currency__tab" data-tab="2">DEFI</div>
                        <div class="currency__tab" data-tab="3">Gamefi</div>
                    </div>
                    <div class="currency__body">
                        <div class="currency__content" data-content="1">
                            <div class="currency__item">
                                <div class="currency__token">
                                    <div class="name">Bitcoin</div>
                                    <div class="shortName">BTC</div>
                                </div>
                                <div class="currency__price">
                                    <div class="value">$ 41 763,50</div>
                                    <div class="delta delta--up">
                                        <div class="delta-icon">
                                            <svg class="icon icon-arrow-rt ">
                                                <use xlink:href="/images/sprite.svg#arrow-rt"></use>
                                            </svg>
                                        </div><span>+1,25% (+117,32)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="currency__item">
                                <div class="currency__token">
                                    <div class="name">Ethereum</div>
                                    <div class="shortName">ETH</div>
                                </div>
                                <div class="currency__price">
                                    <div class="value">$ 3 247,12</div>
                                    <div class="delta delta--down">
                                        <div class="delta-icon">
                                            <svg class="icon icon-arrow-lb ">
                                                <use xlink:href="/images/sprite.svg#arrow-lb"></use>
                                            </svg>
                                        </div><span>-5,74% (-87,01)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="currency__item">
                                <div class="currency__token">
                                    <div class="name">Binance Coin</div>
                                    <div class="shortName">BNB</div>
                                </div>
                                <div class="currency__price">
                                    <div class="value">$ 475,01</div>
                                    <div class="delta delta--down">
                                        <div class="delta-icon">
                                            <svg class="icon icon-arrow-lb ">
                                                <use xlink:href="/images/sprite.svg#arrow-lb"></use>
                                            </svg>
                                        </div><span>-5,74% (-87,01)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="currency__item">
                                <div class="currency__token">
                                    <div class="name">Cardano</div>
                                    <div class="shortName">ADA</div>
                                </div>
                                <div class="currency__price">
                                    <div class="value">$ 1,01</div>
                                    <div class="delta delta--down">
                                        <div class="delta-icon">
                                            <svg class="icon icon-arrow-lb ">
                                                <use xlink:href="/images/sprite.svg#arrow-lb"></use>
                                            </svg>
                                        </div><span>-5,74% (-0,15)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="currency__item">
                                <div class="currency__token">
                                    <div class="name">Solana</div>
                                    <div class="shortName">SOL</div>
                                </div>
                                <div class="currency__price">
                                    <div class="value">$ 147,89</div>
                                    <div class="delta delta--up">
                                        <div class="delta-icon">
                                            <svg class="icon icon-arrow-rt ">
                                                <use xlink:href="/images/sprite.svg#arrow-rt"></use>
                                            </svg>
                                        </div><span>+1,25% (+117,32)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="currency__more"> <a href="">Смотреть все курсы </a></div>
                </div>
                <div class="tgBox module module--sidebar">
                    <div class="tgBox__row">
                        <div class="tgBox__icon"> <img src="/images/tgBox/telegram.svg" alt=""></div>
                        <div class="tgBox__content">
                            <div class="tgBox__title">Подписывайтесь на наш Telegram канал</div>
                            <div class="tgBox__text">Новости крипторынка у вас в телефоне</div>
                        </div>
                    </div><a class="btn tgBox__button" href="">Подписаться </a>
                </div>
                <div class="youtube youtube--widget module">
                    <div class="youtube__header"><img class="youtube__headerIcon" src="/images/youtube/youtube.svg" alt="">
                        <div class="youtube__title">Наш YouTube канал</div>
                    </div>
                    <div class="youtube__list">
                        <div class="youtube__el"><a href=""><img class="youtube__preview" src="/images/upload/8.webp" alt="">
                                <div class="youtube__text">Дайджест новостей крипторынка за 2021 год</div></a></div>
                        <div class="youtube__el"><a href=""><img class="youtube__preview" src="/images/upload/3.webp" alt="">
                                <div class="youtube__text">Главные новости крипторынка за сентябрь...</div></a></div>
                    </div>
                    <div class="youtube__more"> <a href="">Перейти на канал </a></div>
                </div>
            </aside>
        </div>
    </div>

@endsection
