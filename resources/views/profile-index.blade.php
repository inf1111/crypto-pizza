@extends("layouts.main")
@section("content")

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__item"> <a href="">Главная     </a></div>
            <div class="breadcrumbs__separator">—</div>
            <div class="breadcrumbs__item"><span>Профиль пользователя</span></div>
        </div>
        <h1 class="page-title">Мой профиль</h1>
        <div class="columns">
            <div class="profile-form">

                <form action="{{ route("profile-update") }}" method="POST">
                    <h3 class="profile-form__title">Личные данные</h3>

                    @if (Session::has('success'))
                        <div class="alert-bootstrap-success">
                            Изменения сохранены
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert-bootstrap-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}&nbsp;
                            @endforeach
                        </div>
                    @endif

                    <div>
                        <div class="input-form">
                            <input
                                type="text"
                                name="name"
                                data-empty="true"
                                autocomplete="2sdf213"
                                placeholder="Ваше имя"
                                value="{{ old('name', auth()->user()->name) }}"
                                pattern="[^<]{2,30}"
                                oninvalid="this.setCustomValidity('Длина имени - от 2 до 30 символов')"
                                oninput="this.setCustomValidity('')"
                            />
                        </div>
                    </div>
                    {{--<div>
                        <div class="input-form">
                            <input type="text" name="" data-empty="true" autocomplete="off" placeholder="Логин"/>
                        </div>
                    </div>--}}
                    <div>
                        <div class="input-form">
                            <input
                                type="email"
                                name="email"
                                data-empty="true"
                                autocomplete="2sdf213"
                                placeholder="Ваш email"
                                value="{{ auth()->user()->email }}"
                                disabled
                            />
                        </div>
                    </div>
                    <h3 class="profile-form__title">Безопасность</h3>
                    <div>
                        <div class="input-form password">
                            <input
                                type="password"
                                name="pass"
                                data-empty="true"
                                autocomplete="new-password"
                                placeholder="Пароль"
                                pattern="[^<]{3,10}"
                                oninvalid="this.setCustomValidity('Длина пароля - от 3 до 10 символов')"
                                oninput="this.setCustomValidity('')"
                            />
                        </div>
                    </div>
                    <div>
                        <div class="input-form double-password">
                            <input
                                type="password"
                                name="pass_confirmation"
                                data-empty="true"
                                autocomplete="off"
                                placeholder="Подтверждение пароля"
                                pattern="[^<]{3,10}"
                                oninvalid="this.setCustomValidity('Длина пароля - от 3 до 10 символов')"
                                oninput="this.setCustomValidity('')"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="input-checkbox">
                            <div class="input-checkbox__input">
                                <input type="checkbox" name="subscribed" @if(auth()->user()->subscribed) checked @endif  />
                                <svg class="icon icon-check ">
                                    <use xlink:href="./images/sprite.svg#check"></use>
                                </svg>
                            </div><span>Подписаться на последние новости по Email</span>
                        </label>
                    </div>
                    <button class="btn btn--black" type="submit">Сохранить</button>
                </form>

            </div>
            <aside class="profile-menu">
                <ul class="profile-menu__list">
                    <li class="profile-menu__item"> <a class="profile-menu__link is-active" href="{{ route("profile-index") }}"><span class="profile-menu__icon">
                      <svg class="icon icon-user ">
                        <use xlink:href="./images/sprite.svg#user"></use>
                      </svg></span><span class="profile-menu__text">мой профиль </span></a></li>
                    {{--<li class="profile-menu__item"> <a class="profile-menu__link" href="./profile-comments.html"><span class="profile-menu__icon">
                      <svg class="icon icon-chat ">
                        <use xlink:href="./images/sprite.svg#chat"></use>
                      </svg></span><span class="profile-menu__text">мои комментарии<sup>176</sup></span></a></li>
                    <li class="profile-menu__item"> <a class="profile-menu__link" href="./profile-notify.html"><span class="profile-menu__icon">
                      <svg class="icon icon-notify ">
                        <use xlink:href="./images/sprite.svg#notify"></use>
                      </svg><span>12</span></span><span class="profile-menu__text">оповещения</span></a></li>--}}
                    <li class="profile-menu__item"> <a class="profile-menu__link" href="./profile-bookmarks.html"><span class="profile-menu__icon">
                      <svg class="icon icon-bookmark ">
                        <use xlink:href="./images/sprite.svg#bookmark"></use>
                      </svg></span><span class="profile-menu__text">мои закладки<sup>7</sup></span></a></li>
                    <li class="profile-menu__item"> <a class="profile-menu__link" href="{{ route("logout") }}"><span class="profile-menu__icon">
                      <svg class="icon icon-exit ">
                        <use xlink:href="./images/sprite.svg#exit"></use>
                      </svg></span><span class="profile-menu__text">Выход </span></a></li>
                </ul>

            </aside>

        </div>

        <br><br><br>

    </div>

@endsection
