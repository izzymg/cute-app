<!DOCTYPE html>
<html lang="en">
    <x-head></x-head>
    <body>
        @auth
        <div class="authed-banner">
            <span class="logged-in-text">You're logged in. </span>
            <a href="{{ route('dash') }}" class="">Dashboard</a>
        </div>
        @endauth
        <div class="site-grid">
            <main>
                <div class="articles-container">
                    @foreach ($posts as $post)
                        <article class="post-wrap">
                            <div class="post-date">
                                <span class="article-h">Article </span>
                                <span class="date">{{ $post->pretty_date }}</span>
                            </div>
                            <h3 class="post-title">
                                <a href="{{ route('post', [$post->id]) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="post-desc">{{ $post->text }}</p>
                            <a href="{{ route('post', [$post->id]) }}" class="read-article-link">Read article</a>
                        </article>
                    @endforeach
                </div>
            </main>
            <aside class="sidebar">
                <h1 class="main-heading">Izzy MG's Blog</h1>
                <p class="site-desc">
                    Hi! I'm Izzy Guethert, also known as Izzy MG. I write whatever I feel like here,
                    generally about web development and programming.
                </p>
                <p>
                    I currently specialize in e-learning and learning management systems (LMSs),
                    which I administrate, improving learner experience & accessibility.
                </p>
                <p>
                    My portfolio/home page is linked below.
                </p>
                <div class="links">
                    <a class="site-link" href="https://izzymg.dev">izzymg - home</a>
                    <a class="git-link" href="https://github.com/izzymg">github/izzymg</a>
                </div>
            </aside>
        </div>
    </body>
</html>
