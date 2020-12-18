<!DOCTYPE html>
<html lang="en">
    <x-head></x-head>
    <body>
        <form method="POST" action="/login">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="password" type="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </body>
</html>
