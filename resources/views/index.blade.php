@extends("layouts.app")
@section("title", "Home")
@section("content")

<!-- Hero/Welcome Section Start -->
<section class="hero hero--style3">
    <div class="hero__map">
        <img src="{{ asset("image/man/home3-hero-map.jpg") }}" alt="Greentugboat">
    </div>
    <div class="container container--custom">
        <div class="row align-items-center justify-content-between">
        <div class="col-xl-5 col-lg-8 mb-30">
            <div class="hero__content">
            <span class="hero__title hero__title--small">{{ pagesContent("home", "banner", "text1")->content }}</span>
            <h1 class="hero__title hero__title--big">{{ pagesContent("home", "banner", "text2")->content }}</h1>
            <p class="hero__text">{{ pagesContent("home", "banner", "text3")->content }}</p>
            <a class="btn btn--styleOne btn--primary it-btn" @auth href="{{ route("account") }}" @endauth @guest href="{{ route("register") }}"@endguest >
                <span class="btn__text">{{ pagesContent("home", "banner", "text4")->content }}</span>
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
                    <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo">
                    </feColorMatrix>
                    <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                    </filter>
                </defs>
                </svg>
            </a>
            <div class="volunteerUser__profile hero__profile">

                <ul>
                    @if(pagesContent("home", "banner", "thumbnail1")->image)
                        <li>
                            <a href="#"><img src="{{ asset(pagesContent("home", "banner", "thumbnail1")->image) }}" alt="Thumbnail1"></a>
                        </li>
                    @endif
                    @if(pagesContent("home", "banner", "thumbnail2")->image)
                    <li>
                        <a href="#"><img src="{{ asset(pagesContent("home", "banner", "thumbnail2")->image) }}" alt="thumbnail2"></a>
                    </li>
                    @endif
                    @if(pagesContent("home", "banner", "thumbnail3")->image)
                    <li>
                        <a href="#"><img src="{{ asset(pagesContent("home", "banner", "thumbnail3")->image) }}" alt="thumbnail3"></a>
                    </li>
                    @endif

                    @if(pagesContent("home", "banner", "thumbnail4")->image)
                    <li>
                        <a href="#"><img src="{{ asset(pagesContent("home", "banner", "thumbnail4")->image) }}" alt="thumbnail4"></a>
                    </li>
                    @endif
                    @if(pagesContent("home", "banner", "thumbnail5")->image)
                    <li>
                        <a href="#"><img src="{{ asset(pagesContent("home", "banner", "thumbnail5")->image) }}" alt="thumbnail5"></a>
                    </li>
                    @endif

                    @if(pagesContent("home", "banner", "thumbnail6")->image)
                    <li>
                        <a href="#"><img src="{{ asset(pagesContent("home", "banner", "thumbnail6")->image) }}" alt="thumbnail6"></a>
                    </li>
                    @endif
                    @if(pagesContent("home", "banner", "thumbnail7")->image)
                    <li>
                        <a href="#users"><img src="{{ asset(pagesContent("home", "banner", "thumbnail7")->image) }}" alt="thumbnail7"></a>
                    </li>
                    @endif
                </ul>
            </div>
            <span class="hero__instaTitle"><span>#</span>{{ pagesContent("home", "banner", "text5")->content }}</span>
            </div>
        </div>
        <div class="col-xl-6 mb-30">
            <figure class="hero__figure">
            @if(pagesContent("home", "banner", "image1")->image )
                <img src="{{ asset(pagesContent("home", "banner", "image1")->image ) }}" alt="Gainioz Man" class="hero__figure__thumbs">
            @else
                <img src="{{ asset("image/man/clarion-call-1.jpg") }}" alt="Gainioz Man" class="hero__figure__thumbs">
            @endif
            </figure>
        </div>
        </div>
    </div>
