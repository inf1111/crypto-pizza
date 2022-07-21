<div class="cardFill__comment {{ $post->isHot ? "hot" : "" }}">
    <svg class="icon icon-fire cardFill__commentIcon">
        <use xlink:href="/images/sprite.svg#{{ $post->isHot ? "fire" : "comment" }}"></use>
    </svg>
    <div class="cardFill__commentSize">{{ $post->allComments->count() }}</div>
</div>
