<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Izzy MG's Blog</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/app.css">

        <style>
            body {
                font-family: "Nunito";
            }
        </style>
    </head>
    <body class="">
        @auth
        <div class="authed-banner">
            <span class="logged-in-text">You're logged in. </span>
            <a href="{{ route('dash') }}" class="">Dashboard</a>
        </div>
        @endauth
        <main class="main">
            <h1 class="main-heading">Izzy MG's Blog</h1>
            <p class="site-desc">
                Hi! I'm Izzy Guethert, also known as Izzy MG. I write whatever I feel like here,
                generally about web development and programming.
            </p>
            <div class="posts-grid">
                <aside class="sidebar"/>
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
            </div>
        </main>
    </body>
</html>
