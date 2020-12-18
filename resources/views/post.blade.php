<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="/js/app.js"></script>

        <title>Izzy MG's Blog</title>
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body class="">
        <div class="authed-banner">
            @auth
                <a href="{{ route('edit post', [$post->id]) }}" class="">Edit Post</a>
            @endauth
        </div>
        <main class="main">

            <h1>{{ $post->title }}</h1>
            <h2>Izzy MG's Blog</h2>

            <span class="created-at">Written: {{ $post->created_at }}</span>

            <p>{{ $post->text }}</p>
        </main>
    </body>
</html>
