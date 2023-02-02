<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("title") - {{ config("app.name") }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link rel="icon" href="{{ asset("image/favicon-X.png") }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset("assets/animation/custom-animation.css") }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset("assets/fontawesome/css/all.min.css") }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/main.css") }}">

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '483757690416093',
      xfbml      : true,
      version    : 'v14.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</head>
<body>

      <!-- Preloader -->
  <div id="preloader">
    <div class="ctn-preloader" id="ctn-preloader">
      <div class="round_spinner">
        <div class="spinner"></div>
        <div class="text">
          <img src="{{ asset("image/logos/logo.png") }}" alt="Gteen Tugboat">
        </div>
      </div>
      <h2 class="head">PARTICIPATE IN PROGRESS</h2>
      <p></p>
    </div>
  </div>
  <!-- Preloader End -->

<!-- Main -->
<main class="main">
    <!-- Header Style One -->
    <!-- header -->
    <header class="header header--styleFour sticky-on">
        <div id="sticky-placeholder"></div>
        <div class="container container--custom">
        <div class="row">
            <div class="col-12">
            <div class="header__wrapper">
                <!-- logo start -->
                <div class="header__logo">
                <a href="/" class="header__logo__link">
                    <img src="{{ asset("image/logos/logo.png") }}" alt="Green Tugboat" width="100" class="header__logo__image">
                </a>
                </div>
                <!-- logo end -->
                <!-- Main Menu Start -->
                <div class="header__menu">
                <nav class="mainMenu">
                    <ul>
                    <li><a href="/">Home</a></li>
                    <li class="dropdown"><a href="{{ route("about") }}">About</a>
                        <ul class="dropdown_menu dropdown_menu-2">
                        <li class="dropdown_item-1">
                            <a href="{{ route("faq") }}">FAQ`s</a>
                        </li>
                        </ul>
                        </li>
                    <li><a href="{{ route("projects") }}">Projects</a></li>
                    <li><a href="{{ route("discussions") }}">Discussions</a></li>
                    <li class="dropdown"><a href="javascript:void(0)">Action</a>
                        <ul class="dropdown_menu dropdown_menu-2">
                        <li class="dropdown_item-1"><a href="{{ route("sponsor") }}">Sponsor</a></li>
                        <li class="dropdown_item-2"><a href="{{ route("promote") }}">Promote</a></li>
                        <li class="dropdown_item-3"><a href="{{ route("events") }}">Events</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route("contact") }}">Contacts</a></li>
                    </ul>
                </nav>
                </div>
                <!-- Main Menu End -->
                <!-- Header Right Buttons Search Cart -->
                <div class="header__right">
                <div class="header__actions">
                    <ul>
                    <li>
                        <a href="#template-search">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.8281 21.4609L16.2852 15.918C16.1992 15.832 16.0703 15.7891 15.9414 15.7891H15.4688C16.9727 14.1562 17.875 12.0508 17.875 9.6875C17.875 4.78906 13.8359 0.75 8.9375 0.75C3.99609 0.75 0 4.78906 0 9.6875C0 14.6289 3.99609 18.625 8.9375 18.625C11.2578 18.625 13.4062 17.7227 14.9961 16.2617V16.6914C14.9961 16.8633 15.0391 16.9922 15.125 17.0781L20.668 22.6211C20.8828 22.8359 21.1836 22.8359 21.3984 22.6211L21.8281 22.1914C22.043 21.9766 22.043 21.6758 21.8281 21.4609ZM8.9375 17.25C4.72656 17.25 1.375 13.8984 1.375 9.6875C1.375 5.51953 4.72656 2.125 8.9375 2.125C13.1055 2.125 16.5 5.51953 16.5 9.6875C16.5 13.8984 13.1055 17.25 8.9375 17.25Z" fill="#7FB432" />
                        </svg>
                        </a>
                    </li>
                    </ul>
                </div>



                <div class="header__button">
                    <a class="btn btn--styleOne btn--secondary it-btn" @auth href="{{ route("account") }}" @endauth @guest href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" @endguest>
                    <span class="btn__text">
                        @auth
                            Account
                        @endauth
                        @guest
                            Login
                        @endguest
                    </span>
                    <i class="fa-solid fa-heart btn__icon"></i>
                    <span class="it-btn__inner">
                                    <span class="it-btn__blobs">
                                        <span class="it-btn__blob"></span>
                    <span class="it-btn__blob"></span>
                    <span class="it-btn__blob"></span>
                    <span class="it-btn__blob"></span>
                    </span>
                    </span>
                    <svg class="it-btn__animation" xmlns="http://www.w3.org/2000/svg" version="1.1">
                        <defs>
                        <filter>
                            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10">
                            </feGaussianBlur>
                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo">
                            </feColorMatrix>
                            <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                        </filter>
                        </defs>
                    </svg>
                    </a>
                </div>

                </div>
                <!-- Header Right Buttons Search Cart -->
            </div>
            </div>
        </div>
        </div>
    </header>
    <!-- end header -->
    <!-- Mobile Menu Button Start -->
    <div class="header header--mobile cc-header-menu mean-container position-relative" id="meanmenu">
        <div class="mean-bar headerBurgerMenu">
        <a href="/">
            <img class="mean-bar__logo" alt="Techkit" src="{{ asset("image/logos/logo.png") }}" />
        </a>
        <!-- Header Right Buttons Search Cart -->
        <div class="header__right">
            <div class="header__actions">
            <ul>

                <li>
                <button class="headerBurgerMenu__button sidebarBtn" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                    <svg width="50" height="50" viewBox="0 0 100 100">
                    <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                    <path class="line line2" d="M 20,50 H 80" />
                    <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                    </svg>
                </button>
                </li>
            </ul>
            </div>
        </div>
        <!-- Header Right Buttons Search Cart -->
        </div>
    </div>
    <!-- Mobile Menu Button End -->
    <!-- Mobile Menu Navbar -->
    <div class="cc cc--slideNav">
        <div class="cc__logo mb-40">
        <a href="/">
            <img class="mean-bar__logo" alt="Techkit" src="{{ asset("image/logos/logo.png") }}" />
        </a>
        </div>
        <div class="offscreen-navigation mb-10">
            <nav class="menu-main-primary-container">
                <ul class="menu">
                <li class="list menu-item-parent">
                    <a class="animation" href="/">Home</a>
                </li>
                <li class="list menu-item-parent menu-item-has-children">
                    <a class="animation" href="#">About Us</a>
                        <ul class="main-menu__dropdown sub-menu">
                            <li><a href="{{ route("about") }}">GTI</a></li>
                            <li><a href="{{ route("faq") }}">FAQs</a></li>
                        <li>
                    </ul>
                </li>
                <li class="list menu-item-parent">
                    <a class="animation" href="{{ route("projects") }}">Projects</a>
                </li>
                <li class="list menu-item-parent">
                    <a class="animation" href="{{ route("discussions") }}">Discussions</a>
                </li>
                <li class="list menu-item-parent menu-item-has-children">
                    <a class="animation" href="javascript:void(0)">Actions</a>
                    <ul class="main-menu__dropdown sub-menu">
                    <li><a href="{{ route("sponsor") }}">Sponsor</a></li>
                    <li>
                        <a href="{{ route("promote") }}">Promote</a>
                    </li>
                    <li><a href="{{ route("events") }}">Events</a></li>

                    </ul>
                </li>
                <li class="list menu-item-parent">
                    <a class="animation" href="{{ route("contact") }}">Contacts</a>
                </li>
                </ul>
            </nav>
        </div>
        <div class="cc__button mb-40">
            <div class="header__button">
                <a class="btn btn--styleOne btn--secondary it-btn" href="
                @auth
                    {{ route("account") }}
                @endauth
                @guest
                    {{ route("login") }}
                @endguest
                ">
                <span class="btn__text">
                    @auth
                        Account
                    @endauth
                    @guest
                        Login
                    @endguest
                </span>
                <i class="fa-solid fa-heart btn__icon"></i>
                <span class="it-btn__inner">
                        <span class="it-btn__blobs">
                            <span class="it-btn__blob"></span>
                <span class="it-btn__blob"></span>
                <span class="it-btn__blob"></span>
                <span class="it-btn__blob"></span>
                </span>
                </span>
                <svg class="it-btn__animation" xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                    <filter id="goo">
                        <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10">
                        </feGaussianBlur>
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo">
                        </feColorMatrix>
                        <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                    </filter>
                    </defs>
                </svg>
                </a>
            </div>
        </div>
        <div class="itSocial itSocial--sidebar mb-40">
            <ul>
                <li>
                <a class="facebook" href="https://web.facebook.com/thegreentugboat" rel="nofollow">
                    <i class="fab fa-facebook-f"></i>
                </a>
                </li>
                <li>
                <a class="twitter" href="https://twitter.com/TheGreenTugboat" rel="nofollow">
                    <i class="fab fa-twitter"></i>
                </a>
                </li>
                <li>
                <a class="instagram" href="https://www.instagram.com/green_tugboat/" rel="nofollow">
                    <i class="fab fa-instagram"></i>
                </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Mobile Menu Navbar End -->
    <!-- Header Style One End -->
    @yield("content")


</main>

<!-- footer -->
<footer class="footer footer--bg footer--styleOne pt-70 pb-40">
    <img src="{{ asset("image/shapes/footerShape2.png") }}" alt="Gainioz Shape" class="footer__shape">
    <div class="container">
        <div class="row align-items-center">
        <div class="col">
            <div class="footer__logo">
            <img src="{{ asset("image/logos/logo.png") }}" alt="{{ config("app.name") }}" width="100" class="footer__logo__image">
            </div>
        </div>
        <div class="col">
            <div class="footer__social itSocial">
            <ul>
                <li>
                <a class="facebook" href="https://web.facebook.com/thegreentugboat" rel="nofollow">
                    <i class="fab fa-facebook-f"></i>
                </a>
                </li>
                <li>
                <a class="twitter" href="https://twitter.com/TheGreenTugboat" rel="nofollow">
                    <i class="fab fa-twitter"></i>
                </a>
                </li>
                <li>
                <a class="instagram" href="https://www.instagram.com/green_tugboat/" rel="nofollow">
                    <i class="fab fa-instagram"></i>
                </a>
                </li>
            </ul>
            </div>
        </div>
        <div class="col-12">
            <hr class="footer__line" />
        </div>
        </div>
        <div class="row">
        <div class="footer__middle pt-65 pb-35">
            <div class="row justify-content-between">
            <div class="col-lg-2 col-md-4 mb-30">
                <div class="footer__widget">
                <div class="footer__title">
                    <h2 class="footer__heading text-uppercase text-white">About us</h2>
                </div>
                <div class="footer__menu">
                    <ul>
                    <li><a href="{{ route("privacy") }}">Policy Priorities</a></li>
                    <li><a href="{{ route("terms") }}">Terms and Conditions</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-30">
                <div class="footer__widget">
                <div class="footer__title">
                    <h2 class="footer__heading text-uppercase text-white">Support us</h2>
                </div>
                <div class="footer__menu">
                    <ul>
                    <li><a @auth href="{{ route("projects") }}" @endauth @guest href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" @endguest>Donate Now</a></li>
                    <li><a href="{{ route("promote") }}">Promote</a></li>
                    <li><a href="{{ route("events") }}">Events</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-30">
                <div class="footer__widget">
                <div class="footer__title">
                    <h2 class="footer__heading text-uppercase text-white">Quick Links</h2>
                </div>
                <div class="footer__menu">
                    <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route("about") }}">About us</a></li>
                    <li><a href="{{ route("discussions") }}">Discussions</a></li>
                    <li><a href="{{ route("projects") }}">Donation</a></li>
                    <li><a @auth href="{{ route("projects") }}" @endauth @guest href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" @endguest>Join Volentter</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div class="col-lg-5 mb-30">
                <form action="#" method="post" class="footer__newsletter">
                <div class="footer__title">
                    <h2 class="footer__heading text-uppercase text-white">News Latter</h2>
                </div>
                <div class="footer__newsletter__formGroup mb-20">
                    <input type="text" class="footer__newsletter__input" placeholder="Enter mail">
                    <input class="footer__newsletter__button" type="button" value="Subscribe">
                </div>
                <div class="footer__newsletter__formGroup">
                    <input id="agree" type="checkbox" class="footer__newsletter__check form-check-input">
                    <label class="footer__newsletter__label" for="agree">I agree that my submitted data is
                    being
                    collected and stored.</label>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="footer__bottom">
            <div class="row">
            <div class="col-12">
                <hr class="footer__line">
            </div>
            <div class="col mb-20">
                <div class="footer__copyright pt-20">
                <p class="footer__copyright__text mb-0">Copyright @ {{ config("app.name") }} @php echo date("Y") @endphp all right receved</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</footer>
  <!-- CURSOR -->
  <div class="mouseCursor cursor-outer"></div>
  <div class="mouseCursor cursor-inner"></div>
  <!-- /CURSOR -->
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <!-- Template Search -->
  <div id="template-search" class="template-search">
    <button type="button" class="close">
      <i class="fa-solid fa-xmark"></i>
    </button>
    <form class="search-form" method="GET" action="{{ route("search") }}">
      <input type="search" name="q" placeholder="Type your search" required />
      <button type="submit" class="search-btn">
        <i class="fas fa-search"></i>
      </button>
    </form>
  </div>
  <!-- Template Search End -->

<!-- Scripts -->
@include("modals.auth.login")
@include("modals.auth.sign_up")

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.js" integrity="sha512-GkPcugMfi6qlxrYTRUH4EwK4aFTB35tnKLhUXGLBc3x4jcch2bcS7NHb9IxyM0HYykF6rJpGaIJh8yifTe1Ctw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/validator/13.7.0/validator.min.js" integrity="sha512-rJU+PnS2bHzDCvRGFhXouCSxf4YYaUyUfjXMHsHFfMKhWDIEBr8go2LZ2EYXOqASey1tWc2qToeOCYh9et2aGQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset("js/vue.global.js") }}"></script>
<script src="{{ asset("js/main.js") }}"></script>
</body>
</html>
