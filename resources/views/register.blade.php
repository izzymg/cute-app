<!DOCTYPE html>
<html lang="en">
    <x-head></x-head>
    <body>
        <form method="POST" action="/register">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="password" type="password" placeholder="Password">
            <button type="submit">Register</button>
        </form>
    </body>
</html>
