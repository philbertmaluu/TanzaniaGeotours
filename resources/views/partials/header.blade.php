<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="admin/assets/img/logo.png" alt="">
            <h1 class="sitename">Tanzania Geotourism</h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home<br></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#contact">Contact</a></li>
                @guest
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                @else
                <li><a href="{{ route('admin.shops.index') }}">Manage Attractions</a></li>
                <li><a href="#contact" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">Logout</a></li>
                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endguest

            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a class="btn-getstarted flex-md-shrink-0" href="{{ route('register')}}">Get Started</a>
    </div>
</header>

<!-- Hero Section -->
<section id="hero" class="hero section">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Nature is beautiful, let's show you</h1>
                <p data-aos="fade-up" data-aos-delay="100">Tanzania is a country with many tourist attractions. Approximately 38 percent of Tanzania's land area is set aside in protected areas for conservation
                    </p>
                <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                    <a href="{{route('register')}}" class="btn-get-started">Get Started <i class="bi bi-arrow-right"></i></a>
                    <a href="https://youtu.be/52rzxecYj9U?si=eiXKP8lbNb2Q5qbc" class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="{{ asset('dash/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- /Hero Section -->