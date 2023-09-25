<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/header.css">
    @yield('css')
    <title>Document</title>
</head>

<body>
    <nav class="navigation">
        <a href="/"><img src="{{url('storage/logos/logo.png')}}" alt="logo"></a>
        @if (Auth::check() && Auth::user()->role == "admin")
        <a class="" href="{{url('/game/manage')}}">Manage Game</a>
        <a class="" href="{{url('/genre/manage')}}">Manage Game Genre</a>
        @endif
        <div class="search">
            <form action="#">
                <input type="text" placeholder="Search.." name="search">
            </form>
        </div>

        <div class="button-pane">
            @if (Auth::check())
            <a class="" href="{{url('/cart')}}">
                <img src="{{ url('storage/logos/cart.png') }}" alt="cart" class="cart-image">
            </a>
            @if(Auth::user()->image == 'null')
            <img src="{{ url('storage/profile/no-profile.png') }}" alt="profile" class="profile-image"
                onclick="toggleMenu()">
            @else
            <img src="{{ url('storage/profile/'.Auth::user()->image) }}" alt="profile" class="profile-image"
                onclick="toggleMenu()">
            @endif

            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <p>hi {{ Auth::user()->name }}</p>
                    <a href="/profile">Your Profile</a>
                    <a href="/transaction-history">Transaction History</a>
                    <a href="/signout">Sign out</a>
                </div>

            </div>
            @elseif(!(Auth::check()))
            <button><a class=""" href=" {{url('/signin')}}">Sign in</a></button>
            <button><a class="" href="{{url('/signup')}}">Sign up</a></button>
            @endif
        </div>
    </nav>
    <script>
        let subMenu = document.getElementById('subMenu');

        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>

    @yield('content')
</body>

</html>
