<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
<header>
    <img src="images/bee-trio-trackers-high-resolution-logo.png" alt="Logo">
    <button class="hamburger" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <nav class="navigation">
        <a href="/">HOME</a>
        <a href="about">ABOUT US</a>
        <a href="services">SERVICES</a>
        <a href="tracking">TRACKING</a>
        <a href="contact">CONTACT US</a>

        @guest
            <button class="btnlogin" onclick="location.href='{{ route('login') }}'">LOG IN</button>
        @endguest

        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOG OUT</a>
      
        @endauth
    </nav>
</header>
