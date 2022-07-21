<div class="newsFeed__comment {{ $post->isHot ? "hot" : "" }}">
    <svg class="icon icon-comment newsFeed__commentIcon">
        <use xlink:href="/images/sprite.svg#{{ $post->isHot ? "fire" : "comment" }}"></use>
    </svg>
    <div class="newsFeed__commentSize">{{ $post->allComments->count() }}</div>
</div>
