@extends("layouts.app")
@section("title", $event->title )
@section("content")

    <!-- Header Style One End -->
    <!-- Page Breadcumb -->
    <section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="{{ asset("image/bg/pageBreadcumbBg1.jpg") }}">
        <div class="pageBreadcumbTopDown">
          <a class="btn btn--styleOne btn--icon btn--icon2 it-btn" href="donation-listing.html">
            <svg class="btn__icon" width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.869141 8.70508L1.45508 8.11914C1.60156 8.00195 1.80664 8.00195 1.95312 8.14844L4.23828 10.4922V0.414062C4.23828 0.208984 4.38477 0.0625 4.58984 0.0625H5.41016C5.58594 0.0625 5.76172 0.208984 5.76172 0.414062V10.4922L8.01758 8.14844C8.16406 8.00195 8.36914 8.00195 8.51562 8.11914L9.10156 8.70508C9.21875 8.85156 9.21875 9.05664 9.10156 9.20312L5.23438 13.0703C5.08789 13.1875 4.88281 13.1875 4.73633 13.0703L0.869141 9.20312C0.751953 9.05664 0.751953 8.85156 0.869141 8.70508Z" fill="#60646B" />
            </svg>
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
        <div class="sectionShape sectionShape--top">
          <img src="{{ asset("image/shapes/pagebreadcumbShapeTop.svg") }}" alt="Event">
        </div>
        <div class="sectionShape sectionShape--bottom">
          <img src="{{ asset("image/shapes/pagebreadcumbShapeBottom.svg") }}" alt="Event">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="pageTitle text-center">
                <h2 class="pageTitle__heading text-white text-uppercase mb-25">Event</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $event->title }}</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Breadcumb End -->
      <!-- stories Details -->
      <section class="stories pt-130 pb-100">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mb-30">
              <div class="innerWrapper">
                <div class="donationDetails storiesDetails">
                  <div class="donationDetails__header mb-45">
                    <figure class="thumb mb-45">
                      <img src="image/utilites/event-details1.jpg" alt="{{ $event->title }}">
                    </figure>
                  </div>
                  <h3 class="eventsBlock__heading text-uppercase">
                    {{ $event->title }}
                  </h3>
                  <div class="eventsBlock__meta">
                    <ul>
                      <li>
                        <span class="eventsBlock__meta__title">Featured :</span>
                        <span class="eventsBlock__meta__text">{{ \Carbon\Carbon::parse($event->startdate)->format("H:i:s d m, y") }} - {{ \Carbon\Carbon::parse($event->enddate)->format("H:i:s d m, y") }}</span>
                      </li>
                      <li>
                        <span class="eventsBlock__meta__title">Venue :</span>
                        <span class="eventsBlock__meta__text">{{ $event->venue }}</span>
                      </li>
                    </ul>
                  </div>
                  <p class="donationDetails__text storiesDetails__text storiesDetails__text--first mb-30">{{ $event->content }}
                  </p>



                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-30">
              <div class="innerWrapperSidebar">
                <div class="sidebarWidget">
                  <div class="sidebarTitle">
                    <h5 class="sidebarTitle__heading text-uppercase mb-30">Direct Contact us</h5>
                  </div>
                  <div class="sidebarContacts">
                    <input type="text" class="sidebarContacts__input" placeholder="Enter name*">
                    <input type="email" class="sidebarContacts__input" placeholder="Enter your mail*">
                    <textarea class="sidebarContacts__input textarea" name="message" id="message" placeholder="Massage*"></textarea>
                    <a class="btn btn--styleOne btn--primary it-btn" href="donation-listing.html">
                      <span class="btn__text">send massage</span>
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
            </div>
          </div>
        </div>
      </section>
      <!-- Donation Details End -->

@endsection
