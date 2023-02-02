@extends("layouts.app")
@section("title", "Projects")
@section("content")

@php
    $projectVolunteers = \App\Models\ProjectApplication::where(["project_id" => $project->id, "status" => "active"])->count();
@endphp
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
                <h2 class="pageTitle__heading text-white text-uppercase mb-25">{{ $project->title }}</h2>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Breadcumb End -->
      <!-- Donation Details -->
      <section class="donation pt-130 pb-100">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mb-30">
              <div class="innerWrapper">
                <div class="donationDetails">
                  <div class="donationDetails__header mb-45">

                    @include("layouts.alert")

                    <figure class="thumb mb-45 featureBlock__thumb">
                      <img src="{{ asset($project->featureimage) }}" alt="{{ $project->title }}" style="width: 850px; height:430px; object-fit:cover;">
                      <a class="featureBlock__hashLink" href="/project/{{ $project->id }}/{{ $project->slug }}">
                        <span class="featureBlock__hashLink__text">#{{ $project->status }}</span>
                        </a>
                    </figure>
                    <h3 class="donationDetails__title text-uppercase">{{ $project->title }}</h3>
                  </div>

                  @if($project->status != "pending")
                  <div class="featureBlock__donation featureBlock__donation--style2 mb-50">
                    <div class="featureBlock__donation__progress">
                      <div class="featureBlock__donation__bar">
                        <span class="featureBlock__donation__text skill-bar" data-width="{{ projectPercentage($project->id) }}%" style="width: {{ projectPercentage($project->id) }}%;">{{ projectPercentage($project->id) }}%</span>
                        <div class="featureBlock__donation__line">
                          <span class="skill-bars">
                          <span class="skill-bars__line skill-bar" data-width="{{ projectPercentage($project->id) }}%" style="width: {{ projectPercentage($project->id) }}%;"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="featureBlock__eqn">
                      <div class="featureBlock__eqn__block">
                        <span class="featureBlock__eqn__title">our goal</span>
                        <span class="featureBlock__eqn__price">@php echo naira() @endphp {{ number_format($project->budget, 2) }}</span>
                      </div>
                      <div class="featureBlock__eqn__block text-center">
                        <span class="featureBlock__eqn__title">Raised</span>
                        <span class="featureBlock__eqn__price">@php echo naira() @endphp {{ number_format($project->raised, 2) }}</span>
                      </div>
                      <div class="featureBlock__eqn__block text-end">
                        <span class="featureBlock__eqn__title">to go</span>
                        <span class="featureBlock__eqn__price">@php echo naira() @endphp {{ number_format(($project->budget - $project->raised) , 2) }}</span>
                      </div>
                    </div>
                  </div>
                  @endif

                  <div class="row">
                    <div class="donationDetails__cross mb-45 col-lg-8">
                        <p>
                            ꗮ Created {{ $project->created_at->diffForHumans() }} by {{\App\Models\User::find($project->author)->firstname . ' '. \App\Models\User::find($project->author)->lastname  }}
                        </p>
                      </div>
                      <div class="col-lg-4">
                        @include("components.project.share")
                      </div>
                  </div>

                  <p class="donationDetails__text mb-30">
                        @php echo $project->story @endphp
                  </p>

                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-30">
              <div class="sidebarLayout">

                @if($project->status != "pending")
                <div class="innerWrapperSidebar mb-30">
                    <div class="sidebarWidget">
                      <div class="sidebarTitle">
                        <h5 class="sidebarTitle__heading text-uppercase mb-30">Sponsor</h5>
                      </div>
                      <div class="sidebarCategories">

                    @if($project->status != "pending")
                            <div class="featureBlock__donation__progress">
                                <div class="featureBlock__donation__bar">
                                    <span class="featureBlock__donation__text skill-bar" data-width="{{ projectPercentage($project->id) }}%">{{ projectPercentage($project->id) }}%</span>
                                        <div class="featureBlock__donation__line">
                                        <span class="skill-bars">
                                            <span class="skill-bars__line skill-bar" data-width="{{ projectPercentage($project->id) }}%"></span>
                                        </span>
                                    </div>
                                    <strong>{{ count($donations) }} donations </strong>
                                </div>
                            </div>
                        @endif
                        @if($project->status == "active")
                            <div>
                                @auth
                                    @if(!\App\Models\User::isSponsor())
                                    <a class="btn btn--styleOne btn--secondary it-btn applyVolunter" style="width:100%;" >
                                        <span class="btn__text">Would you like to register as a sponsor?</span>
                                    </a>
                                    <div class="volunteer-option" style="justify-content:space-evenly;display:none">
                                        <a class="btn btn--styleOne btn--secondary it-btn" style="width:40%;" href="/account/update-role-profile/sponsor">
                                            <span class="btn__text">Yes</span>
                                        </a>
                                        <a class="btn btn--styleOne btn--secondary it-btn js_application_back" style="background:#b43232;width:40%;"  href="javascript:void(0)">
                                            <span class="btn__text">No</span>
                                        </a>
                                    </div>
                                    @else
                                    <div>
                                        <a class="btn btn--styleOne btn--secondary it-btn" style="width:100%;"  @if(\App\Models\User::isSponsor()) href="{{ route("donate", $project->id) }}" @endif>
                                            <span class="btn__text">@if(\App\Models\Donation::hasDonated($project->id)) Donate again @else donate now @endif</span>
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
                                    @endif
                                @endauth
                            </div>
                            @guest
                            <div>
                                <a class="btn btn--styleOne btn--secondary it-btn" style="width:100%;" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" >
                                    <span class="btn__text">donate now</span>
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
                            @endguest
                        @else
                            <div>
                                <a class="btn btn--styleOne btn--secondary it-btn" style="width:100%;background:#dc2626 !important;"  href="javascript:void(0)">
                                    <span class="btn__text"> Project {{ $project->status }}</span>
                                </a>
                            </div>
                        @endif

                      </div>
                    </div>
                </div>

                <div class="innerWrapperSidebar mb-30">
                    <div class="sidebarWidget">
                      <div class="sidebarTitle">
                        <h5 class="sidebarTitle__heading text-uppercase mb-30">Volunteer</h5>
                      </div>
                      <div class="sidebarCategories">
                        <div>
                            @auth
                                @if (!\App\Models\User::isVolunteer())
                                    <a class="btn btn--styleOne btn--secondary it-btn applyVolunter" style="width:100%;" >
                                        <span class="btn__text">Would you like to register as a volunteer?</span>
                                    </a>
                                    <div class="volunteer-option" style="justify-content:space-evenly;display:none">
                                        <a class="btn btn--styleOne btn--secondary it-btn" style="width:40%;" href="/account/update-role-profile/volunteer">
                                            <span class="btn__text">Yes</span>
                                        </a>
                                        <a class="btn btn--styleOne btn--secondary it-btn js_application_back" style="background:#b43232;width:40%;"  href="javascript:void(0)">
                                            <span class="btn__text">No</span>
                                        </a>
                                    </div>
                                @else
                                    @if($project->volunteer != 0)
                                        @if($project->volunteer >=  $projectVolunteers)
                                            <a class="btn btn--styleOne btn--secondary it-btn " style="width:100%;"  @if(!\App\Models\ProjectApplication::hasVolunteer($project->id)) @if(\App\Models\User::isVolunteer()) href="/project-application/{{ $project->id }}/volunteer" @endif @endif >
                                                <span class="btn__text">@if(\App\Models\ProjectApplication::hasVolunteer($project->id)) Applied as Volunteer @else Apply as Volunteer @endif</span>
                                            </a>
                                            <div class="volunteer-option" style="justify-content:space-evenly;display:none">
                                                <a class="btn btn--styleOne btn--secondary it-btn" style="width:40%;" >
                                                    <span class="btn__text">Yes</span>
                                                </a>
                                                <a class="btn btn--styleOne btn--secondary it-btn js_application_back" style="background:#b43232;width:40%;"  href="javascript:void(0)">
                                                    <span class="btn__text">No</span>
                                                </a>
                                            </div>

                                        @else
                                            <p>Sorry, we have reach the maximum number volunteers for this project</p>
                                        @endif
                                    @else
                                        <p>No volunteer is needed for this project</p>
                                    @endif
                                @endif
                            @endauth
                            @guest
                            <a class="btn btn--styleOne btn--secondary it-btn" style="width:100%;" @guest href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" @endguest >
                                <span class="btn__text"> Apply as Volunteer</span>
                            </a>
                            @endguest
                        </div>

                      </div>
                    </div>
                </div>
                @endif



                <div class="innerWrapperSidebar mb-30">
                    <div class="sidebarWidget">
                      <div class="sidebarTitle">
                        <h5 class="sidebarTitle__heading text-uppercase mb-30">Vendor</h5>
                      </div>
                      <div class="sidebarCategories">
                        @if($project->vendor_id != null)
                        <div class="text-center">
                            <div class="">
                                <img src="{{ asset(\App\Models\User::find($project->vendor_id)->photo) }}" alt="" style="width: 100px; height:100px; object-fit:cover;border-radius:100%;">
                            </div>
                            <h6>{{ \App\Models\User::find($project->vendor_id)->firstname }} {{ \App\Models\User::find($project->vendor_id)->lastname }}</h6>
                            <p>{{ \App\Models\User::find($project->vendor_id)->email }} <br/> {{ \App\Models\User::find($project->vendor_id)->mobile }}</p>
                        </div>
                        @else
                        <div>
                            @auth
                            @if(!\App\Models\User::isVendor())
                                <a class="btn btn--styleOne btn--secondary it-btn applyVolunter" style="width:100%;" >
                                    <span class="btn__text">Would you like to register as a vendor?</span>
                                </a>
                                <div class="volunteer-option" style="justify-content:space-evenly;display:none">
                                    <a class="btn btn--styleOne btn--secondary it-btn" style="width:40%;" href="/account/update-role-profile/vendor">
                                        <span class="btn__text">Yes</span>
                                    </a>
                                    <a class="btn btn--styleOne btn--secondary it-btn js_application_back" style="background:#b43232;width:40%;"  href="javascript:void(0)">
                                        <span class="btn__text">No</span>
                                    </a>
                                </div>
                            @else
                                <a class="btn btn--styleOne btn--secondary it-btn" style="width:100%;" @if(!\App\Models\ProjectApplication::hasVendor($project->id)) @if(\App\Models\User::isVendor()) href=" {{ route("vendor.bid", $project->id) }} " @endif @endif >
                                    <span class="btn__text">@if(\App\Models\ProjectApplication::hasVendor($project->id)) Applied as Vendor @else Apply as Vendor @endif </span>
                                </a>
                            @endif
                            @endauth

                            @guest
                            <a class="btn btn--styleOne btn--secondary it-btn" style="width:100%;" @guest href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" @endguest >
                                <span class="btn__text">Apply as Vendor </span>
                            </a>
                            @endguest
                        </div>

                        @endif
                      </div>
                    </div>
                </div>

                <div class="innerWrapperSidebar mb-30">
                  <div class="sidebarWidget">
                    <div class="sidebarTitle">
                      <h5 class="sidebarTitle__heading text-uppercase mb-30">categories</h5>
                    </div>
                    <div class="sidebarCategories">
                      <ul>
                        @foreach ($categories as $row)
                            <li>
                            <a href="#">
                              <span>{{ $row->name }}</span>
                              <span>{{ \App\Models\Project::where(["status" => "active", "category_id" => $row->id])->count(); }}</span>
                            </a>
                          </li>
                        @endforeach

                      </ul>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Donation Details End -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>
        $( document ).ready(function() {

            $('.applyVolunter').on("click", function(){
                let _this = $(this);
                _this.css("display","none");
                let mparent = _this.parent();
                let option = mparent.find(".volunteer-option");
                option.css("display","flex");
            })

            $('.js_application_back').on("click", function(){
                let _this = $(this);
                $('.volunteer-option').css("display","none");
                $('.applyVolunter').css("display","block");

            })
        });
      </script>
@endsection
