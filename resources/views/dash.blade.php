<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">

        <title>Dashboard</title>
    </head>
    <body>
        <h1> Posts </h1>
        @foreach($posts as $post)
            <h2><a href="/dash/edit/{{ $post->id }}"> {{ $post->title }} </a></h2>
            <span>Created: {{ $post->created_at }}</span>
        @endforeach
        <h1> Make Post </h1>
        <form method="POST" action="/posts">
            @csrf
            <input name="title" type="text" placeholder="Title">
            <input name="text" type="text" placeholder="Text">
            <button type="submit">Submit post</button>
        </form>
    </body>
</html>
