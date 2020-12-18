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
            <h1 class="main-heading">Izzy MG</h1>

            <h2 class="posts-heading">Posts</h2>
            <div class="posts-grid">
                <aside class="sidebar"/>
                <div class="articles-container">
                    @foreach ($posts as $post)
                        <article class="post-wrap">
                            <h3 class="post-date">Article {{ $post->pretty_date }}</h3>
                            <h3 class="post-title">
                                <a href="{{ route('post', [$post->id]) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="post-desc">{{ $post->text }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </main>
    </body>
</html>
