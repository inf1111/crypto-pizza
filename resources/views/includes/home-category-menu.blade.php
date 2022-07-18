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
    </div>--}}
    <div class="pizzaBox module module--sidebar">
        <div class="pizzaBox__header">
            <div class="pizzaBox__title">Пицца Laszlo</div>
            <a href="https://www.coindesk.com/learn/what-is-bitcoin-pizza-day/" target="_blank">
                <div class="pizzaBox__info">
                    <svg class="icon icon-info ">
                        <use xlink:href="./images/sprite.svg#info"></use>
                    </svg>
                </div>
            </a>
        </div>
        <div class="pizzaBox__btc">10 000 BTC</div>
        <div class="pizzaBox__text">Стоимость пиццы Ласло на сегодняшний день составляет:</div>
        <div class="pizzaBox__price">$ {{ $pizzaPrice }}</div>
        <div class="pizzaBox__counter">До Bitcoin Pizza Day еще {{ trans_choice("main.days_to_pizza", $daysToPizzaDay) }}</div>
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
    {{--<div class="recentComment module">
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
    </div>--}}
</aside>
