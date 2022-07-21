<div class="recentComment module">
    <div class="recentComment__title">
        <div class="recentComment__titleIcon"><img src="/images/chatroom.svg" alt=""></div>
        <div class="recentComment__titleText">{{ $title }}</div>
    </div>
    <div class="recentComment__list">

        @foreach($comments4menu as $comm)

            <div class="recentComment__item">
                <div class="recentComment__author">
                    <div class="recentComment__avatar @if($comm->user->isOnline) online @endif">
                        <img src="
                            @if(is_null($comm->user->avatar))
                                /images/anon.png
                            @else
                                /{{ $comm->user->avatar }}
                            @endif
                        "/>
                    </div>
                    <div class="recentComment__name">
                        <div class="name">{{ $comm->user->NameForComments }}</div>
                        <div class="time">{{ $carbon::parse($comm->created_at)->format('d.m.Y H:i') }}</div>
                    </div>
                </div>
                <div class="recentComment__text">{{ $comm->text }}</div>
                <div class="recentComment__link">К статье: <a href="{{ route('post-show', [$comm->post->category->name, $comm->post->slug]) }}">{{ $comm->post->title }}</a></div>
            </div>

        @endforeach

    </div>
</div>