</section>
<!-- Hero/Welcome Section End -->
<!-- Live Donation -->
<section class="donation pb-130">
    <div class="container">
        <div class="row">
        <div class="col-lg-11 mx-auto">
            <div class="liveDonation">
            <div class="liveDonation__wrapper">
                <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="liveDonationTitle">
                    <span class="liveDonationTitle__small"><span></span>LIve Donation</span>
                    <h2 class="liveDonationTitle__heading">Direct sponsorships</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="liveDonation__button">
                    <a class="btn btn--styleOne btn--secondary it-btn" href="{{ route("projects") }}">
                        <span class="btn__text">pick a project</span>
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
                </div>
                <div class="row">
                <div class="col-12">
                    <div class="featureBlock__donation">
                    <div class="featureBlock__donation__progress">
                        <div class="featureBlock__donation__bar">
                        <span class="featureBlock__donation__text skill-bar" data-width="{{ round($percentage_raised) }}%"
                        style="width: {{ round($percentage_raised) }}%;">{{ round($percentage_raised) }}%</span>
                        <div class="featureBlock__donation__line">
                            <span class="skill-bars">
                            <span class="skill-bars__line skill-bar" data-width="{{ round($percentage_raised) }}%" style="width: {{ round($percentage_raised) }}%;"></span>
                            </span>
                        </div>
                        </div>
                    </div>
                    <div class="featureBlock__eqn">
                        <div class="featureBlock__eqn__block">
                        <span class="featureBlock__eqn__title">our goal</span>
                        <span class="featureBlock__eqn__price">@php echo naira() @endphp {{ number_format($total_budget, 2) }}</span>
                        </div>
                        <div class="featureBlock__eqn__block">
                        <span class="featureBlock__eqn__title">Raised</span>
                        <span class="featureBlock__eqn__price">@php echo naira() @endphp {{ number_format($total_raised, 2) }}</span>
                        </div>
                        <div class="featureBlock__eqn__block">
                        <span class="featureBlock__eqn__title">to go</span>
                        <span class="featureBlock__eqn__price">@php echo naira() @endphp {{ number_format($total_remaining, 2) }}</span>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Live Donation End -->
<!-- Feature -->
<section class="feature feature--bg cc-slide-wrap2 pt-130 pb-75">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-lg-6 mb-55">
            <!-- Section Heading/Title -->
            <div class="sectionTitle">
            <span class="sectionTitle__small">
            <i class="fa-solid fa-heart btn__icon"></i>
            the game plan
            </span>
            <h2 class="sectionTitle__big">AWAKEN THE GIANT</h2>
            </div>
            <!-- Section Heading/Title End -->
        </div>
        <div class="col-lg-6 mb-55">
            <div class="sliderNav sliderNav--style1">
            <span class="sliderNav__btn btn-prev" tabindex="0" role="button" aria-label="Previous slide"
            aria-controls="swiper-wrapper-26d691050f53101810f">
            <svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                d="M5.75 9.40625L6.375 8.78125C6.5 8.625 6.5 8.40625 6.34375 8.25L3.84375 5.8125H14.625C14.8125 5.8125 15 5.65625 15 5.4375V4.5625C15 4.375 14.8125 4.1875 14.625 4.1875H3.84375L6.34375 1.78125C6.5 1.625 6.5 1.40625 6.375 1.25L5.75 0.625C5.59375 0.5 5.375 0.5 5.21875 0.625L1.09375 4.75C0.96875 4.90625 0.96875 5.125 1.09375 5.28125L5.21875 9.40625C5.375 9.53125 5.59375 9.53125 5.75 9.40625Z"
                fill="white"></path>
            </svg>
            </span>
            <span class="sliderNav__btn btn-next" tabindex="0" role="button" aria-label="Next slide"
            aria-controls="swiper-wrapper-26d691050f53101810f">
            <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                d="M9.21875 0.625L8.59375 1.25C8.46875 1.40625 8.46875 1.625 8.625 1.78125L11.125 4.1875H0.375C0.15625 4.1875 0 4.375 0 4.5625V5.4375C0 5.65625 0.15625 5.8125 0.375 5.8125H11.125L8.625 8.25C8.46875 8.40625 8.46875 8.625 8.59375 8.78125L9.21875 9.40625C9.375 9.53125 9.59375 9.53125 9.75 9.40625L13.875 5.28125C14 5.125 14 4.90625 13.875 4.75L9.75 0.625C9.59375 0.5 9.375 0.5 9.21875 0.625Z"
                fill="white"></path>
            </svg>
            </span>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-12">
            <div class="featureActive swiper">
                <div class="swiper-wrapper">
                    @php
                        $data = pagesContent("home", "game-plan", "slide", true);
                    @endphp
                    @foreach ($data as $row)
                        <div class="swiper-slide">
                            <div class="keyFeatureBlock keyFeatureBlock--style3 mb-30">
                                <div class="keyFeatureBlock__left">
                                <span class="keyFeatureBlock__icon">
                                <img src="{{ asset($row->icon) }}" alt="Gainioz Feature_Icon">
                                </span>
                                </div>
                                <div class="keyFeatureBlock__content">
                                <h3 class="keyFeatureBlock__heading">
                                    <a class="keyFeatureBlock__heading__link" href="services.html">
                                    {{ $row->title }}
                                    </a>
                                </h3>
                                <p class="keyFeatureBlock__text">{{ $row->content }}</p>
                                <a class="keyFeatureBlock__link" href="https://{{ $row->address }}">
                                    <svg width="61" height="16" viewBox="0 0 61 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M60.7071 8.70711C61.0976 8.31658 61.0976 7.68342 60.7071 7.29289L54.3432 0.928932C53.9526 0.538408 53.3195 0.538408 52.9289 0.928932C52.5384 1.31946 52.5384 1.95262 52.9289 2.34315L58.5858 8L52.9289 13.6569C52.5384 14.0474 52.5384 14.6805 52.9289 15.0711C53.3195 15.4616 53.9526 15.4616 54.3432 15.0711L60.7071 8.70711ZM0 9H60V7H0V9Z" fill="#BBBBBB" />
                                    </svg>
                                </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="sponsors pt-80">
        <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="sponsorsTitle">
                <h2 class="sponsorsTitle__heading text-uppercase">“ Become Support Partner ”</h2>
            </div>
            </div>
        </div>
        <div class="sponsor-slider-active swiper">
            <div class="swiper-wrapper">
                @php
                    $data = pagesContent("home", "support-partner", "slide", true);
                @endphp
                @foreach ($data as $row)
                    <div class="swiper-slide">
                        <div class="sponsorsItem mb-40">
                            <a href="{{ $row->address }}">
                                <img src="{{ asset($row->icon) }}" alt="{{ $row->title }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Feature End -->
