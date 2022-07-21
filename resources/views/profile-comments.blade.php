@inject('carbon', '\Illuminate\Support\Carbon')

@extends("layouts.main")
@section("content")

    <div class="container">
        <div class="breadcrumbs">
            <div class="breadcrumbs__item"> <a href="{{ route("home") }}">Главная     </a></div>
            <div class="breadcrumbs__separator">—</div>
            <div class="breadcrumbs__item"><span>Профиль пользователя</span></div>
        </div>
        <h1 class="page-title">Мои комментарии</h1>
        <div class="columns ai-start fld-column-md">
            <div class="profile-comments">

                @foreach($comments as $comment)

                    <div class="comment">
                        <div class="comment__header">
                            <div class="comment__avatar @if($comment->user->isOnline) online @endif">
                                <img src="
                                    @if(is_null($comment->user->avatar))
                                        /images/anon.png
                                    @else
                                        /{{ $comment->user->avatar }}
                                    @endif
                                "/>
                            </div>
                            <div class="comment__author">{{ $comment->user->NameForComments }}</div>
                            <div class="comment__bull"></div>
                            <div class="comment__time">{{ $carbon::parse($comment->created_at)->format('d.m.Y H:i') }}</div>
                            {{--<div class="comment__liked">
                                <svg class="icon icon-like is-active">
                                    <use xlink:href="/images/sprite.svg#like"></use>
                                </svg>
                                <div class="comment__liked-value positive">+10</div>
                                <svg class="icon icon-dislike ">
                                    <use xlink:href="/images/sprite.svg#dislike"></use>
                                </svg>
                            </div>--}}<a class="comment__post btn btn--white" href="{{ route('post-show', [$comment->post->category->name, $comment->post->slug]) }}">Перейти к статье </a>
                        </div>
                        <div class="comment__body">{{ $comment->text }}</div>
                        <div class="comment__footer">
                            {{--<div class="comment__reply">
                                <svg class="icon icon-reply ">
                                    <use xlink:href="/images/sprite.svg#reply"></use>
                                </svg>Ответить
                            </div>--}}
                            <div class="comment__action">
                                <a class="edit" href="">
                                    <svg class="icon icon-edit ">
                                        <use xlink:href="/images/sprite.svg#edit"></use>
                                    </svg>Редактировать
                                </a>
                                <a class="remove" href="#">
                                    <svg class="icon icon-remove ">
                                        <use xlink:href="/images/sprite.svg#remove"></use>
                                    </svg>Удалить
                                </a>
                            </div>
                        </div>
                    </div>

                @endforeach

                <div class="modal" data-modal="remove" data-simple="data-simple">
                    <div class="modal__wrapper">
                        <div class="modal__close">
                            <svg class="icon icon-remove ">
                                <use xlink:href="/images/sprite.svg#remove"></use>
                            </svg>
                        </div>
                        <div class="modal__title">Вы действительно хотите удалить свой комментарий?</div>
                        <div class="row"><a class="btn btn--orange submit" href="">Удалить навсегда</a><a class="btn btn--white cancel" href="">Нет</a></div>
                    </div>
                </div>

                <br>

                {{ $comments->links("paging") }}

                <br>

            </div>

            @include("includes.menus.profile-menu")

        </div>
    </div>

@endsection
