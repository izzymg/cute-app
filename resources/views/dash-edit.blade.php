<!DOCTYPE html>
<html lang="en">
    <x-head></x-head>
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
