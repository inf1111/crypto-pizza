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
            <div class="breadcrumbs__item"> <a href="">Главная     </a></div>
            <div class="breadcrumbs__separator">—</div>
            <div class="breadcrumbs__item"><span>Страница не найдена</span></div>
        </div>
        <div class="box-404">
            <div class="box-404__image"> <img src="/images/pizza3.webp" alt=""></div>
            <div class="box-404__content">
                <div class="box-404__title">Ошибка :(</div>
                <div class="box-404__text">К сожалению запрашиваемая страница не найдена. Возможно она была удалена, либо ее адрес был изменен. Попробуйте воспользоваться поиском.</div><a class="btn btn--orange" href="/">На главную </a>
            </div>
        </div>
    </div>

@endsection
