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
                    <div class="cardFill themeOfTheDay"><a class="cardFill__link" href=""> <img class="cardFill__image" src="/images/upload/1.webp" alt=""/>
                            <div class="cardFill__frame">
                                <div class="cardFill__top">
                                    <div class="cardFill__tag">
                                        <svg class="icon icon-paper cardFill__tagIcon">
                                            <use xlink:href="/images/sprite.svg#paper"></use>
                                        </svg>
                                        <div class="cardFill__tagText">тема дня</div>
                                    </div>
                                    <div class="cardFill__comment hot">
                                        <svg class="icon icon-fire cardFill__commentIcon">
                                            <use xlink:href="/images/sprite.svg#fire"></use>
                                        </svg>
                                        <div class="cardFill__commentSize">154</div>
                                    </div>
                                </div>
                                <div class="cardFill__bottom">
                                    <div class="cardFill__date"> 5 Января 2022 &bull; 10:45 &bull; Статьи
                                    </div>
                                    <div class="cardFill__name">Неизвестный биткоин-майнер добыл блок — вероятность такого события менее 0,0001%</div>
                                </div>
                            </div></a></div>
                    <div class="cardFill editorChoice"><a class="cardFill__link" href=""> <img class="cardFill__image" src="/images/upload/2.webp" alt=""/>
                            <div class="cardFill__frame">
                                <div class="cardFill__top">
                                    <div class="cardFill__tag">
                                        <svg class="icon icon-target cardFill__tagIcon">
                                            <use xlink:href="/images/sprite.svg#target"></use>
                                        </svg>
                                        <div class="cardFill__tagText">Выбор <br> редакции</div>
                                    </div>
                                    <div class="cardFill__comment">
                                        <svg class="icon icon-comment cardFill__commentIcon">
                                            <use xlink:href="/images/sprite.svg#comment"></use>
                                        </svg>
                                        <div class="cardFill__commentSize">12</div>
                                    </div>
                                </div>
                                <div class="cardFill__bottom">
                                    <div class="cardFill__date"> 4 часа назад &bull; Статьи
                                    </div>
                                    <div class="cardFill__name">Майнинг биткоина: что ждет сектор в 2022 году?</div>
                                </div>
                            </div></a></div>
                </div>
                <div class="module">

                    @forelse ($posts as $post)

                        <div class="newsCard module"><a class="newsCard__image" href="{{ route('post-show', [$category->name, $post->slug]) }}"><img src="/{{ $post->image }}" alt=""/></a>
                            <div class="newsCard__content">
                                <div class="newsCard__title"><a href="{{ route('post-show', [$category->name, $post->slug]) }}">{{ $post->title }}</a></div>
                                <div class="newsCard__info">
                                    <div class="newsCard__date">{{ $post->date_formatted }}</div>
                                    <div class="newsCard__category">{{ $post->category->name_rus }}</div>
                                    <div class="newsCard__comment">
                                        <svg class="icon icon-comment newsCard__commentIcon">
                                            <use xlink:href="/images/sprite.svg#comment"></use>
                                        </svg>
                                        <div class="newsCard__commentSize">25</div>
                                    </div>
                                </div>
                                <div class="newsCard__text">{{ $post->descr }}</div>
                                <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$category->name, $post->slug]) }}">Читать полностью </a>
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
                        <h1>No posts</h1>
                    @endforelse

                </div>

                {{ $posts->links("paging") }}

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
                <div class="pizzaBox module module--sidebar">
                    <div class="pizzaBox__header">
                        <div class="pizzaBox__title">Пицца Laszlo</div>
                        <div class="pizzaBox__info">
                            <svg class="icon icon-info ">
                                <use xlink:href="/images/sprite.svg#info"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="pizzaBox__btc">10 000 BTC</div>
                    <div class="pizzaBox__text">Стоимость пиццы Ласло на сегодняшний день составляет:</div>
                    <div class="pizzaBox__price">$ 426 192 000</div>
                    <div class="pizzaBox__counter">До Bitcoin Pizza Day еще 187 дней</div>
                </div>
                <div class="tgBox module module--sidebar">
                    <div class="tgBox__row">
                        <div class="tgBox__icon"> <img src="/images/tgBox/telegram.svg" alt=""></div>
                        <div class="tgBox__content">
                            <div class="tgBox__title">Подписывайтесь на наш Telegram канал</div>
                            <div class="tgBox__text">Новости крипторынка у вас в телефоне</div>
                        </div>
                    </div><a class="btn tgBox__button" href="https://t.me/SIGEN_Media" target="_blank">Подписаться </a>
                </div>
                <div class="recentComment module">
                    <div class="recentComment__title">
                        <div class="recentComment__titleIcon"><img src="/images/chatroom.svg" alt=""></div>
                        <div class="recentComment__titleText">Последние комментарии</div>
                    </div>
                    <div class="recentComment__list">
                        <div class="recentComment__item">
                            <div class="recentComment__author">
                                <div class="recentComment__avatar"> <img src="/images/upload/9.webp" alt=""></div>
                                <div class="recentComment__name">
                                    <div class="name">nft_monkey</div>
                                    <div class="time">10 минут назад</div>
                                </div>
                            </div>
                            <div class="recentComment__text">Спасибо КриптоПицца! Очень информативная и интересная статья, прочитал на одном дыхании!</div>
                            <div class="recentComment__link">К статье: <a href="">Билеты будущего, или Как NFT решает главную проблему билетного рынка</a></div>
                        </div>
                        <div class="recentComment__item">
                            <div class="recentComment__author">
                                <div class="recentComment__avatar"> <img src="/images/upload/9.webp" alt=""></div>
                                <div class="recentComment__name">
                                    <div class="name">Алексей</div>
                                    <div class="time">15 минут назад</div>
                                </div>
                            </div>
                            <div class="recentComment__text">Задача организации, в особенности же начало повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации систем массового участия. Равным образом сложившаяся структура организации способствуе...</div>
                            <div class="recentComment__link">К статье: <a href="">Билеты будущего, или Как NFT решает главную проблему билетного рынка</a></div>
                        </div>
                        <div class="recentComment__item">
                            <div class="recentComment__author">
                                <div class="recentComment__avatar"> <img src="/images/upload/9.webp" alt=""></div>
                                <div class="recentComment__name">
                                    <div class="name">nft_monkey</div>
                                    <div class="time">10 минут назад</div>
                                </div>
                            </div>
                            <div class="recentComment__text">Спасибо КриптоПицца! Очень информативная и интересная статья, прочитал на одном дыхании!</div>
                            <div class="recentComment__link">К статье: <a href="">Билеты будущего, или Как NFT решает главную проблему билетного рынка</a></div>
                        </div>
                        <div class="recentComment__item">
                            <div class="recentComment__author">
                                <div class="recentComment__avatar"> <img src="/images/upload/9.webp" alt=""></div>
                                <div class="recentComment__name">
                                    <div class="name">Алексей</div>
                                    <div class="time">15 минут назад</div>
                                </div>
                            </div>
                            <div class="recentComment__text">Задача организации, в особенности же начало повседневной работы по формированию позиции влечет за собой процесс внедрения и модернизации систем массового участия. Равным образом сложившаяся структура организации способствуе...</div>
                            <div class="recentComment__link">К статье: <a href="">Билеты будущего, или Как NFT решает главную проблему билетного рынка</a></div>
                        </div>
                        <div class="recentComment__item">
                            <div class="recentComment__author">
                                <div class="recentComment__avatar"> <img src="/images/upload/9.webp" alt=""></div>
                                <div class="recentComment__name">
                                    <div class="name">nft_monkey</div>
                                    <div class="time">10 минут назад</div>
                                </div>
                            </div>
                            <div class="recentComment__text">Спасибо КриптоПицца! Очень информативная и интересная статья, прочитал на одном дыхании!</div>
                            <div class="recentComment__link">К статье: <a href="">Билеты будущего, или Как NFT решает главную проблему билетного рынка</a></div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

@endsection
