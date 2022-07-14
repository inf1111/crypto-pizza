@extends("layouts.main")
@section("content")

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__item"> <a href="">Главная     </a></div>
            <div class="breadcrumbs__separator">—</div>
            <div class="breadcrumbs__item"><span>Профиль пользователя</span></div>
        </div>
        <h1 class="page-title">Мой профиль</h1>
        <div class="columns ai-start fld-column-md">
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

            @include("includes.profile-menu")

        </div>

        <br><br><br>

    </div>

@endsection
