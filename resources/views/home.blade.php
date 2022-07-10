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
        <div class="columns">
            <div class="columns--middle">
                <div class="mainInfo module">
                    <div class="cardFill themeOfTheDay"><a class="cardFill__link" href=""> <img class="cardFill__image" src="./images/upload/1.webp" alt=""/>
                            <div class="cardFill__frame">
                                <div class="cardFill__top">
                                    <div class="cardFill__tag">
                                        <svg class="icon icon-paper cardFill__tagIcon">
                                            <use xlink:href="./images/sprite.svg#paper"></use>
                                        </svg>
                                        <div class="cardFill__tagText">тема дня</div>
                                    </div>
                                    <div class="cardFill__comment hot">
                                        <svg class="icon icon-fire cardFill__commentIcon">
                                            <use xlink:href="./images/sprite.svg#fire"></use>
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
                    <div class="cardFill editorChoice"><a class="cardFill__link" href=""> <img class="cardFill__image" src="./images/upload/2.webp" alt=""/>
                            <div class="cardFill__frame">
                                <div class="cardFill__top">
                                    <div class="cardFill__tag">
                                        <svg class="icon icon-target cardFill__tagIcon">
                                            <use xlink:href="./images/sprite.svg#target"></use>
                                        </svg>
                                        <div class="cardFill__tagText">Выбор <br> редакции</div>
                                    </div>
                                    <div class="cardFill__comment">
                                        <svg class="icon icon-comment cardFill__commentIcon">
                                            <use xlink:href="./images/sprite.svg#comment"></use>
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
                <div class="newsFeed module">
                    <div class="newsFeed__header">
                        <div class="newsFeed__title">Лента новостей</div>
                        <div class="newsFeed__all"> <a href="">Все новости</a></div>
                    </div>
                    <div class="newsFeed__main">
                        <div class="newsFeed__first">
                            <div class="newsFeed__item">
                                <div class="newsFeed__image"> <a href=""><img src="./images/upload/3.webp" alt=""></a></div>
                                <div class="newsFeed__body">
                                    <div class="newsFeed__name"><a href="">Майнинг биткоина: что ждет сектор в 2022 году?</a></div>
                                    <div class="newsFeed__info">
                                        <div class="newsFeed__comment">
                                            <svg class="icon icon-comment newsFeed__commentIcon">
                                                <use xlink:href="./images/sprite.svg#comment"></use>
                                            </svg>
                                            <div class="newsFeed__commentSize">25</div>
                                        </div>
                                        <div class="newsFeed__time">16:03</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="newsFeed__list" data-simplebar>
                            <div class="newsFeed__item">
                                <div class="newsFeed__image"> <a href=""><img src="./images/upload/4.webp" alt=""></a></div>
                                <div class="newsFeed__body">
                                    <div class="newsFeed__name"><a href="">Через отрицание к принятию: как менялось отношение Visa к криптовалютам?</a></div>
                                    <div class="newsFeed__info">
                                        <div class="newsFeed__comment hot">
                                            <svg class="icon icon-fire newsFeed__commentIcon">
                                                <use xlink:href="./images/sprite.svg#fire"></use>
                                            </svg>
                                            <div class="newsFeed__commentSize">170</div>
                                        </div>
                                        <div class="newsFeed__time">8:29</div>
                                    </div>
                                </div>
                            </div>
                            <div class="newsFeed__item">
                                <div class="newsFeed__image"> <a href=""><img src="./images/upload/5.webp" alt=""></a></div>
                                <div class="newsFeed__body">
                                    <div class="newsFeed__name"><a href="">Неизвестный биткоин-майнер добыл какой то типа блок — вероятность такого события менее 0,0001%</a></div>
                                    <div class="newsFeed__info">
                                        <div class="newsFeed__comment hot">
                                            <svg class="icon icon-fire newsFeed__commentIcon">
                                                <use xlink:href="./images/sprite.svg#fire"></use>
                                            </svg>
                                            <div class="newsFeed__commentSize">90</div>
                                        </div>
                                        <div class="newsFeed__time">7:03</div>
                                    </div>
                                </div>
                            </div>
                            <div class="newsFeed__item">
                                <div class="newsFeed__image"> <a href=""><img src="./images/upload/6.webp" alt=""></a></div>
                                <div class="newsFeed__body">
                                    <div class="newsFeed__name"><a href="">Через отрицание к принятию: как менялось отношение Visa к криптовалютам?</a></div>
                                    <div class="newsFeed__info">
                                        <div class="newsFeed__comment">
                                            <svg class="icon icon-comment newsFeed__commentIcon">
                                                <use xlink:href="./images/sprite.svg#comment"></use>
                                            </svg>
                                            <div class="newsFeed__commentSize">25</div>
                                        </div>
                                        <div class="newsFeed__time">8:03</div>
                                    </div>
                                </div>
                            </div>
                            <div class="newsFeed__item">
                                <div class="newsFeed__image"> <a href=""><img src="./images/upload/2.webp" alt=""></a></div>
                                <div class="newsFeed__body">
                                    <div class="newsFeed__name"><a href="">Майнинг биткоина: что ждет сектор в 2022 году?</a></div>
                                    <div class="newsFeed__info">
                                        <div class="newsFeed__comment">
                                            <svg class="icon icon-comment newsFeed__commentIcon">
                                                <use xlink:href="./images/sprite.svg#comment"></use>
                                            </svg>
                                            <div class="newsFeed__commentSize">25</div>
                                        </div>
                                        <div class="newsFeed__time">16:03</div>
                                    </div>
                                </div>
                            </div>
                            <div class="newsFeed__item">
                                <div class="newsFeed__image"> <a href=""><img src="./images/upload/3.webp" alt=""></a></div>
                                <div class="newsFeed__body">
                                    <div class="newsFeed__name"><a href="">Майнинг биткоина: что ждет сектор в 2022 году?</a></div>
                                    <div class="newsFeed__info">
                                        <div class="newsFeed__comment">
                                            <svg class="icon icon-comment newsFeed__commentIcon">
                                                <use xlink:href="./images/sprite.svg#comment"></use>
                                            </svg>
                                            <div class="newsFeed__commentSize">25</div>
                                        </div>
                                        <div class="newsFeed__time">16:03</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="module">
                    <h2 class="h2 module__title">Эксклюзив</h2>
                    <div class="newsCard module"><a class="newsCard__image" href=""><img src="./images/upload/2.webp" alt=""/></a>
                        <div class="newsCard__content">
                            <div class="newsCard__title"><a href="">EuroSwap EDEX презентовал команду и сразу перешел в основную фазу развития</a></div>
                            <div class="newsCard__info">
                                <div class="newsCard__date">5 января 2022</div>
                                <div class="newsCard__category">Обзоры</div>
                                <div class="newsCard__comment">
                                    <svg class="icon icon-comment newsCard__commentIcon">
                                        <use xlink:href="./images/sprite.svg#comment"></use>
                                    </svg>
                                    <div class="newsCard__commentSize">25</div>
                                </div>
                            </div>
                            <div class="newsCard__text">Европейский криптопроект EuroSwap EDEX, который в ноябре провел токенсейл EDEX, переходит в основную фазу развития. Напомним, что на старте развития проект привлек огромное внимание благодаря перспективной идее и практичной технологии.</div>
                            <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                                <div class="newsCard__timeRead">
                                    <svg class="icon icon-time newsCard__timeReadIcon">
                                        <use xlink:href="./images/sprite.svg#time"></use>
                                    </svg>
                                    <div class="newsCard__timeReadText">Время на прочтение 15 мин.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="newsCard module"><a class="newsCard__image" href=""><img src="./images/upload/3.webp" alt=""/></a>
                        <div class="newsCard__content">
                            <div class="newsCard__title"><a href="">Смена тренда или ложный отскок: при каких условиях биткоин вырастет?</a></div>
                            <div class="newsCard__info">
                                <div class="newsCard__date">5 января 2022</div>
                                <div class="newsCard__category">Обзоры</div>
                                <div class="newsCard__comment">
                                    <svg class="icon icon-comment newsCard__commentIcon">
                                        <use xlink:href="./images/sprite.svg#comment"></use>
                                    </svg>
                                    <div class="newsCard__commentSize">12</div>
                                </div>
                            </div>
                            <div class="newsCard__text">Европейский криптопроект EuroSwap EDEX, который в ноябре провел токенсейл EDEX, переходит в основную фазу развития. Напомним, что на старте развития проект привлек огромное внимание благодаря перспективной идее и практичной технологии.</div>
                            <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                                <div class="newsCard__timeRead">
                                    <svg class="icon icon-time newsCard__timeReadIcon">
                                        <use xlink:href="./images/sprite.svg#time"></use>
                                    </svg>
                                    <div class="newsCard__timeReadText">Время на прочтение 7 мин.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="newsCard module"><a class="newsCard__image" href=""><img src="./images/upload/4.webp" alt=""/></a>
                        <div class="newsCard__content">
                            <div class="newsCard__title"><a href="">EuroSwap EDEX презентовал команду и сразу перешел в основную фазу развития</a></div>
                            <div class="newsCard__info">
                                <div class="newsCard__date">5 января 2022</div>
                                <div class="newsCard__category">Обзоры</div>
                                <div class="newsCard__comment hot">
                                    <svg class="icon icon-fire newsCard__commentIcon">
                                        <use xlink:href="./images/sprite.svg#fire"></use>
                                    </svg>
                                    <div class="newsCard__commentSize">90</div>
                                </div>
                            </div>
                            <div class="newsCard__text">Европейский криптопроект EuroSwap EDEX, который в ноябре провел токенсейл EDEX, переходит в основную фазу развития. Напомним, что на старте развития проект привлек огромное внимание благодаря перспективной идее и практичной технологии.</div>
                            <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                                <div class="newsCard__timeRead">
                                    <svg class="icon icon-time newsCard__timeReadIcon">
                                        <use xlink:href="./images/sprite.svg#time"></use>
                                    </svg>
                                    <div class="newsCard__timeReadText">Время на прочтение 15 мин.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="newsCard module"><a class="newsCard__image" href=""><img src="./images/upload/5.webp" alt=""/></a>
                        <div class="newsCard__content">
                            <div class="newsCard__title"><a href="">Смена тренда или ложный отскок: при каких условиях биткоин вырастет?</a></div>
                            <div class="newsCard__info">
                                <div class="newsCard__date">5 января 2022</div>
                                <div class="newsCard__category">Обзоры</div>
                                <div class="newsCard__comment">
                                    <svg class="icon icon-comment newsCard__commentIcon">
                                        <use xlink:href="./images/sprite.svg#comment"></use>
                                    </svg>
                                    <div class="newsCard__commentSize">12</div>
                                </div>
                            </div>
                            <div class="newsCard__text">Европейский криптопроект EuroSwap EDEX, который в ноябре провел токенсейл EDEX, переходит в основную фазу развития. Напомним, что на старте развития проект привлек огромное внимание благодаря перспективной идее и практичной технологии.</div>
                            <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                                <div class="newsCard__timeRead">
                                    <svg class="icon icon-time newsCard__timeReadIcon">
                                        <use xlink:href="./images/sprite.svg#time"></use>
                                    </svg>
                                    <div class="newsCard__timeReadText">Время на прочтение 7 мин.</div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <div class="cardFill newsSwiper__slide swiper-slide"><a class="cardFill__link" href=""> <img class="cardFill__image" src="./images/upload/4.webp" alt=""/>
                                    <div class="cardFill__frame">
                                        <div class="cardFill__top">
                                            <div class="cardFill__comment">
                                                <svg class="icon icon-comment cardFill__commentIcon">
                                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                                </svg>
                                                <div class="cardFill__commentSize">12</div>
                                            </div>
                                        </div>
                                        <div class="cardFill__bottom">
                                            <div class="cardFill__date"> 4 часа назад &bull; Статьи
                                            </div>
                                            <div class="cardFill__name">Рынок NFT после хайпа продолжает развиваться</div>
                                        </div>
                                    </div></a></div>
                            <div class="cardFill newsSwiper__slide swiper-slide"><a class="cardFill__link" href=""> <img class="cardFill__image" src="./images/upload/5.webp" alt=""/>
                                    <div class="cardFill__frame">
                                        <div class="cardFill__top">
                                            <div class="cardFill__comment">
                                                <svg class="icon icon-comment cardFill__commentIcon">
                                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                                </svg>
                                                <div class="cardFill__commentSize">78</div>
                                            </div>
                                        </div>
                                        <div class="cardFill__bottom">
                                            <div class="cardFill__date"> 4 часа назад &bull; Статьи
                                            </div>
                                            <div class="cardFill__name">Майнинг биткоина: что ждет сектор в 2022 году?</div>
                                        </div>
                                    </div></a></div>
                            <div class="cardFill newsSwiper__slide swiper-slide"><a class="cardFill__link" href=""> <img class="cardFill__image" src="./images/upload/6.webp" alt=""/>
                                    <div class="cardFill__frame">
                                        <div class="cardFill__top">
                                            <div class="cardFill__comment">
                                                <svg class="icon icon-comment cardFill__commentIcon">
                                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                                </svg>
                                                <div class="cardFill__commentSize">10</div>
                                            </div>
                                        </div>
                                        <div class="cardFill__bottom">
                                            <div class="cardFill__date"> 4 часа назад &bull; Статьи
                                            </div>
                                            <div class="cardFill__name">Билеты будущего, или Как NFT решает главную проблему билетного рынка</div>
                                        </div>
                                    </div></a></div>
                            <div class="cardFill newsSwiper__slide swiper-slide"><a class="cardFill__link" href=""> <img class="cardFill__image" src="./images/upload/3.webp" alt=""/>
                                    <div class="cardFill__frame">
                                        <div class="cardFill__top">
                                            <div class="cardFill__comment">
                                                <svg class="icon icon-comment cardFill__commentIcon">
                                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                                </svg>
                                                <div class="cardFill__commentSize">12</div>
                                            </div>
                                        </div>
                                        <div class="cardFill__bottom">
                                            <div class="cardFill__date"> 4 часа назад &bull; Статьи
                                            </div>
                                            <div class="cardFill__name">Рынок NFT после хайпа продолжает развиваться</div>
                                        </div>
                                    </div></a></div>
                            <div class="cardFill newsSwiper__slide swiper-slide"><a class="cardFill__link" href=""> <img class="cardFill__image" src="./images/upload/2.webp" alt=""/>
                                    <div class="cardFill__frame">
                                        <div class="cardFill__top">
                                            <div class="cardFill__comment">
                                                <svg class="icon icon-comment cardFill__commentIcon">
                                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                                </svg>
                                                <div class="cardFill__commentSize">78</div>
                                            </div>
                                        </div>
                                        <div class="cardFill__bottom">
                                            <div class="cardFill__date"> 4 часа назад &bull; Статьи
                                            </div>
                                            <div class="cardFill__name">Майнинг биткоина: что ждет сектор в 2022 году?</div>
                                        </div>
                                    </div></a></div>
                            <div class="cardFill newsSwiper__slide swiper-slide"><a class="cardFill__link" href=""> <img class="cardFill__image" src="./images/upload/1.webp" alt=""/>
                                    <div class="cardFill__frame">
                                        <div class="cardFill__top">
                                            <div class="cardFill__comment">
                                                <svg class="icon icon-comment cardFill__commentIcon">
                                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                                </svg>
                                                <div class="cardFill__commentSize">10</div>
                                            </div>
                                        </div>
                                        <div class="cardFill__bottom">
                                            <div class="cardFill__date"> 4 часа назад &bull; Статьи
                                            </div>
                                            <div class="cardFill__name">Билеты будущего, или Как NFT решает главную проблему билетного рынка</div>
                                        </div>
                                    </div></a></div>
                        </div>
                    </div>
                </div>
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
                                                <use xlink:href="./images/sprite.svg#arrow-rt"></use>
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
                                                <use xlink:href="./images/sprite.svg#arrow-lb"></use>
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
                                                <use xlink:href="./images/sprite.svg#arrow-lb"></use>
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
                                                <use xlink:href="./images/sprite.svg#arrow-lb"></use>
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
                                                <use xlink:href="./images/sprite.svg#arrow-rt"></use>
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
                                <use xlink:href="./images/sprite.svg#info"></use>
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
                        <div class="tgBox__icon"> <img src="./images/tgBox/telegram.svg" alt=""></div>
                        <div class="tgBox__content">
                            <div class="tgBox__title">Подписывайтесь на наш Telegram канал</div>
                            <div class="tgBox__text">Новости крипторынка у вас в телефоне</div>
                        </div>
                    </div><a class="btn tgBox__button" href="https://t.me/SIGEN_Media" target="_blank">Подписаться </a>
                </div>
                <div class="recentComment module">
                    <div class="recentComment__title">
                        <div class="recentComment__titleIcon"><img src="./images/chatroom.svg" alt=""></div>
                        <div class="recentComment__titleText">Последние комментарии</div>
                    </div>
                    <div class="recentComment__list">
                        <div class="recentComment__item">
                            <div class="recentComment__author">
                                <div class="recentComment__avatar"> <img src="./images/upload/9.webp" alt=""></div>
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
                                <div class="recentComment__avatar"> <img src="./images/upload/9.webp" alt=""></div>
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
                                <div class="recentComment__avatar"> <img src="./images/upload/9.webp" alt=""></div>
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
                                <div class="recentComment__avatar"> <img src="./images/upload/9.webp" alt=""></div>
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
                                <div class="recentComment__avatar"> <img src="./images/upload/9.webp" alt=""></div>
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
                                <div class="newsCard__comment">
                                    <svg class="icon icon-comment newsCard__commentIcon">
                                        <use xlink:href="./images/sprite.svg#comment"></use>
                                    </svg>
                                    <div class="newsCard__commentSize">25</div>
                                </div>
                            </div>
                            <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$eduPost->category->name, $eduPost->slug]) }}">Читать полностью </a>
                                <div class="newsCard__timeRead">
                                    <svg class="icon icon-time newsCard__timeReadIcon">
                                        <use xlink:href="./images/sprite.svg#time"></use>
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
                    <div class="youtube__title">Наш YouTube канал</div><a class="btn btn--white youtube__channel" href="">Перейти на канал</a>
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
                        <div class="youtube__item swiper-slide"><a href="">
                                <div class="play">
                                    <div class="play__icon">
                                        <svg class="icon icon-play ">
                                            <use xlink:href="./images/sprite.svg#play"></use>
                                        </svg>
                                    </div>
                                    <div class="play__text">Посмотреть<br>на YouTube</div>
                                </div><img class="youtube__preview" src="./images/upload/7.webp" alt=""></a></div>
                        <div class="youtube__item swiper-slide"><a href="">
                                <div class="play">
                                    <div class="play__icon">
                                        <svg class="icon icon-play ">
                                            <use xlink:href="./images/sprite.svg#play"></use>
                                        </svg>
                                    </div>
                                    <div class="play__text">Посмотреть<br>на YouTube</div>
                                </div><img class="youtube__preview" src="./images/upload/8.webp" alt=""></a></div>
                        <div class="youtube__item swiper-slide"><a href="">
                                <div class="play">
                                    <div class="play__icon">
                                        <svg class="icon icon-play ">
                                            <use xlink:href="./images/sprite.svg#play"></use>
                                        </svg>
                                    </div>
                                    <div class="play__text">Посмотреть<br>на YouTube</div>
                                </div><img class="youtube__preview" src="./images/upload/3.webp" alt=""></a></div>
                        <div class="youtube__item swiper-slide"><a href="">
                                <div class="play">
                                    <div class="play__icon">
                                        <svg class="icon icon-play ">
                                            <use xlink:href="./images/sprite.svg#play"></use>
                                        </svg>
                                    </div>
                                    <div class="play__text">Посмотреть<br>на YouTube</div>
                                </div><img class="youtube__preview" src="./images/upload/4.webp" alt=""></a></div>
                    </div>
                </div>
            </div>
            <h2 class="h2 module__title">Популярное за эту неделю</h2>
            <div class="two-columns">
                <div class="newsCard">
                    <div class="newsCard__content">
                        <div class="newsCard__title"><a href="">EuroSwap EDEX презентовал команду и сразу перешел в основную фазу развития</a></div>
                        <div class="newsCard__info">
                            <div class="newsCard__date">5 января 2022</div>
                            <div class="newsCard__category">Обзоры</div>
                            <div class="newsCard__comment">
                                <svg class="icon icon-comment newsCard__commentIcon">
                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                </svg>
                                <div class="newsCard__commentSize">25</div>
                            </div>
                        </div>
                        <div class="newsCard__text">Европейский криптопроект EuroSwap EDEX, который в ноябре провел токенсейл EDEX, переходит в основную фазу развития. Напомним, что на старте развития проект привлек огромное внимание благодаря перспективной идее и практичной технологии.</div>
                        <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                            <div class="newsCard__timeRead">
                                <svg class="icon icon-time newsCard__timeReadIcon">
                                    <use xlink:href="./images/sprite.svg#time"></use>
                                </svg>
                                <div class="newsCard__timeReadText">Время на прочтение 15 мин.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="newsCard">
                    <div class="newsCard__content">
                        <div class="newsCard__title"><a href="">Смена тренда или ложный отскок: при каких условиях биткоин вырастет?</a></div>
                        <div class="newsCard__info">
                            <div class="newsCard__date">5 января 2022</div>
                            <div class="newsCard__category">Обзоры</div>
                            <div class="newsCard__comment">
                                <svg class="icon icon-comment newsCard__commentIcon">
                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                </svg>
                                <div class="newsCard__commentSize">12</div>
                            </div>
                        </div>
                        <div class="newsCard__text">Европейский криптопроект EuroSwap EDEX, который в ноябре провел токенсейл EDEX, переходит в основную фазу развития. Напомним, что на старте развития проект привлек огромное внимание благодаря перспективной идее и практичной технологии.</div>
                        <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                            <div class="newsCard__timeRead">
                                <svg class="icon icon-time newsCard__timeReadIcon">
                                    <use xlink:href="./images/sprite.svg#time"></use>
                                </svg>
                                <div class="newsCard__timeReadText">Время на прочтение 7 мин.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="newsCard">
                    <div class="newsCard__content">
                        <div class="newsCard__title"><a href="">EuroSwap EDEX презентовал команду и сразу перешел в основную фазу развития</a></div>
                        <div class="newsCard__info">
                            <div class="newsCard__date">5 января 2022</div>
                            <div class="newsCard__category">Обзоры</div>
                            <div class="newsCard__comment hot">
                                <svg class="icon icon-fire newsCard__commentIcon">
                                    <use xlink:href="./images/sprite.svg#fire"></use>
                                </svg>
                                <div class="newsCard__commentSize">90</div>
                            </div>
                        </div>
                        <div class="newsCard__text">Европейский криптопроект EuroSwap EDEX, который в ноябре провел токенсейл EDEX, переходит в основную фазу развития. Напомним, что на старте развития проект привлек огромное внимание благодаря перспективной идее и практичной технологии.</div>
                        <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                            <div class="newsCard__timeRead">
                                <svg class="icon icon-time newsCard__timeReadIcon">
                                    <use xlink:href="./images/sprite.svg#time"></use>
                                </svg>
                                <div class="newsCard__timeReadText">Время на прочтение 15 мин.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="newsCard">
                    <div class="newsCard__content">
                        <div class="newsCard__title"><a href="">Смена тренда или ложный отскок: при каких условиях биткоин вырастет?</a></div>
                        <div class="newsCard__info">
                            <div class="newsCard__date">5 января 2022</div>
                            <div class="newsCard__category">Обзоры</div>
                            <div class="newsCard__comment">
                                <svg class="icon icon-comment newsCard__commentIcon">
                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                </svg>
                                <div class="newsCard__commentSize">12</div>
                            </div>
                        </div>
                        <div class="newsCard__text">Европейский криптопроект EuroSwap EDEX, который в ноябре провел токенсейл EDEX, переходит в основную фазу развития. Напомним, что на старте развития проект привлек огромное внимание благодаря перспективной идее и практичной технологии.</div>
                        <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                            <div class="newsCard__timeRead">
                                <svg class="icon icon-time newsCard__timeReadIcon">
                                    <use xlink:href="./images/sprite.svg#time"></use>
                                </svg>
                                <div class="newsCard__timeReadText">Время на прочтение 7 мин.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="newsCard">
                    <div class="newsCard__content">
                        <div class="newsCard__title"><a href="">Смена тренда или ложный отскок: при каких условиях биткоин вырастет?</a></div>
                        <div class="newsCard__info">
                            <div class="newsCard__date">5 января 2022</div>
                            <div class="newsCard__category">Обзоры</div>
                            <div class="newsCard__comment">
                                <svg class="icon icon-comment newsCard__commentIcon">
                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                </svg>
                                <div class="newsCard__commentSize">12</div>
                            </div>
                        </div>
                        <div class="newsCard__text">Европейский криптопроект EuroSwap EDEX, который в ноябре провел токенсейл EDEX, переходит в основную фазу развития. Напомним, что на старте развития проект привлек огромное внимание благодаря перспективной идее и практичной технологии.</div>
                        <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                            <div class="newsCard__timeRead">
                                <svg class="icon icon-time newsCard__timeReadIcon">
                                    <use xlink:href="./images/sprite.svg#time"></use>
                                </svg>
                                <div class="newsCard__timeReadText">Время на прочтение 7 мин.</div>
                            </div>
                        </div>
                    </div>
                </div>
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

                                        <img id="home_subs_loading" src="/images/loading.gif" alt="">
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
            <div class="four-columns module">
                <div class="newsCard"><a class="newsCard__image" href=""><img src="./images/upload/2.webp" alt=""/></a>
                    <div class="newsCard__content">
                        <div class="newsCard__title"><a href="">EuroSwap EDEX презентовал команду и сразу перешел в основную фазу развития</a></div>
                        <div class="newsCard__info">
                            <div class="newsCard__date">5 января 2022</div>
                            <div class="newsCard__category">Обзоры</div>
                            <div class="newsCard__comment">
                                <svg class="icon icon-comment newsCard__commentIcon">
                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                </svg>
                                <div class="newsCard__commentSize">25</div>
                            </div>
                        </div>
                        <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                        </div>
                    </div>
                </div>
                <div class="newsCard"><a class="newsCard__image" href=""><img src="./images/upload/3.webp" alt=""/></a>
                    <div class="newsCard__content">
                        <div class="newsCard__title"><a href="">Смена тренда или ложный отскок: при каких условиях биткоин вырастет?</a></div>
                        <div class="newsCard__info">
                            <div class="newsCard__date">5 января 2022</div>
                            <div class="newsCard__category">Обзоры</div>
                            <div class="newsCard__comment">
                                <svg class="icon icon-comment newsCard__commentIcon">
                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                </svg>
                                <div class="newsCard__commentSize">12</div>
                            </div>
                        </div>
                        <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                        </div>
                    </div>
                </div>
                <div class="newsCard"><a class="newsCard__image" href=""><img src="./images/upload/4.webp" alt=""/></a>
                    <div class="newsCard__content">
                        <div class="newsCard__title"><a href="">EuroSwap EDEX презентовал команду и сразу перешел в основную фазу развития</a></div>
                        <div class="newsCard__info">
                            <div class="newsCard__date">5 января 2022</div>
                            <div class="newsCard__category">Обзоры</div>
                            <div class="newsCard__comment hot">
                                <svg class="icon icon-fire newsCard__commentIcon">
                                    <use xlink:href="./images/sprite.svg#fire"></use>
                                </svg>
                                <div class="newsCard__commentSize">90</div>
                            </div>
                        </div>
                        <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                        </div>
                    </div>
                </div>
                <div class="newsCard"><a class="newsCard__image" href=""><img src="./images/upload/5.webp" alt=""/></a>
                    <div class="newsCard__content">
                        <div class="newsCard__title"><a href="">Смена тренда или ложный отскок: при каких условиях биткоин вырастет?</a></div>
                        <div class="newsCard__info">
                            <div class="newsCard__date">5 января 2022</div>
                            <div class="newsCard__category">Обзоры</div>
                            <div class="newsCard__comment">
                                <svg class="icon icon-comment newsCard__commentIcon">
                                    <use xlink:href="./images/sprite.svg#comment"></use>
                                </svg>
                                <div class="newsCard__commentSize">12</div>
                            </div>
                        </div>
                        <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="">Читать полностью </a>
                        </div>
                    </div>
                </div>
            </div><a class="btn btn--white btn--more" href="">Еще </a>
        </div>
    </div>

@endsection
