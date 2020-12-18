<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        <form method="POST" action="/register">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="password" type="password" placeholder="Password">
            <button type="submit">Register</button>
        </form>
    </body>
</html>
