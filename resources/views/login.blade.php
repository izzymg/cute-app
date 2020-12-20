<!DOCTYPE html>
<html lang="en">
    <x-head></x-head>
    <body>
        <main class="main login-main">
            <h1 class="page-title">Login :: <a href="{{ route('home') }}">blog.izzymg</a></h1>
            <form method="POST" action="/login">
                @csrf
                <div class="input-wrap">
                    <label for="name">Name</label>
                    <input name="name" type="text" placeholder="Name">
                </div>
                <div class="input-wrap">
                    <label for="password">Password</label>
                    <input name="password" type="password" placeholder="Password">
                </div>
                <button type="submit">Login to the dashboard</button>
            </form>
        </main>
    </body>
</html>
