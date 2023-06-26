<article class="d-flex flex-column">

    <div class="post-img">

        <img src="/storage/BlogImages/{{ $blog->image }}" style="width: 400px; height: 300px " >
    </div>

    <h2 class="title">
        <a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a>
    </h2>

    <div class="meta-top">
        <ul>
            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ $blog->name }}</a></li>
            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#">{{ $blog->date }}</a></li>
            <li class="d-flex align-items-center">
                <i class="bi bi-chat-dots"></i>
                @if ($blog->comments->count() === 0)
                    <a href="#">none</a>
                @else
                    <a href="#">{{ $blog->comments->count() }}</a>
                @endif
            </li>
        </ul>
    </div>

    <div class="content">
        <p>
            {{ $blog->description }}</p>
    </div>

    <div class="read-more mt-auto align-self-end">
        <a href="/blog/{{ $blog->slug }}">Read More <i class="bi bi-arrow-right"></i></a>
    </div>

</article>
