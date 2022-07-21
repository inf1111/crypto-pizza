@foreach($replies as $reply)

    <div class="post-comment__reply show">
        <div class="comment reply is-active">
            <div class="comment__header">
                <div class="comment__avatar @if($reply->user->isOnline) online @endif"><img src="
                    @if(is_null($reply->user->avatar))
                        /images/anon.png
                    @else
                        /{{ $reply->user->avatar }}
                    @endif
                        "/></div>
                <div class="comment__author">{{ $reply->user->NameForComments }}</div>
                <div class="comment__bull"></div>
                <div class="comment__time">{{ $carbon::parse($reply->created_at)->format('d.m.Y H:i') }}</div>
                {{--<div class="comment__liked">
                    <svg class="icon icon-like ">
                        <use xlink:href="/images/sprite.svg#like"></use>
                    </svg>
                    <div class="comment__liked-value negative">-18</div>
                    <svg class="icon icon-dislike is-active">
                        <use xlink:href="/images/sprite.svg#dislike"></use>
                    </svg>
                </div>--}}
            </div>
            <div class="comment__body">{{ $reply->text }}</div>
            <div class="comment__footer">

                @auth

                    <a href="#writeCommentAnchor" class="replyLink" data-commentId="{{ $reply->id }}">
                        <div class="comment__reply">
                            <svg class="icon icon-reply ">
                                <use xlink:href="/images/sprite.svg#reply"></use>
                            </svg>Ответить
                        </div>
                    </a>

                @endauth

            </div>
        </div>
    </div>

    @include('includes.replies', ['replies' => $reply->replies])

@endforeach


