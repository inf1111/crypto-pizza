<div class="newsCard__comment {{ $post->isHot ? "hot" : "" }}">
    <svg class="icon icon-comment newsCard__commentIcon">
        <use xlink:href="/images/sprite.svg#{{ $post->isHot ? "fire" : "comment" }}"></use>
    </svg>
    <div class="newsCard__commentSize">{{ $post->allComments->count() }}</div>
</div>