<!-- Join -->
<section class="joinSection position-relative overflow-hidden">
    <div class="joinSectionThumb">
        @if(pagesContent("home", "join-us", "image")->image )
            <img src="{{ asset(pagesContent("home", "join-us", "image")->image) }}" alt="Greentugboat">
        @else
            <img src="{{ asset("image/man/joinMan.jpg") }}" alt="Greentugboat">
        @endif
    </div>
    <div class="container">
        <div class="row justify-content-end">
        <div class="col-lg-6">
            <div class="joinContent">
            <div class="row justify-content-end">
                <div class="col-10">
                <!-- Section Heading/Title -->
                <div class="sectionTitle mb-20">
                    <span class="sectionTitle__small justify-content-end">
                    <i class="fa-solid fa-heart btn__icon"></i>
                    join with us
                </span>
                    <h2 class="sectionTitle__big">{{ pagesContent("home", "join-us", "text1")->content }}</h2>
                </div>
                <!-- Section Heading/Title End -->
                </div>
            </div>
            <p class="joinContent__text">{{ pagesContent("home", "join-us", "text2")->content }}</p>
            <a class="btn btn--styleOne btn--secondary it-btn" @auth href="{{ route("account") }}" @endauth @guest href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" @endguest>
                <span class="btn__text">{{ pagesContent("home", "join-us", "text3")->content }}</span>
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
        </div>
    </div>
