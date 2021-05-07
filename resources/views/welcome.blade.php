<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">

    <title>Todo List</title>
</head>
<style>
    body{
        margin-top: 20px;
    }
    .guest {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .guest p {
        font-size: 28px;
        color: beige;
    }

    .guest p a {
        color: black;
        font-size: 34px;
    }

    .admin-panel {
        padding: 8px 28px;
        background-color: white;
        border-radius: 20px;
    }

    .logout-button {
        margin-top: 20px;
        padding: 10px 44px !important;
        background-color: white;
        border-radius: 20px;
        text-align: center;
    }
    form{
        width: fit-content;
    }

</style>

<body>
    @auth

        @if (auth()->user()->user_role->role->title == 'Admin')
            <a class="admin-panel" href="{{ route('dashboard') }}">Admin Panel</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="logout-button">
                {{ __('Log Out') }}
            </x-jet-dropdown-link>
        </form>

    @endauth
    @guest
        <div class="guest">
            <p>
                Please <a href="/login">Login</a> to create Todo List
            </p>
        </div>

    @endguest
    @auth
        <div id="app">
            <app token="{{ JWTAuth::fromUser(auth()->user()) }}"></app>
        </div>
    @endauth

</body>
<script src="{{ mix('js/app.js') }}"></script>

</html>
