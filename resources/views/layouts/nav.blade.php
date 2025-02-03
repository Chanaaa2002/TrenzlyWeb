<!-- Navigation Bar -->
<header class="main-nav" id="main-nav">
    <a href="{{ route('welcome') }}" class="main-logo">{{config('app.name')}}</a>

   
    <div class="menu-toggle" id="menu-toggle">
        <i class="fas fa-bars"></i>
    </div>

    <nav class="main-menu" id="main-menu">
        <ul>
            <li><a href="{{ route('welcome') }}">Home</a></li>
            <li><a href="{{ route('pages.shop') }}">SHOP</a></li>
            {{-- <li><a href="{{ route('pages.womens') }}">WOMEN'S</a></li>
            <li><a href="{{ route('pages.acce') }}">ACCESSORIES </a></li> --}}
            <li><a href="{{ route('pages.about') }}">About</a></li>
        </ul>
    </nav>

    <div class="main-icons">
        <a href="#"><i class="fas fa-search"></i></a>

        <a href="#"><i class="fas fa-shopping-cart"></i></a>
        <a href="{{ route('login') }}"><i class="fas fa-user"></i></a>
    </div>

</header>