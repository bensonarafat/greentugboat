@extends("layouts.app")
@section("title", "About")
@section("content")

<!-- Page Breadcumb -->
<section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="{{ asset("image/bg/pageBreadcumbBg1.jpg") }}">

    <div class="sectionShape sectionShape--top">
        <img src="{{ asset("image/shapes/pagebreadcumbShapeTop.svg") }}" alt="Gainioz">
    </div>
    <div class="sectionShape sectionShape--bottom">
        <img src="{{ asset("image/shapes/pagebreadcumbShapeBottom.svg") }}" alt="Gainioz">
    </div>
    <div class="container">
        <div class="row">
        <div class="col-12">
            <div class="pageTitle text-center">
            <h2 class="pageTitle__heading text-white text-uppercase mb-25">The GREEN TUGBOAT INITIATIVE</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">about us</li>
                </ol>
            </nav>
            </div>
        </div>
        </div>
    </div>
</section>
    <!-- Page Breadcumb End -->
<!-- About -->
<section class="about pt-120 pb-105">
<div class="container">
    <div class="row">
    <div class="col-12">
        <!-- Section Heading/Title -->
        <div class="sectionTitle text-center mb-30">
        <span class="sectionTitle__small justify-content-center">
        <i class="fa-solid fa-heart btn__icon"></i>
        about foundation
        </span>
        <h2 class="sectionTitle__big">{{ pagesContent("about", "foundation")->title }}</h2>
        </div>
        <!-- Section Heading/Title End -->
    </div>
    <div class="col-lg-10 mx-auto">
        <div class="aboutDetails text-center">
            <p class="aboutDetailsText mb-20">
                @php echo pagesContent("about", "foundation")->content @endphp
            </p>
        </div>
    </div>
    </div>
</div>
</section>
<!-- About End -->
      <!-- About Feature -->
      <div class="about position-relative">
        <img src="{{ asset("image/map/map-about-tab.svg") }}" alt="Gainioz" class="map-about-tab">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="featureTab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="aims">
                    <button class="nav-link active" id="aims-tab" data-bs-toggle="tab" data-bs-target="#aims" type="button" role="tab" aria-controls="aims" aria-selected="true">Aims and Objectives</button>
                  </li>
                  <li class="nav-item" role="visions">
                    <button class="nav-link" id="vision-tab" data-bs-toggle="tab" data-bs-target="#vision" type="button" role="tab" aria-controls="vision" aria-selected="false">the vision</button>
                  </li>
                  <li class="nav-item" role="mission">
                    <button class="nav-link" id="mission-tab" data-bs-toggle="tab" data-bs-target="#mission" type="button" role="tab" aria-controls="mission" aria-selected="false">our mission</button>
                  </li>
                </ul>
                <div class="tab-content pt-55" id="myTabContent">
                  <div class="tab-pane fade show active" id="aims" role="tabpanel" aria-labelledby="aims-tab">
                    <div class="row">
                      <div class="col-lg-10 mx-auto">
                        <div class="aboutDetails text-center">
                          <p class="aboutDetailsText mb-20">
                            <h6> @php echo pagesContent("about", "aims-objectives")->content @endphp </h6>
                        </p>
                          </p>
                        </div>
                        <div class="aboutDetailsThumbs pt-100">
                          <div class="row g-0 align-items-center">
                                <div class="col-lg-4">
                                    <div class="aboutDetailsThumb">
                                        <img src="{{ asset(pagesContent("about", "aims-objectives")->image) }}" alt="aims-objectives">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="aboutDetailsThumb aboutDetailsThumb--big">
                                        <img src="{{ asset(pagesContent("about", "aims-objectives")->icon) }}" alt="aims-objectives">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="aboutDetailsThumb">
                                        <img src="{{ asset(pagesContent("about", "aims-objectives")->email) }}" alt="aims-objectives">
                                    </div>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                    <div class="row">
                      <div class="col-lg-10 mx-auto">
                        <div class="aboutDetails text-center">
                          <p class="aboutDetailsText mb-20">
                              <h6>@php echo pagesContent("about", "vision")->content @endphp</h6>
                          </p>
                        </div>
                        <div class="aboutDetailsThumbs pt-100">
                          <div class="row g-0 align-items-center">
                                <div class="col-lg-4">
                                    <div class="aboutDetailsThumb">
                                        <img src="{{ asset(pagesContent("about", "vision")->image) }}" alt="vision">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="aboutDetailsThumb aboutDetailsThumb--big">
                                        <img src="{{ asset(pagesContent("about", "vision")->icon) }}" alt="vision">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="aboutDetailsThumb">
                                        <img src="{{ asset(pagesContent("about", "vision")->email) }}" alt="vision">
                                    </div>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                    <div class="row">
                      <div class="col-lg-10 mx-auto">
                        <div class="aboutDetails text-center">
                          <p class="aboutDetailsText mb-20">
                              <h6>@php echo pagesContent("about", "mission")->content @endphp</h6>
                          </p>
                        </div>
                        <div class="aboutDetailsThumbs pt-100">
                          <div class="row g-0 align-items-center">

                            <div class="col-lg-4">
                                <div class="aboutDetailsThumb">
                                    <img src="{{ asset(pagesContent("about", "mission")->image) }}" alt="mission">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="aboutDetailsThumb aboutDetailsThumb--big">
                                    <img src="{{ asset(pagesContent("about", "mission")->icon) }}" alt="mission">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="aboutDetailsThumb">
                                    <img src="{{ asset(pagesContent("about", "mission")->icon) }}" alt="mission">
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
          </div>
        </div>
      </div>
      <div class="about position-relative pt-125 pb-95" style="margin-top: 96px">
        <img src="{{ asset("image/map/map-about-tab.svg") }}" alt="Gainioz" class="map-about-tab">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="featureTab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="values-tab" data-bs-toggle="tab" data-bs-target="#values" type="button" role="tab" aria-controls="values" aria-selected="false">our core values</button>
                  </li>
                   <li class="nav-item" role="presentation">
                    <button class="nav-link" id="strategy-tab" data-bs-toggle="tab" data-bs-target="#strategy" type="button" role="tab" aria-controls="strategy" aria-selected="false">our stratergy and methods</button>
                  </li>
                </ul>
                <div class="tab-content pt-55" id="myTabContent">
                  <div class="tab-pane fade show active" id="values" role="tabpanel" aria-labelledby="values-tab">
                    <div class="row">
                      <div class="col-lg-10 mx-auto">
                        <div class="aboutDetails text-center">
                          <p class="aboutDetailsText mb-20">
                           <h6> @php echo pagesContent("about", "core-value")->content @endphp </h6>
                        </p>
                          </p>
                        </div>
                        <div class="aboutDetailsThumbs pt-100">
                          <div class="row g-0 align-items-center">

                            <div class="col-lg-4">
                                <div class="aboutDetailsThumb">
                                    <img src="{{ asset( pagesContent("about", "core-value")->image) }}" alt="core-value">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="aboutDetailsThumb aboutDetailsThumb--big">
                                    <img src="{{ asset( pagesContent("about", "core-value")->icon) }}" alt="core-value">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="aboutDetailsThumb">
                                    <img src="{{ asset( pagesContent("about", "core-value")->email) }}" alt="core-value">
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="strategy" role="tabpanel" aria-labelledby="strategy-tab">
                    <div class="row">
                      <div class="col-lg-10 mx-auto">
                        <div class="aboutDetails text-center">
                          <p class="aboutDetailsText mb-20">
                           <h6> @php echo pagesContent("about", "stratergy-methods")->content @endphp </h6>
                        </p>
                          </p>
                        </div>
                        <div class="aboutDetailsThumbs pt-100">
                          <div class="row g-0 align-items-center">

                            <div class="col-lg-4">
                                <div class="aboutDetailsThumb">
                                    <img src="{{ asset(pagesContent("about", "stratergy-methods")->image) }}" alt="stratergy-methods">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="aboutDetailsThumb aboutDetailsThumb--big">
                                    <img src="{{ asset(pagesContent("about", "stratergy-methods")->icon) }}" alt="stratergy-methods">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="aboutDetailsThumb">
                                    <img src="{{ asset(pagesContent("about", "stratergy-methods")->email) }}" alt="stratergy-methods">
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
          </div>
        </div>
      </div>
      <!-- About Feature -->

      <!-- Volunteers -->
