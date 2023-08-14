<article class="d-flex flex-column">

    <div class="post-img">

        <img src="/storage/BlogImages/{{ $blog->image }}" style="width: 400px; height: 300px " >
    </div>

    <h2 class="title">
        <a href="/blog/{{ $blog->id }}">title of the blog : {{ $blog->title }}</a>
    </h2>

    <div class="meta-top">
        <ul>
            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">author of the blog : {{ $blog->name }}</a></li>
            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#">date of publish : {{ $blog->date }}</a></li>
            <li class="d-flex align-items-center">
                <i class="bi bi-chat-dots"></i>
                @if ($blog->comments->count() === 0)
                    <a href="#">none</a>
                @else
                    <a href="#"> number of comments : {{ $blog->comments->count() }}</a>
                @endif
            </li>
        </ul>
    </div>

    <div class="content">
        <p>
           blog description : {{ $blog->description }}</p>
    </div>



</article>
