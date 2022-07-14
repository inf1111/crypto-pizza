@extends("layouts.main")
@section("content")

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__item"> <a href="">Главная     </a></div>
            <div class="breadcrumbs__separator">—</div>
            <div class="breadcrumbs__item"><span>Профиль пользователя</span></div>
        </div>
        <h1 class="page-title">Мои закладки</h1>
        <div class="columns ai-start fld-column-md">

            @if($bookmarkedPosts->count() > 0)

                <div class="profile-bookmarks">

                    @foreach($bookmarkedPosts as $post)

                        <div class="newsCard module bookmark"><a class="newsCard__image" href="{{ route('post-show', [$post->category->name, $post->slug]) }}"><img src="/{{ $post->image }}" alt=""/></a>
                            <div class="newsCard__content">
                                <div class="newsCard__title"><a href="{{ route('post-show', [$post->category->name, $post->slug]) }}">{{ $post->title }}</a></div>
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
                                <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$post->category->name, $post->slug]) }}">Читать полностью </a>
                                    <div class="newsCard__timeRead">
                                        <svg class="icon icon-time newsCard__timeReadIcon">
                                            <use xlink:href="/images/sprite.svg#time"></use>
                                        </svg>
                                        <div class="newsCard__timeReadText">Время на прочтение 15 мин.</div>
                                    </div><a class="newsCard__bookmark @if($post->bookmarked) is-active @endif" href="{{ route("toggle-bookmark", ["post_id" => $post->id]) }}"><span class="newsCard__bookmark-icon">
                            <svg class="icon icon-bookmark ">
                              <use xlink:href="/images/sprite.svg#bookmark"></use>
                            </svg></span><span class="newsCard__bookmark-text">Удалить из закладок </span></a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

            @else

                <div class="profile-notify profile-notify--empty wide"><img src="/images/pizza2.webp" alt="">
                    <p>У вас пока нет закладок</p>
                </div>

            @endif

            @include("includes.profile-menu")

        </div>
    </div>

@endsection