<section class="volunteersSection pb-120">
    <div class="container">
        <div class="row">
        <div class="col-12">
            <!-- Section Heading/Title -->
            <div class="sectionTitle text-center mb-70">
            <span class="sectionTitle__small justify-content-center">
            <i class="fa-solid fa-heart btn__icon"></i>
            We Change Your Life & World
            </span>
            <h2 class="sectionTitle__big">Meet Our Volunteers</h2>
            </div>
            <!-- Section Heading/Title End -->
        </div>
        </div>
        <div class="row">
            @php
                $data = pagesContent("about", "volunteers", "volunteers", true);
            @endphp
            @foreach ($data as $row)
                <div class="col-lg-3 col-md-6 mb-45">
                    <div class="volunteerBlock text-center">
                    <figure class="volunteerBlock__figure">
                        <img class="volunteerBlock__figure__thumb" src="{{ asset($row->icon) }}" alt="Gainioz Volunteers">
                    </figure>
                    <div class="volunteerBlock__content">
                        <h3 class="volunteerBlock__name text-uppercase text-center">
                        <a href="#">{{ $row->name }}</a>
                        </h3>
                        <div class="itSocial itSocial--volunteer">
                        <ul>
                            <li>
                            <a class="facebook" href="{{ $row->facebook }}" rel="nofollow">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            </li>
                            <li>
                            <a class="twitter" href="{{ $row->twitter }}" rel="nofollow">
                                <i class="fab fa-twitter"></i>
                            </a>
                            </li>
                            <li>
                            <a class="instagram" href="{{ $row->instagram }}" rel="nofollow">
                                <i class="fab fa-instagram"></i>
                            </a>
                            </li>
                            <li>
                            <a class="linkedin" href="{{ $row->linkedin }}" rel="nofollow">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            </li>
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach

        <div class="col-12">
            <div class="sectionButton text-center pt-35">
            <a class="btn btn--styleOne btn--primary it-btn" href="/users?type=volunteers">
                <span class="btn__text">see all Volunteers</span>
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
    </div>
</section>
<!-- Volunteers End -->
@endsection
