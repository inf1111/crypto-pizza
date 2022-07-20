<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#10cfe6">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="">
    <meta name="msapplication-TileColor" content="#10cfe6">
    <meta name="msapplication-TileImage" content="/images/favicons/mstile-144x144.png">
    <meta name="msapplication-config" content="/images/favicons/browserconfig.xml">

    <meta data-n-head="ssr" property="og:site_name" content="Crypto Pizza">
    <meta data-n-head="ssr" property="og:locale" content="ru_RU">
    @yield('meta')

    <link rel="shortcut icon" href="/images/favicons/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="48x48" href="/images/favicons/favicon-48x48.png">
    <link rel="manifest" href="/images/favicons/manifest.json">
    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="/images/favicons/apple-touch-icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" sizes="1024x1024" href="/images/favicons/apple-touch-icon-1024x1024.png">
    <link rel="icon" type="image/png" sizes="228x228" href="/images/favicons/coast-228x228.png">
    <link rel="yandex-tableau-widget" href="/images/favicons/yandex-browser-manifest.json">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/main2.css">
    <link rel="stylesheet" href="/css/subscribe.css">
    <link rel="stylesheet" href="/css/modals.css">


    <script type="text/javascript" src="https://yastatic.net/jquery/2.1.3/jquery.min.js"></script>

    {{--<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css'>
    <script src='https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js'></script>--}}

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <script>

        var config = {
            routes: {
                subscriberCreate: "{{ route('subscriber-create') }}",
                profileIndex: "{{ route('profile-index') }}",
                login: "{{ route('login') }}",
                register: "{{ route('register') }}",
            },
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

    </script>
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
</head>
<body class="homepage">
<div class="wrapper">
    <div class="wrapper__content">
        <header class="header">
            <div class="header__top">
                <div class="container">
                    <div class="header__row">
                        <div class="logo"> <a class="logo__link" href="/"> <img src="/images/logo/logo--white.svg" alt=""></a></div>
                        <div class="mainmenu">
                            <div class="mainmenu__list">
                                <div class="mainmenu__item {{ Route::is('home') ? 'is-active' : '' }}"><a href="{{ route("home") }}">Главная</a></div>
                                <div class="mainmenu__item {{ Route::is('cat-index') && Route::getCurrentRoute()->parameter('category') == "news" ? 'is-active' : '' }}"><a href="{{ route("cat-index", "news") }}">Новости</a></div>
                                <div class="mainmenu__item {{ Route::is('cat-index') && Route::getCurrentRoute()->parameter('category') == "articles" ? 'is-active' : '' }}"><a href="{{ route("cat-index", "articles") }}">Статьи</a></div>
                                <div class="mainmenu__item {{ Route::is('cat-index') && Route::getCurrentRoute()->parameter('category') == "reviews" ? 'is-active' : '' }}"><a href="{{ route("cat-index", "reviews") }}">Обзоры</a></div>
                            </div>
                        </div>
                        <div class="search">
                            <div class="search__button">
                                <svg class="icon icon-loop ">
                                    <use xlink:href="/images/sprite.svg#loop"></use>
                                </svg>
                            </div>
                            <form class="search__form" action="/search" method="GET">
                                <input type="search" name="q" placeholder="Введите поисковый запрос" minlength="3" required>
                                <button type="submit">
                                    <svg class="icon icon-loop ">
                                        <use xlink:href="/images/sprite.svg#loop"></use>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="tgStatus">
                            <div class="tgStatus__icon">
                                <svg class="icon icon-telegram ">
                                    <use xlink:href="/images/sprite.svg#telegram"></use>
                                </svg>
                                <div class="tgStatus__indicator is-animate"></div>
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
                        </div>

                        @guest

                            <div class="enter"> <a class="btn enter__btn btn--black login-btn" href="" data-modalshow="login">Войти</a><a class="btn enter__btn btn--orange register-btn" href="" data-modalshow="register">Зарегистрироваться</a>
                            </div>

                        @endguest
                        @auth

                            <div class="profile">

                                <a class="profile__notify" href="">
                                    <svg class="icon icon-notify ">
                                        <use xlink:href="/images/sprite.svg#notify"></use>
                                    </svg>{{--<span>12</span>--}}
                                </a>

                                <div class="profile__user"> <a class="profile__ava" href="{{ route("profile-index") }}">
                                    <img src="
                                        @if(is_null(Auth::user()->avatar))
                                                /images/anon.png
                                        @else
                                            /{{ Auth::user()->avatar }}
                                        @endif
                                    " alt=""></a>
                                    <div class="profile__btn">Профиль
                                        <svg class="icon icon-arrow-left ">
                                            <use xlink:href="/images/sprite.svg#arrow-left"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="profile__drop">

                                    <a class="profile__link" href="{{ route("profile-index") }}">
                                        <svg class="icon icon-user ">
                                            <use xlink:href="/images/sprite.svg#user"></use>
                                        </svg>
                                        <span>Мой профиль</span>
                                    </a>

                                    {{--<a class="profile__link" href="/profile-comments.html">
                                        <svg class="icon icon-chat ">
                                            <use xlink:href="/images/sprite.svg#chat"></use>
                                        </svg>
                                        <span>Мои комментарии <sup>176</sup></span>
                                    </a>--}}

                                    <a class="profile__link" href="{{ route("profile-bookmarks") }}">
                                        <svg class="icon icon-bookmark ">
                                            <use xlink:href="/images/sprite.svg#bookmark"></use>
                                        </svg>
                                        <span>Мои закладки <sup>{{ Auth::user()->bookmarkedPosts->count() }}</sup></span>
                                    </a>

                                </div>
                            </div>
                            <div class="enter"> <a class="btn enter__btn btn--black" href="{{ route("logout") }}">Выйти</a>
                            </div>

                        @endauth

                    </div>
                    <div class="header__mobile"> <a class="hamburger hamburger--js" href="#"><span></span></a>
                        <div class="logo"> <a class="logo__link" href="/"> <img src="/images/logo/logo--white.svg" alt=""></a></div>
                        <div class="search">
                            <div class="search__button">
                                <svg class="icon icon-loop ">
                                    <use xlink:href="/images/sprite.svg#loop"></use>
                                </svg>
                            </div>
                            <form class="search__form" action="/search" method="GET">
                                <input type="search" name="q" placeholder="Введите поисковый запрос" minlength="3" required>
                                <button type="submit">
                                    <svg class="icon icon-loop ">
                                        <use xlink:href="/images/sprite.svg#loop"></use>
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <div class="header__mobile-drop">
                            <div class="mainmenu">
                                <div class="mainmenu__list">
                                    <div class="mainmenu__item {{ Route::is('home') ? 'is-active' : '' }}">
                                        <a href="{{ route("home") }}">Главная</a>
                                    </div>
                                    <div class="mainmenu__item {{ Route::is('cat-index') && Route::getCurrentRoute()->parameter('category') == "news" ? 'is-active' : '' }}">
                                        <a href="{{ route("cat-index", "news") }}">Новости</a>
                                    </div>
                                    <div class="mainmenu__item {{ Route::is('cat-index') && Route::getCurrentRoute()->parameter('category') == "articles" ? 'is-active' : '' }}">
                                        <a href="{{ route("cat-index", "articles") }}">Статьи</a>
                                    </div>
                                    <div class="mainmenu__item {{ Route::is('cat-index') && Route::getCurrentRoute()->parameter('category') == "reviews" ? 'is-active' : '' }}">
                                        <a href="{{ route("cat-index", "reviews") }}">Обзоры</a>
                                    </div>
                                </div>
                            </div>
                            <div class="enter"> <a class="btn enter__btn btn--black login-btn" href="" data-modalshow="login">Войти</a><a class="btn enter__btn btn--orange register-btn" href="" data-modalshow="register">Зарегистрироваться</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__bottom">
                <div class="container">
                    <div class="cat-list">
                        <button class="btn btn--black cat-list__button">Категории</button>
                        <div class="cat-list__list">
                            @foreach($cats as $cat)
                                <div class="cat-list__item"><a class="cat-list__link" href="{{ route("cat-index", [$cat->name]) }}">{{ $cat->name_rus }}</a></div>
                            @endforeach
                            {{--<div class="cat-list__more">
                                <svg class="icon icon-more ">
                                    <use xlink:href="/images/sprite.svg#more"></use>
                                </svg>
                                <div class="cat-list__drop">
                                    <div class="cat-list__item"><a class="cat-list__link" href="">Далеко-далеко, за.</a></div>
                                    <div class="cat-list__item"><a class="cat-list__link" href="">Имени, диких.</a></div>
                                    <div class="cat-list__item"><a class="cat-list__link" href="">Страну, рыбными?</a></div>
                                    <div class="cat-list__item"><a class="cat-list__link" href="">Выйти, единственное!</a></div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

    </div>
    <footer class="footer">
        <div class="subscribe">
            <div class="container">
                <form action="" id="footer_subs_form">
                    <div class="subscribe__row">
                        <div class="subscribe__content">
                            <div class="column">
                                <div class="subscribe__title">Будьте в курсе последних событий</div>
                                <div class="subscribe__text">Каждую неделю все самое важное из крипто-мира у вас на почте. Без спама!</div>
                            </div>
                        </div>
                        <div class="subscribe__form">
                            <div class="subscribe__field">
                                <div class="input-form with-icon">
                                    <svg class="icon icon-mail input-form__icon">
                                        <use xlink:href="/images/sprite.svg#mail"></use>
                                    </svg>

                                    <input
                                        id="footer_subs_input"
                                        type="text"
                                        pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"
                                        oninvalid="this.setCustomValidity('Введенный текст не является имейлом')"
                                        oninput="this.setCustomValidity('')"
                                    >
                                    <label>Ваш email</label>

                                    <div id="footer_subs_msg">
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
        <div class="footer__top">
            <div class="container">
                <div class="row ai-str jcsb">
                    <div class="mainmenu">
                        <ul class="mainmenu__list">
                            <li class="mainmenu__item {{ Route::is('home') ? 'is-active' : '' }}">
                                <a href="{{ route("home") }}">Главная</a>
                            </li>
                            <li class="mainmenu__item {{ Route::is('cat-index') && Route::getCurrentRoute()->parameter('category') == "news" ? 'is-active' : '' }}">
                                <a href="{{ route("cat-index", "news") }}">Новости</a>
                            </li>
                            <li class="mainmenu__item {{ Route::is('cat-index') && Route::getCurrentRoute()->parameter('category') == "articles" ? 'is-active' : '' }}">
                                <a href="{{ route("cat-index", "articles") }}">Статьи</a>
                            </li>
                            <li class="mainmenu__item {{ Route::is('cat-index') && Route::getCurrentRoute()->parameter('category') == "reviews" ? 'is-active' : '' }}">
                                <a href="{{ route("cat-index", "reviews") }}">Обзоры</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer__social">
                        <div class="footer__socialText">Наши соц. сети:</div>
                        <div class="social"> <a class="social__link" href="https://twitter.com/i/flow/consent_flow" target="_blank">
                            <svg class="icon icon-twitter ">
                                <use xlink:href="/images/sprite.svg#twitter"></use>
                            </svg></a><a class="social__link" href="https://t.me/SIGEN_Media" target="_blank">
                            <svg class="icon icon-telegram ">
                                <use xlink:href="/images/sprite.svg#telegram"></use>
                            </svg></a><a class="social__link" href="https://www.facebook.com/Media.SIGEN.pro" target="_blank">
                            <svg class="icon icon-facebook ">
                                <use xlink:href="/images/sprite.svg#facebook"></use>
                            </svg></a><a class="social__link" href="https://vk.com/media_sigen_pro" target="_blank">
                            <svg class="icon icon-vk ">
                                <use xlink:href="/images/sprite.svg#vk"></use>
                            </svg></a><a class="social__link" href="https://www.instagram.com/media.sigen.pro/" target="_blank">
                            <svg class="icon icon-insta ">
                                <use xlink:href="/images/sprite.svg#insta"></use>
                            </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="row aic jcsb">
                    <div class="logo"> <a class="logo__link" href="/"> <img src="/images/logo/logo--black.svg" alt=""></a></div>
                    <div class="footer__text">
                        <p>CryptoPizza.news © 2020-2022 Авторские материалы!</p>
                        <p>При копировании материалов активная ссылка на сайт обязательна!</p>
                    </div>
                    <div class="footer__logos">
                        <div class="footer__logos-item"><img src="/images/blockchain.svg" alt=""></div>
                    </div>
                    <div class="footer__links">
                        <p><a href="">Условия использования сайта</a></p>
                        <p> <a href="">Политика конфиденциальности</a></p>
                        <p> <a href="">White paper Bitcoin  </a></p>
                    </div>
                    <div class="footer__write">
                        <p>По всем вопросам пишите:</p>
                        <p><a class="btn btn--white" href="" data-modalshow="contact-us">Связаться с нами </a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<div class="modal" data-modal="login" data-simple="data-simple">
    <div class="modal__wrapper">
        <div class="modal__close">
            <svg class="icon icon-remove ">
                <use xlink:href="/images/sprite.svg#remove"></use>
            </svg>
        </div>
        <div class="modal__title">Войти в личный кабинет</div>
        <div class="login">
            <div class="login__social">
                <div class="login__social-text">Вход с помощью социальных сетей:</div>
                <div class="login__social-icons"> <a class="login__social-link" href="#" onclick="return false;" style="background-color:#1DA1F2">
                        <svg class="icon icon-twitter ">
                            <use xlink:href="/images/sprite.svg#twitter"></use>
                        </svg></a><a class="login__social-link" href="#" onclick="return false;" style="background-color:#1C257B">
                        <svg class="icon icon-facebook ">
                            <use xlink:href="/images/sprite.svg#facebook"></use>
                        </svg></a><a class="login__social-link" href="#" onclick="return false;" style="background-color:#5181B8">
                        <svg class="icon icon-vk ">
                            <use xlink:href="/images/sprite.svg#vk"></use>
                        </svg></a><a class="login__social-link" href="#" onclick="return false;" style="background-color:#DD4B39">
                        <svg class="icon icon-google ">
                            <use xlink:href="/images/sprite.svg#google"></use>
                        </svg></a></div>
            </div>
            <form action="" id="modal_enter_form">
                <div class="login__form">
                    <div>
                        <div class="input-form">
                            <input type="email" name="" id="modal_enter_inp_email" data-empty="true" placeholder="Ваш email" data-empty="true" autocomplete="dsfdsfdsf" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" oninvalid="this.setCustomValidity('Введенный текст не является имейлом')" oninput="this.setCustomValidity('')" required />
                        </div>
                    </div>
                    <div>
                        <div class="input-form">
                            <input type="password" name="" id="modal_enter_inp_pass" data-empty="true" placeholder="Пароль" data-empty="true" autocomplete="new-password" pattern="[^<]{3,10}" oninvalid="this.setCustomValidity('Длина пароля - от 3 до 10 символов')" oninput="this.setCustomValidity('')" required />
                        </div>
                    </div>
                    <div><a class="lost-pass" href="#" onclick="return false;">Я забыл пароль :( </a></div>
                    <button class="btn btn--orange" type="submit">Войти</button>
                    <div id="modal_enter_msg"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" data-modal="register" data-simple="data-simple">
    <div class="modal__wrapper">
        <div class="modal__close">
            <svg class="icon icon-remove ">
                <use xlink:href="/images/sprite.svg#remove"></use>
            </svg>
        </div>
        <div class="modal__title">Регистрация</div>
        <div class="login__social">
            <div class="login__social-text">Зарегистрироваться с помощью социальных сетей:</div>
            <div class="login__social-icons"> <a class="login__social-link" href="" style="background-color:#1DA1F2">
                    <svg class="icon icon-twitter ">
                        <use xlink:href="/images/sprite.svg#twitter"></use>
                    </svg></a><a class="login__social-link" href="" style="background-color:#1C257B">
                    <svg class="icon icon-facebook ">
                        <use xlink:href="/images/sprite.svg#facebook"></use>
                    </svg></a><a class="login__social-link" href="" style="background-color:#5181B8">
                    <svg class="icon icon-vk ">
                        <use xlink:href="/images/sprite.svg#vk"></use>
                    </svg></a><a class="login__social-link" href="" style="background-color:#DD4B39">
                    <svg class="icon icon-google ">
                        <use xlink:href="/images/sprite.svg#google"></use>
                    </svg></a></div>
            <form action="" id="modal_register_form">
                <div class="login__form">
                    <div>или:</div>
                    <div>
                        <div class="input-form">
                            <input type="email" name="" id="modal_register_inp_email" placeholder="Ваш email" data-empty="true" autocomplete="sdffds" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" oninvalid="this.setCustomValidity('Введенный текст не является имейлом')" oninput="this.setCustomValidity('')" required />
                        </div>
                    </div>
                    {{--<div>
                        <div class="input-form">
                            <input type="text" name="" data-empty="true" autocomplete="off"/>
                            <label>Логин</label>
                        </div>
                    </div>--}}
                    <div>
                        <div class="input-form password">
                            <input type="password" name="" id="modal_register_inp_pass" placeholder="Пароль" data-empty="true" autocomplete="new-password" pattern="[^<]{3,10}" oninvalid="this.setCustomValidity('Длина пароля - от 3 до 10 символов')" oninput="this.setCustomValidity('')" required/>
                        </div>
                    </div>
                    <div>
                        <div class="input-form double-password">
                            <input type="password" name="" id="modal_register_inp_pass_repeat" placeholder="Повторите пароль" data-empty="true" autocomplete="sdffаsdfds" pattern="[^<]{3,10}" oninvalid="this.setCustomValidity('Длина пароля - от 3 до 10 символов')" oninput="this.setCustomValidity('')" required />
                        </div>
                    </div>
                    <button class="btn btn--orange" type="submit">Зарегистрироваться</button>
                    <div id="modal_register_msg"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" data-modal="restore-1" data-simple="data-simple">
    <div class="modal__wrapper">
        <div class="modal__close">
            <svg class="icon icon-remove ">
                <use xlink:href="/images/sprite.svg#remove"></use>
            </svg>
        </div>
        <div class="modal__title">Восстановление пароля</div>
        <div class="login">
            <form action="" id="modal_restore_1_form">
                <div class="login__form">
                    <div>
                        <div class="input-form">
                            <input type="email" name="" id="modal_restore_1_inp_email" placeholder="Ваш email" data-empty="true" autocomplete="sdffds" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" oninvalid="this.setCustomValidity('Введенный текст не является имейлом')" oninput="this.setCustomValidity('')" required />
                        </div>
                    </div>
                    <button class="btn btn--orange" type="submit">Далее</button>
                    <div id="modal_restore_1_msg"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" data-modal="restore-2" data-simple="data-simple">
    <div class="modal__wrapper">
        <div class="modal__close">
            <svg class="icon icon-remove ">
                <use xlink:href="/images/sprite.svg#remove"></use>
            </svg>
        </div>
        <div class="modal__title">Восстановление пароля</div>
        <div class="login">
            <div class="login__content">Вам на почту было отправлено письмо с дальнейшими инструкциями по восстановлению пароля.</div>
        </div>
    </div>
</div>
<div class="modal" data-modal="register-ok" data-simple="data-simple">
    <div class="modal__wrapper">
        <div class="modal__close">
            <svg class="icon icon-remove ">
                <use xlink:href="/images/sprite.svg#remove"></use>
            </svg>
        </div>
        <div class="modal__title">Регистрация успешна</div>
        <svg class="icon icon-ok modal-icon">
            <use xlink:href="/images/sprite.svg#ok"></use>
        </svg>
        <div class="login">
            <div class="login__content">Теперь вы можете войти в личный кабинет и пользоваться всеми преимуществами сайта!</div><a class="btn btn--orange">Войти</a>
        </div>
    </div>
</div>
<div class="modal" data-modal="contact-us" data-simple="data-simple">
    <div class="modal__wrapper">
        <div class="modal__close">
            <svg class="icon icon-remove ">
                <use xlink:href="/images/sprite.svg#remove"></use>
            </svg>
        </div>
        <div class="modal__title">Связаться с нами</div>
        <div class="modal__content">Пишите нам на e-mail <a href="mailto:info@crypto-pizza.ru">info@crypto-pizza.ru</a> или свяжитесь с нами через telegram канал:</div><a class="btn btn--black" href="https://t.me/SIGEN_Media" target="_blank">
            <svg class="icon icon-telegram ">
                <use xlink:href="/images/sprite.svg#telegram"></use>
            </svg><span>Перейти в канал  </span></a>
    </div>
</div><a class="go-top go-top--js" href="#">
    <svg class="icon icon-arrow-up ">
        <use xlink:href="/images/sprite.svg#arrow-up"></use>
    </svg></a>

<div id="loading_circle" style="position: fixed; z-index: 1000; top: 50%; left: 50%; margin-left: -15px; margin-top: -15px; display: none">
    <img id="" src="/images/loading.gif" alt="" style="width:30px; height:30px">
</div>

@yield('scripts')

<script src="/js/main.js"></script>
<script src="/js/simplebar.js"></script>

<script src="/js/subscribe.js"></script>
<script src="/js/modals.js"></script>

@yield('scriptssafter')

</body>
</html>
