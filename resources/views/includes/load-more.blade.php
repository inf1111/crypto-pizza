@foreach($missedPosts->chunk(4) as $chunk)

    <div class="four-columns module">

        @foreach($chunk as $post)

            <div class="newsCard"><a class="newsCard__image" href="{{ route('post-show', [$post->category->name, $post->slug]) }}"><img src="/{{ $post->image }}" alt=""/></a>
                <div class="newsCard__content">
                    <div class="newsCard__title"><a href="{{ route('post-show', [$post->category->name, $post->slug]) }}">{{ $post->title }}</a></div>
                    <div class="newsCard__info">
                        <div class="newsCard__date">{{ $post->date_formatted }}</div>
                        <div class="newsCard__category">{{ $post->category->name_rus }}</div>

                        @include("includes.comments.newscard-comment", ['post' => $post])

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


