@extends("layouts.app")
@section("title", $user->firstname . ' '. $user->lastname )
@section("content")
<!-- Page Breadcumb -->
<section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="{{ asset("image/bg/pageBreadcumbBg1.jpg") }}">
    <div class="sectionShape sectionShape--top">
      <img src="{{ asset("image/shapes/pagebreadcumbShapeTop.svg") }}" alt="Gainioz">
    </div>
    <div class="sectionShape sectionShape--bottom">
      <img src="image/shapes/pagebreadcumbShapeBottom.svg" alt="Gainioz">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="pageTitle text-center">
            <h2 class="pageTitle__heading text-white text-uppercase mb-25">The GREEN TUGBOAT INITIATIVE</h2>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $type }}</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Page Breadcumb End -->
    <!-- About Feature -->
    <div class="about position-relative pt-125 pb-130">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <!-- Section Heading/Title -->
              <div class="sectionTitle text-center mb-70">
                <span class="sectionTitle__small justify-content-center">
                  <i class="fa-solid fa-heart btn__icon"></i>
                  Project listing
                </span>
                <h2 class="sectionTitle__big">{{ $type }}</h2>
              </div>
              <!-- Section Heading/Title End -->
            </div>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="row gx-3">
                    @foreach ($projects as $d)
                        <div class="col-lg-4 col-sm-6 mb-35">
                            <div class="featureBlock featureBlock--active">
                            <div class="featureBlock__wrap">
                                <figure class="featureBlock__thumb">
                                <a class="featureBlock__thumb__link" href="/project/{{ $d->id }}/{{ $d->slug }}">
                                    <img src="{{ asset($d->featureimage) }}" alt="Gainioz Featured Thumb">
                                </a>
                                <a class="featureBlock__hashLink" href="/project/{{ $d->id }}/{{ $d->slug }}">
                                    <span class="featureBlock__hashLink__text">#Live</span>
                                </a>
                                </figure>
                                <div class="featureBlock__content">
                                <h3 class="featureBlock__heading">
                                    <a class="featureBlock__heading__link" href="/project/{{ $d->id }}/{{ $d->slug }}">
                                        {{ $d->title }}
                                    </a>
                                </h3>
                                <p class="featureBlock__text">
                                    {{ $d->content_filtered }}
                                </p>
                                </div>
                            </div>
                            <div class="featureBlock__donation">
                                <div class="featureBlock__donation__progress">
                                <div class="featureBlock__donation__bar">
                                    <span class="featureBlock__donation__text skill-bar" data-width="{{ projectPercentage($d->id) }}%">{{ projectPercentage($d->id) }}%</span>
                                    <div class="featureBlock__donation__line">
                                    <span class="skill-bars">
                                    <span class="skill-bars__line skill-bar" data-width="{{ projectPercentage($d->id) }}%"></span>
                                    </span>
                                    </div>
                                </div>
                                </div>
                                <div class="featureBlock__eqn">
                                    <div class="featureBlock__eqn__block">
                                        <span class="featureBlock__eqn__title">Our goal</span>
                                        <span class="featureBlock__eqn__price">@php echo naira() @endphp {{ number_format($d->budget, 2) }} </span>
                                    </div>
                                    <div class="featureBlock__eqn__block">
                                        <span class="featureBlock__eqn__title">Raised</span>
                                        <span class="featureBlock__eqn__price">@php echo naira() @endphp {{ number_format($d->raised, 2) }}</span>
                                    </div>
                                    <div class="featureBlock__eqn__block">
                                        <span class="featureBlock__eqn__title">to go</span>
                                        <span class="featureBlock__eqn__price">@php echo naira() @endphp {{ number_format(($d->budget - $d->raised) , 2) }}</span>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
          </div>

          </div>
        </div>
      <!-- About Feature -->
@endsection

