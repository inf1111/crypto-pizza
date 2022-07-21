<div class="youtube youtube--widget module">
    <div class="youtube__header"><img class="youtube__headerIcon" src="/images/youtube/youtube.svg" alt="">
        <div class="youtube__title">Наш YouTube канал</div>
    </div>
    <div class="youtube__list">

        @foreach($youTubeLinks as $link)

            <div class="youtube__el"><a href="{{ $link->url }}" target="_blank"><img class="youtube__preview" src="/{{ $link->image }}" alt="">
                    <div class="youtube__text">{{ $link->title }}</div></a>
            </div>

        @endforeach

    </div>
    <div class="youtube__more"> <a href="https://www.youtube.com/c/cartons" target="_blank">Перейти на канал </a></div>
</div>