</section>
<!-- Join End -->
<!-- About && Features && Donner Section -->
<section class="about gray-bg about--style3">
    <div class="aboutThumb3">
        @if(pagesContent("home", "about-foundation", "image")->image )
        <img src="{{ asset(pagesContent("home", "about-foundation", "image")->image) }}" alt="Gainioz">
    @else
        <img src="image/man/about-man-h3.jpg" alt="Gainioz About">
    @endif
    </div>
    <div class="container">
        <div class="row align-items-end justify-content-between">
            <div class="col-lg-6 mb-30">
                <div class="aboutContent aboutContent--style2">
                    <!-- Section Heading/Title -->
                    <div class="sectionTitle mb-20">
                        <span class="sectionTitle__small">
                            <i class="fa-solid fa-heart btn__icon"></i>
                            about foundation
                        </span>
                        <h2 class="sectionTitle__big">{{ pagesContent("home", "about-foundation", "text1")->content }}</h2>
                    </div>
                    <!-- Section Heading/Title End -->
                    <p class="aboutContent__text">
                        {{ pagesContent("home", "about-foundation", "text2")->content }}
                    </p>
                    <span class="aboutContent__quote">{{ pagesContent("home", "about-foundation", "text3")->content }}</span>
                    <div class="aboutContent__buttons">
                        <a class="btn btn--styleOne btn--secondary it-btn" href="{{ pagesContent("home", "about-foundation", "url1")->content }}">
                            <span class="btn__text">{{ pagesContent("home", "about-foundation", "text4")->content }}</span>
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
                        <a class="btn btn--styleOne btn--primary it-btn" href="{{ pagesContent("home", "about-foundation", "url2")->content }}">
                            <span class="btn__text">{{ pagesContent("home", "about-foundation", "text5")->content }}</span>
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
                        <a style="background:#973594 !important" class="btn btn--styleOne btn--primary it-btn" href="{{ pagesContent("home", "about-foundation", "url3")->content }}">
                            <span class="btn__text">{{ pagesContent("home", "about-foundation", "text6")->content }}</span>
                            <i class="fa-solid fa-heart btn__icon"></i>
                            <span class="it-btn__inner" style="background:#973594 !important">
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
            </div>
            <div class="col-lg-5">
                {{-- <div class="aboutThumb aboutThumb--style3"> --}}
                    {{-- <div class="aboutThumb__text"> --}}
                        {{-- <span class="aboutThumb__text__title">..Since..</span> --}}
                        {{-- <span class="aboutThumb__text__year">1998</span> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <div class="services services--style3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <!-- Section Heading/Title -->
                    <div class="sectionTitle text-center mb-65">
                        <span class="sectionTitle__small justify-content-center">
                            <i class="fa-solid fa-heart btn__icon"></i>
                            need your help
                        </span>
                        <h2 class="sectionTitle__big">How Can You help?</h2>
                    </div>
                    <!-- Section Heading/Title End -->
                </div>
            </div>
        <div class="row gx-35 pt-35">
            @php
                $data = pagesContent("home", "need-your-help", "slide", true);
            @endphp
            @foreach ($data as $row )
            <div class="col-lg-4">
                <div class="keyFeatureBlock keyFeatureBlock--style4 mb-30">
                    <div class="keyFeatureBlock__left">
                    <span class="keyFeatureBlock__icon">
                    <img src="{{ asset( $row->icon ) }}" alt="Gainioz Feature_Icon">
                    </span>
                    </div>
                    <div class="keyFeatureBlock__content">
                    <h3 class="keyFeatureBlock__heading">
                        <a class="keyFeatureBlock__heading__link" href="">
                            {{ $row->title }}
                        </a>
                    </h3>
                    <p class="keyFeatureBlock__text">{{ $row->content }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</section>
      <!-- About && Features && Doner End -->
      <!-- Testimonials -->
      <section class="review pt-110 pb-60 position-relative overflow-hidden">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <!-- Section Heading/Title -->
              <div class="sectionTitle mb-65">
                <span class="sectionTitle__small justify-content-start">
                <i class="fa-solid fa-heart btn__icon"></i>
                Affimations
              </span>
                <h2 class="sectionTitle__big">People say about the initiative</h2>
              </div>
              <!-- Section Heading/Title End -->
              <div class="reviewMap mb-50">
                <img src="{{ asset("image/map/map-thumb.png") }}" alt="Gainioz Map">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row">
                @php
                    $data = pagesContent("home", "testimonial", "slide", true);
                @endphp
                @foreach ($data as $row)
                <div class="col-lg-6">
                    <div class="reviewblock reviewblock--style2">
                      <div class="reviewblock__content">
                        <div class="reviewblock__author">
                          <div class="reviewblock__authorImage">
                            <img src="{{ asset($row->icon) }}" alt="Gainioz Reviewer">
                          </div>
                          <h3 class="reviewblock__authorName"><a href="contact.html">{{ $row->name }}</a></h3>
                          <p class="reviewblock__authorSpeech">{{ $row->content }}</p>
                          <span class="reviewblock__authorDes">{{ $row->title }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Testimonials End -->
      <!-- Blog -->
      <section class="blog pb-55">
        <div class="container">
          <div class="row align-items-end">
            <div class="col-lg-6">
              <!-- Section Heading/Title -->
              <div class="sectionTitle mb-60">
                <span class="sectionTitle__small justify-content-start">
                <i class="fa-solid fa-heart btn__icon"></i>
                Newsfeds
              </span>
                <h2 class="sectionTitle__big">Latest discussions</h2>
              </div>
              <!-- Section Heading/Title End -->
            </div>
            <div class="col-lg-6">
              <div class="sectionButton sectionButton--right mb-60">
                <a class="btn btn--styleOne btn--primary it-btn" href="{{ route("discussions") }}">
                  <span class="btn__text">More discussions</span>
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
                        <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7" result="goo">
                        </feColorMatrix>
                        <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
                      </filter>
                    </defs>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="row">
            @foreach ($posts as $row)
            @php
            $categories = json_decode($row->categoryid);
            $stack = [];
                for ($i=0; $i < count($categories); $i++) {
                    if($categories[$i] == null || $categories[$i] == ""){
                        continue;
                    }
                    $stack[] = \App\Models\Category::find($categories[$i])->name;
                }
            @endphp
            <div class="col-md-6">
                <div class="blogBlock blogBlock--style3 mb-60">
                  <figure class="blogBlock__figure">
                    <a href="/discussion/{{ $row->id }}/{{ $row->slug }}" class="blogBlock__figure__link">
                      <img src="@if($row->featureimage) {{ asset($row->featureimage) }} @else {{ asset("image/logos/logo.png") }} @endif" alt="{{ $row->title }}" width="633" height="390" style="width:633px; height:390px; object-fit: contain" class="blogBlock__figure__image">
                    </a>
                  </figure>
                  <div class="blogBlock__content">
                    <div class="blogBlock__header">
                        @for($x = 0; $x < count($stack); $x++)
                            <span class="blogBlock__tag tag mb-20"> {{ $stack[$x] }} </span>
                        @endfor
                      <h2 class="blogBlock__heading heading text-uppercase mb-20">
                        <a class="blogBlock__heading__link" href="/discussion/{{ $row->id }}/{{ $row->slug }}">
                          {{ $row->title }}
                        </a>
                      </h2>
                    </div>
                    <div class="blogBlock__body mb-30">
                      <p class="blogBlock__text text">
                       {!! $row->content_filtered !!} ... <a href="/discussion/{{ $row->id }}/{{ $row->slug }}" style="color: #eb9309"> <i> read more</i></a>
                      </p>
                    </div>
                    <div class="blogBlock__meta">
                      <ul class="blogBlock__meta__list">
                        {{-- <li> --}}
                          {{-- <a class="blogBlock__metaUser" href="#"> --}}
                            {{-- <img class="blogBlock__metaUser__thumb" src="{{ asset("image/users/user3.jpg") }}" alt="Gainioz User"> --}}
                            {{-- <span class="blogBlock__metaUser__name">{{ \App\Models\User::find($row->author)->firstname . " ".  \App\Models\User::find($row->author)->lastname }}</span> --}}
                          {{-- </a> --}}
                        {{-- </li> --}}
                        <li>
                          <button class="blogBlock__reactButton">
                            <span class="blogBlock__reactButton__count">{{ $row->likes }}</span>
                          </button>
                        </li>
                        <li>
                          <div class="blogBlock__date">
                            <span class="blogBlock__date__text">{{ \Carbon\Carbon::parse($row->created_at)->format("D M, Y") }}</span>
                            <i class="fa-regular fa-clock"></i>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
</section>
<!-- Blog End -->

@endsection
