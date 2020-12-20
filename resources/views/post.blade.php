<!DOCTYPE html>
<html lang="en">
    <x-head></x-head>
    <body class="">
        <div class="top-bar">
            <a href="{{ route('home') }}">Home</a>
            <a href="https://izzymg.dev">Portfolio</a>
        @auth
            <a href="{{ route('edit post', [$post->id]) }}">Edit Post</a>
        @endauth
        </div>
        <main class="main post-main">

            <h1 class="post-title">{{ $post->title }}</h1>
            <h2 class="main-heading">
                <a href="{{ route('home') }}">Izzy MG's Blog</a>
            </h2>

            <span class="created-at">{{ date_create($post->created_at)->format("Y - m - d") }}</span>

            <p>{{ $post->text }}</p>
        </main>
    </body>
</html>
