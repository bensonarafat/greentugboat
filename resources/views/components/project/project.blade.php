@php
    $projectVolunteers = \App\Models\ProjectApplication::where(["project_id" => $d->id, "status" => "active"])->count();
@endphp
<div class="col-lg-4 col-sm-6 mb-35">
    <div class="featureBlock featureBlock--active">
        <div class="featureBlock__wrap">
            <figure class="featureBlock__thumb">
            <a class="featureBlock__thumb__link" href="/project/{{ $d->id }}/{{ $d->slug }}">
                <img src="{{ asset($d->featureimage) }}" alt="{{ $d->slug }}" style="width: 382px; height:215px;object-fit:cover;">
            </a>
            <a class="featureBlock__hashLink" href="/project/{{ $d->id }}/{{ $d->slug }}">
                <span class="featureBlock__hashLink__text">#{{ $d->status }}</span>
            </a>
            </figure>
            <div class="featureBlock__content">
            <h3 class="featureBlock__heading">
                <a class="featureBlock__heading__link" href="/project/{{ $d->id }}/{{ $d->slug }}">
                    {{ $d->title }}
                </a>
            </h3>
            <p class="featureBlock__text">
                {!! $d->content_filtered !!} ...
            </p>
            </div>
        </div>

        @if($d->status != "pending")
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
        @endif
        <div class="featureBlock__donation">
            <div class="featureBlock__eqn">
                @if($d->status != "pending")
                @auth
                    @if(\App\Models\User::isSponsor())
                    <div class="featureBlock__eqn__block" style="width:100%;margin-top:10px;">
                        <a class="btn" href="
                            {{ route("donate", $d->id) }}
                        " style="background: #7fb432 !important"
                        >
                            <span class="btn__text" style="color:white;"> Donate </span>
                        </a>
                    </div>
                    @else
                    <div class="featureBlock__eqn__block" style="width:100%;margin-top:10px;">
                        <a class="btn btn--primary  applyVolunter" style="background: #7fb432 !important" href="javascript:void(0)">
                            <span class="btn__text" style="color:white;">Would you like to register as a sponsor?</span>
                        </a>
                        <div class="volunteer-option" style="justify-content:space-evenly;display:none">
                            <a class="btn btn--primary" style="background: #7fb432 !important;width:40%;" href="/account/update-role-profile/sponsor">
                                <span class="btn__text" style="color:white;">Yes</span>
                            </a>
                            <a class="btn btn--primary js_application_back" style="background: #b43232 !important;width:40%;" href="javascript:void(0)">
                                <span class="btn__text" style="color:white;">No</span>
                            </a>
                        </div>
                    </div>
                    @endif
                @endauth
                @guest
                <div class="featureBlock__eqn__block" style="width:100%;margin-top:10px;">
                    <a class="btn login__action" href="javascript:void(0)" style="background: #7fb432 !important"
                            data-bs-toggle="modal" data-bs-target="#loginModal" data-type="donate" data-id="{{ $d->id }}">
                        <span class="btn__text" style="color:white;"> Donate </span>
                    </a>
                </div>
                @endguest


                @auth
                    @if (\App\Models\User::isVolunteer())
                        @if($d->volunteer != 0)
                            @if($d->volunteer >=  $projectVolunteers)
                                <div class="featureBlock__eqn__block" style="width:100%;margin-top:10px;">
                                    <a class="btn btn--primary" style="background: #eb9309 !important" href="@if(!\App\Models\ProjectApplication::hasVolunteer($d->id)) /project-application/{{ $d->id }}/volunteer @else javascript:void(0) @endif">
                                        <span class="btn__text" style="color:white;">@if(!\App\Models\ProjectApplication::hasVolunteer($d->id)) Volunteer @else Applied as Volunteer @endif</span>
                                    </a>
                                </div>
                            @endif
                        @endif
                    @else
                        @if($d->volunteer != 0)
                            @if($d->volunteer >=  $projectVolunteers)
                                <div class="featureBlock__eqn__block" style="width:100%;margin-top:10px;">
                                    <a class="btn btn--primary  applyVolunter" style="background: #eb9309 !important" href="javascript:void(0)">
                                        <span class="btn__text" style="color:white;">Would you like to register as a volunteer?</span>
                                    </a>
                                    <div class="volunteer-option" style="justify-content:space-evenly;display:none">
                                        <a class="btn btn--primary" style="background: #eb9309 !important;width:40%;" href="/account/update-role-profile/volunteer">
                                            <span class="btn__text" style="color:white;">Yes</span>
                                        </a>
                                        <a class="btn btn--primary js_application_back" style="background: #b43232 !important;width:40%;" href="javascript:void(0)">
                                            <span class="btn__text" style="color:white;">No</span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endif
                    @endif
                @endauth

                @guest
                    <div class="featureBlock__eqn__block" style="width:100%;margin-top:10px;">
                        <a class="btn btn--primary login_action" style="background: #eb9309 !important" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" data-type="volunteer" data-id="{{ $d->id }}">
                            <span class="btn__text" style="color:white;">Volunteer</span>
                        </a>
                    </div>
                @endguest
                @endif

                @auth
                    @if(\App\Models\User::isVendor())
                        @if($d->vendor_id == null)
                            <div class="featureBlock__eqn__block" style="width:100%;margin-top:10px;">
                                <a style="background:#973594 !important;" class="btn btn-block" href="@if(!\App\Models\ProjectApplication::hasVendor($d->id)) {{ route("vendor.bid", $d->id) }} @else javascript:void(0) @endif">
                                    <span class="btn__text" style="color:white;">@if(!\App\Models\ProjectApplication::hasVendor($d->id)) Bid @else Applied as vendor @endif</span>
                                </a>
                            </div>
                        @endif
                    @else
                        <div class="featureBlock__eqn__block" style="width:100%;margin-top:10px;">
                            <a class="btn btn--primary  applyVolunter" style="background: #973594 !important" href="javascript:void(0)">
                                <span class="btn__text" style="color:white;">Would you like to register as a vendor?</span>
                            </a>
                            <div class="volunteer-option" style="justify-content:space-evenly;display:none">
                                <a class="btn btn--primary" style="background: #973594 !important;width:40%;" href="account/update-role-profile/vendor">
                                    <span class="btn__text" style="color:white;">Yes</span>
                                </a>
                                <a class="btn btn--primary js_application_back" style="background: #b43232 !important;width:40%;" href="javascript:void(0)">
                                    <span class="btn__text" style="color:white;">No</span>
                                </a>
                            </div>
                        </div>
                    @endif
                @endauth
                @guest
                    <div class="featureBlock__eqn__block" style="width:100%;margin-top:10px;">
                        <a style="background:#973594 !important;" class="btn btn-block login_action" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal" data-type="vendor" data-id="{{ $d->id }}">
                            <span class="btn__text" style="color:white;">Bid</span>
                        </a>
                    </div>
                @endguest

            </div>
        </div>
    </div>
</div>
