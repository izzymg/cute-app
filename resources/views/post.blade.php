<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-head></x-head>
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
