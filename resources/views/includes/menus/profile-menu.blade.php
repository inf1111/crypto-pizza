<aside class="profile-menu">
    <ul class="profile-menu__list">
        <li class="profile-menu__item"> <a class="profile-menu__link {{ Route::is('profile-index') ? 'is-active' : '' }}" href="{{ route("profile-index") }}"><span class="profile-menu__icon">
          <svg class="icon icon-user ">
            <use xlink:href="/images/sprite.svg#user"></use>
          </svg></span><span class="profile-menu__text">мой профиль </span></a></li>
        <li class="profile-menu__item"> <a class="profile-menu__link {{ Route::is('profile-comments') ? 'is-active' : '' }}" href="{{ route("profile-comments") }}"><span class="profile-menu__icon">
          <svg class="icon icon-chat ">
            <use xlink:href="/images/sprite.svg#chat"></use>
          </svg></span><span class="profile-menu__text">мои комментарии<sup>{{ Auth::user()->comments->count() }}</sup></span></a></li>
        {{--<li class="profile-menu__item"> <a class="profile-menu__link" href="/profile-notify.html"><span class="profile-menu__icon">
          <svg class="icon icon-notify ">
            <use xlink:href="/images/sprite.svg#notify"></use>
          </svg><span>12</span></span><span class="profile-menu__text">оповещения</span></a></li>--}}
        <li class="profile-menu__item"> <a class="profile-menu__link {{ Route::is('profile-bookmarks') ? 'is-active' : '' }}" href="{{ route("profile-bookmarks") }}"><span class="profile-menu__icon">
          <svg class="icon icon-bookmark ">
            <use xlink:href="/images/sprite.svg#bookmark"></use>
          </svg></span><span class="profile-menu__text">мои закладки<sup>{{ Auth::user()->bookmarkedPosts->count() }}</sup></span></a></li>
        <li class="profile-menu__item"> <a class="profile-menu__link" href="{{ route("logout") }}"><span class="profile-menu__icon">
          <svg class="icon icon-exit ">
            <use xlink:href="/images/sprite.svg#exit"></use>
          </svg></span><span class="profile-menu__text">Выход </span></a></li>
    </ul>
</aside>
