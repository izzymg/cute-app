<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard - Edit Post</title>

        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <h1> Edit Post </h1>
        <form method="POST" action="/posts/{{$post->id}}">
            @method('PATCH')
            @csrf
            <input name="title" type="text" placeholder="Title" value={{$post->title}}>
            <input name="text" type="text" placeholder="Text" value={{$post->text}}>
            <button type="submit">Update post</button>
        </form>
    </body>
</html>
