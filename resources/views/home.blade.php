<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="/js/app.js"></script>

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
        <div class="authed-banner">
            @auth
                <a href="{{ route('dash') }}" class="">Dashboard</a>
            @endauth
        </div>
        <main class="main">
            <h1>Izzy MG</h1>

            <h3>Posts</h3>
            @foreach ($posts as $post)
                <h4>
                    <a href="{{ route('post', [$post->id]) }}">{{ $post->title }}</a>
                </h4>
                <p>{{ $post->text }}</p>
            @endforeach
            </main>
    </body>
</html>
