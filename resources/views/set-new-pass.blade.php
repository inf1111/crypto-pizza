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
    <title>Crypto Pizza — лучший журнал о криптовалютах и блокчейн-технологии.</title>
    <meta data-n-head="ssr" name="description" content="Актуальные новости, сенсации, полезные статьи, интересные обзоры, аналитические прогнозы, интервью и многое другое из мира криптовалют.">
    <meta data-n-head="ssr" data-hid="og:description" property="og:description" content="Актуальные новости, сенсации, полезные статьи, интересные обзоры, аналитические прогнозы, интервью и многое другое из мира криптовалют.">
    <meta data-n-head="ssr" data-hid="og:title" property="og:title" content="Crypto Pizza — лучший журнал о криптовалютах и блокчейн-технологии.">
    <meta data-n-head="ssr" data-hid="og:image" property="og:image" content="https://pizza.wowcall.ru/images/pizza.png">

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/main2.css">
    <link rel="stylesheet" href="/css/subscribe.css">
    <link rel="stylesheet" href="/css/modals.css">

    <script type="text/javascript" src="https://yastatic.net/jquery/2.1.3/jquery.min.js"></script>

</head>

<body class="homepage is-active is-animate">

    <div class="modal is-active">
        <div class="modal__wrapper">
            <a href="/">
                <div class="modal__close">
                    <svg class="icon icon-remove ">
                        <use xlink:href="/images/sprite.svg#remove"></use>
                    </svg>
                </div>
            </a>
            <div class="modal__title">Установка нового пароля</div>
            <div class="login">
                <form action="{{ route("new-pass-set") }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="login__form">
                        <div>
                            <div class="input-form">
                                <input type="email" value="{{ old('email', (request()->has("email")) ? request()->email : "") }}" name="email" placeholder="Ваш e-mail" data-empty="true" autocomplete="sdffds" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" oninvalid="this.setCustomValidity('Введенный текст не является имейлом')" oninput="this.setCustomValidity('')" required />
                            </div>
                        </div>
                        <div>
                            <div class="input-form password">
                                <input type="password" name="password" placeholder="Новый пароль" data-empty="true" autocomplete="new-password" pattern="[^<]{3,10}" oninvalid="this.setCustomValidity('Длина пароля - от 3 до 10 символов')" oninput="this.setCustomValidity('')" required/>
                            </div>
                        </div>
                        <div>
                            <div class="input-form double-password">
                                <input type="password" name="password_confirmation" placeholder="Повторите пароль" data-empty="true" autocomplete="sdffаsdfds" pattern="[^<]{3,10}" oninvalid="this.setCustomValidity('Длина пароля - от 3 до 10 символов')" oninput="this.setCustomValidity('')" required />
                            </div>
                        </div>
                        <button class="btn btn--orange" type="submit">Далее</button>
                        <div id="modal_register_msg">

                            @if ($errors->any())

                                @foreach ($errors->all() as $error)
                                    {{ $error }}&nbsp;
                                @endforeach

                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div data-backdrop="overlay" class="overlay" id="set_new_pass_overlay"></div></body>

</body>
