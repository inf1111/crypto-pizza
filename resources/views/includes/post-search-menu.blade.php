<aside class="sidebar">
    {{--<div class="currency module">
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
    </div>--}}
    <div class="tgBox module module--sidebar">
        <div class="tgBox__row">
            <div class="tgBox__icon"> <img src="/images/tgBox/telegram.svg" alt=""></div>
            <div class="tgBox__content">
                <div class="tgBox__title">Подписывайтесь на наш Telegram канал</div>
                <div class="tgBox__text">Новости крипторынка у вас в телефоне</div>
            </div>
        </div><a class="btn tgBox__button" href="https://t.me/SIGEN_Media" target="_blank">Подписаться </a>
    </div>
    <div class="youtube youtube--widget module">
        <div class="youtube__header"><img class="youtube__headerIcon" src="/images/youtube/youtube.svg" alt="">
            <div class="youtube__title">Наш YouTube канал</div>
        </div>
        <div class="youtube__list">

            @foreach($youTubeLinks as $link)

                <div class="youtube__el"><a href="{{ $link->url }}" target="_blank"><img class="youtube__preview" src="/{{ $link->image }}" alt="">
                        <div class="youtube__text">{{ $link->title }}</div></a>
                </div>

            @endforeach

        </div>
        <div class="youtube__more"> <a href="https://www.youtube.com/c/cartons" target="_blank">Перейти на канал </a></div>
    </div>
</aside>
