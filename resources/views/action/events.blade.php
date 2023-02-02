@extends("layouts.app")
@section("title", "Events")
@section("content")

   <!-- Mobile Menu Navbar End -->
    <!-- Header Style One End -->
    <!-- Page Breadcumb -->
    <section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="{{ asset("image/bg/pageBreadcumbBg1.jpg") }}">
        <div class="pageBreadcumbTopDown">
          <a class="btn btn--styleOne btn--icon btn--icon2 it-btn" href="/">
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
          <img src="{{ asset("image/shapes/pagebreadcumbShapeTop.svg") }}" alt="Events">
        </div>
        <div class="sectionShape sectionShape--bottom">
          <img src="{{ asset("image/shapes/pagebreadcumbShapeBottom.svg") }}" alt="Events">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="pageTitle text-center">
                <h2 class="pageTitle__heading text-white text-uppercase mb-25">Events</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">events</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Breadcumb End -->
      <!-- Events -->
      <section class="events pt-130 pb-80">
        <div class="container">
          <div class="row">
            @foreach ($events as $row)
            <div class="col-12 mb-30">
                <div class="eventsBlock">
                  <figure class="eventsBlock__thumb">
                    <a href="action/event/{{ $row->id }}/{{ $row->slug }}" class="eventsBlock__thumb__link">
                      <img src="{{ asset($row->featureimage) }}" alt="{{ $row->title }}" style="width:497px;height:499px;object-fit:contain;" class="eventsBlock__thumb__image">
                    </a>
                  </figure>
                  <div class="eventsBlock__content">
                    <h3 class="eventsBlock__heading text-uppercase">
                      <a href="action/event/{{ $row->id }}/{{ $row->slug }}">{{ $row->title }}</a>
                    </h3>
                    <div class="eventsBlock__meta">
                      <ul>
                        <li>
                          <span class="eventsBlock__meta__title">Featured :</span>
                          <span class="eventsBlock__meta__text">{{ \Carbon\Carbon::parse($row->startdate)->format("H:i:s d m, y") }} - {{ \Carbon\Carbon::parse($row->enddate)->format("H:i:s d m, y") }} </span>
                        </li>
                        <li>
                          <span class="eventsBlock__meta__title">Venue :</span>
                          <span class="eventsBlock__meta__text">{{ $row->venue }}</span>
                        </li>
                      </ul>
                    </div>
                    <p class="eventsBlock__text">{{ $row->content_filtered }} ...</p>
                    <a href="action/event/{{ $row->id }}/{{ $row->slug }}" class="eventsBlock__detailsLink">
                      Read more
                      <svg width="61" height="12" viewBox="0 0 61 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M60.5303 6.53033C60.8232 6.23744 60.8232 5.76256 60.5303 5.46967L55.7574 0.696699C55.4645 0.403806 54.9896 0.403806 54.6967 0.696699C54.4038 0.989593 54.4038 1.46447 54.6967 1.75736L58.9393 6L54.6967 10.2426C54.4038 10.5355 54.4038 11.0104 54.6967 11.3033C54.9896 11.5962 55.4645 11.5962 55.7574 11.3033L60.5303 6.53033ZM0 6.75H60V5.25H0V6.75Z" fill="#0D0D0D" />
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            @endforeach

          </div>
        </div>
      </section>
      <!-- Events End -->
@endsection
