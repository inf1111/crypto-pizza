@foreach($missedPosts->chunk(4) as $chunk)

    <div class="four-columns module">

        @foreach($chunk as $post)

            <div class="newsCard"><a class="newsCard__image" href="{{ route('post-show', [$post->category->name, $post->slug]) }}"><img src="/{{ $post->image }}" alt=""/></a>
                <div class="newsCard__content">
                    <div class="newsCard__title"><a href="{{ route('post-show', [$post->category->name, $post->slug]) }}">{{ $post->title }}</a></div>
                    <div class="newsCard__info">
                        <div class="newsCard__date">{{ $post->date_formatted }}</div>
                        <div class="newsCard__category">{{ $post->category->name_rus }}</div>
                        {{--<div class="newsCard__comment">
                            <svg class="icon icon-comment newsCard__commentIcon">
                                <use xlink:href="./images/sprite.svg#comment"></use>
                            </svg>
                            <div class="newsCard__commentSize">25</div>
                        </div>--}}
                    </div>
                    <div class="newsCard__footer"> <a class="btn btn--white newsCard__button" href="{{ route('post-show', [$post->category->name, $post->slug]) }}">Читать полностью </a>
                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endforeach

@if(isset($showLoadMoreBtn) && $showLoadMoreBtn == true)
    <span class="btn btn--white btn--more" id="loadMoreBtn">Еще </span>
@endif


