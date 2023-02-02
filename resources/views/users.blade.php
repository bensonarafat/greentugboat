@extends("layouts.app")
@section("title", "Users")
@section("content")
    <!-- Page Breadcumb -->
    <section class="pageBreadcumb pageBreadcumb--style1 position-relative" data-bg-image="image/bg/pageBreadcumbBg1.jpg">
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
        <img src="image/shapes/pagebreadcumbShapeTop.svg" alt="Gainioz">
      </div>
      <div class="sectionShape sectionShape--bottom">
        <img src="image/shapes/pagebreadcumbShapeBottom.svg" alt="Gainioz">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="pageTitle text-center">
              <h2 class="pageTitle__heading text-white text-uppercase mb-25">{{ $type }}</h2>
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
    <!-- Product List -->
    <div class="productTop pt-130 pb-90">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="shopFilter__tab mb-20">
              <div class="row align-items-center">
                <div class="col">
                  <div class="product-result">
                    <span>Showing <span>@if(request()->has("page")) {{ request()->get("page") }} @else 1 @endif –{{ count($users) }}</span> of <span>{{ $count }}</span> Results</span>
                  </div>
                </div>
                <div class="col">
                 <form method="GET" action="" id="filterUser">
                    <input type="hidden" name="type" value="{{ strtolower($type) }}">
                    <div class="shopFilter__tab__right">
                        <div class="userProfileFilter">
                          <select class="userProfileFilter__sort" name="sort" id="sort" onchange="event.preventDefault(); document.getElementById('filterUser').submit();">
                            <option value="new">Short by New</option>
                            <option value="old">Short by Old</option>
                          </select>
                        </div>
                      </div>
                 </form>

                </div>
              </div>
            </div>
            <div class="shopFilter__body">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row">
                    @foreach ($users as $user)
                    <div class="col-lg-3 mb-24">
                        <div class="productBlock">
                          <figure class="productBlock__thumb">
                            <div class="productBlock__thumb__main">
                              <a href="/user-details/{{ $user->username }}">
                                <img src="{{ asset($user->photo) }}" alt="{{ $user->firstname . ' '. $user->lastname }}" style="width:164px; height:152px; object-fit: cover">
                              </a>
                            </div>
                            <div class="productBlock__thumb__hover">
                              <a href="/user-details/{{ $user->username }}">
                                <img src="{{ asset($user->photo) }}" alt="{{ $user->firstname . ' '. $user->lastname }}"  style="width:164px; height:152px;object-fit: cover">
                              </a>
                            </div>
                          </figure>
                          <div class="productBlock__content">
                            <div class="productBlock__content__main">
                              <h3 class="productBlock__name"><a href="/user-details/{{ $user->username }}">{{ $user->firstname . ' '. $user->lastname }}</a></h3>
                              <span class="">{{ $user->address }}</span>

                            </div>
                            <div class="productBlock__content__hover">
                              <div class="productBlock__actions">
                                <button onclick="window.location.href='/user-details/{{ $user->username }}?type=past'" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="Past Projects">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                                </button>
                                <button onclick="window.location.href='/user-details/{{ $user->username }}?type=active'"  class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title data-bs-original-title="Active Projects">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ccc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                                </button>
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
            <div class="row">
              <div class="col-12">
                <div class="paginationBlock">
                    {{ $users->links('layouts.include.pagination') }}
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Product List End -->
@endsection
