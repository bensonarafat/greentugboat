
@extends("layouts.dashboard.app")
@section("title", "Account " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="pd-30">
          <h4 class="tx-gray-800 mg-b-5">Dashboard</h4>
          <p class="mg-b-0">{{ config("app.name") }}</p>
        </div><!-- d-flex -->

        <div class="br-pagebody mg-t-5 pd-x-10">
          <div class="row row-sm">
            @if(getPermission("viewUsers"))
                <div class="col-sm-6 col-xl-3">
                    <a href="{{ route("people") }}">
                        <div class="bg-teal rounded overflow-hidden">
                            <div class="pd-25 d-flex align-items-center">
                            <i class="ion ion-ios-people-outline tx-60 Wlh-0 tx-white op-7"></i>
                            <div class="mg-l-20">
                                <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Users</p>
                                <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $countUser }}</p>
                            </div>
                            </div>
                        </div>
                    </a>
                </div><!-- col-3 -->
            @endif
            @if(getPermission("viewProjects"))
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <a href="{{ route("manage.projects") }}">
                    <div class="bg-danger rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                          <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                          <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Projects</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $countProject }}</p>
                          </div>
                        </div>
                    </div>
                </a>
            </div><!-- col-3 -->
            @endif
            @if(getPermission("viewProjects"))
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <a href="/account/projects?status=open">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                          <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                          <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Open goals</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $openProjects }}</p>
                          </div>
                        </div>
                    </div>
                </a>
            </div><!-- col-3 -->
            @endif
            @if(getPermission("viewProjects"))
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <a href="/account/projects?status=completed">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                          <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                          <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Completed goals</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $completedProjects }}</p>
                          </div>
                        </div>
                    </div>
                </a>
            </div><!-- col-3 -->
            @endif
          </div><!-- row -->

          <div class="row row-sm mt-2">
            @if(getPermission("viewPosts"))
            <div class="col-sm-6 col-xl-3">
                <a href="{{ route("new.post") }}">
                    <div class="bg-teal rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                          <i class="ion ion-compose  tx-60 lh-0 tx-white op-7"></i>
                          <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Posts</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $totalPosts }}</p>
                          </div>
                        </div>
                    </div>
                </a>
            </div><!-- col-3 -->
            @endif
            @if(getPermission("viewComments"))
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <a href="{{ route("comments") }}">
                    <div class="bg-danger rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                          <i class="ion ion-android-textsms tx-60 lh-0 tx-white op-7"></i>
                          <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Comments</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $totalComments }}</p>
                          </div>
                        </div>
                    </div>
                </a>
            </div><!-- col-3 -->
            @endif
            @if(getPermission("viewCategories"))
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <a href="{{ route("categories") }}">
                    <div class="bg-primary rounded overflow-hidden">
                        <div class="pd-25 d-flex align-items-center">
                          <i class="ion ion-ios-photos-outline tx-60 lh-0 tx-white op-7"></i>
                          <div class="mg-l-20">
                            <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Categories</p>
                            <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $totalCategories }}</p>
                          </div>
                        </div>
                    </div>
                </a>
            </div><!-- col-3 -->
            @endif
            @if(getPermission("viewDonations"))
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-primary rounded overflow-hidden">
                  <div class="pd-25 d-flex align-items-center">
                    <i class="ion ion-android-folder-open tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Donations</p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $countDonation }}</p>
                    </div>
                  </div>
                </div>
              </div><!-- col-3 -->
              @endif
          </div><!-- row -->
          {{-- @if(auth()->user()->type == "user") --}}
          <div class="row row-sm mt-2">
            @if(\App\Models\User::isVendor())
            <div class="col-sm-4 col-xl-4 mg-t-20 mg-sm-t-0">
                <div class="bg-danger rounded overflow-hidden">
                  <div class="pd-25 d-flex align-items-center">
                    <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Vendor Bids</p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $countProject }}</p>
                    </div>
                  </div>
                </div>
            </div><!-- col-3 -->
            @endif
            @if(\App\Models\User::isVolunteer())
            <div class="col-sm-4 col-xl-4 mg-t-20 mg-sm-t-0">
                <div class="bg-secondary rounded overflow-hidden">
                  <div class="pd-25 d-flex align-items-center">
                    <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Volunteer Bids</p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $countProject }}</p>
                    </div>
                  </div>
                </div>
            </div><!-- col-3 -->
            @endif
            @if(\App\Models\User::isSponsor())
            <div class="col-sm-4 col-xl-4 mg-t-20 mg-xl-t-0">
                <div class="bg-primary rounded overflow-hidden">
                  <div class="pd-25 d-flex align-items-center">
                    <i class="ion ion-android-folder-open tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                      <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase tx-white-8 mg-b-10">Total Sponsored</p>
                      <p class="tx-24 tx-white tx-lato tx-bold mg-b-2 lh-1">{{ $countDonation }}</p>
                    </div>
                  </div>
                </div>
            </div><!-- col-3 -->
            @endif
          </div>
          {{-- @endif --}}
          <div class="row row-sm mg-t-20">

            <div class="col-8">
                @if(getPermission("viewDonations"))
                    <div class="card pd-0 bd-0 shadow-base">
                        <div class="pd-x-30 pd-t-30 pd-b-15">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                            <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Donation Performance</h6>
                            </div>
                        </div><!-- d-flex -->
                        </div>
                        <div class="pd-x-15 pd-b-15">
                            {!! $chart->container() !!}
                            {!! $chart->script() !!}
                        </div>
                    </div><!-- card -->
                @endif
             @if(getPermission("viewUsers"))
              <div class="card bd-0 shadow-base pd-30 mg-t-20">
                <div class="d-flex align-items-center justify-content-between mg-b-30">
                  <div>
                    <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Newly Registered Users</h6>
                  </div>
                  <a href="{{ route("people") }}" class="btn btn-outline-info btn-oblong tx-11 tx-uppercase tx-mont tx-medium tx-spacing-1 pd-x-30 bd-2">See more</a>
                </div><!-- d-flex -->

                <div class="table-responsive">
                    <table class="table table-valign-middle mg-b-0">
                        <tbody>
                          @foreach ($users as $row)
                              <tr>
                                  <td class="pd-l-0-force">
                                  <img src="@if($row->photo) {{ asset($row->photo) }} @else {{ asset("image/users/user.svg") }} @endif" class="wd-40 rounded-circle ht-40" alt="{{ $row->firstname .' '. $row->lastname }}">
                                  </td>
                                  <td>
                                  <h6 class="tx-inverse tx-14 mg-b-0">{{ $row->firstname . ' '. $row->lastname }}</h6>
                                  <span class="tx-12">{{ $row->email }}</span>
                                  </td>
                                  <td>{{ \Carbon\Carbon::parse($row->created_at)->format("D M, Y"); }}</td>
                                  <td>{!! userStatus($row->status) !!}</td>
                                  <td class="pd-r-0-force tx-center"><a href="/account/people/view/{{ $row->id }}/{{ $row->username }}" class="tx-gray-600"><i class="icon ion-eye tx-18 lh-0"></i></a></td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
              </div><!-- card -->
              @endif
              @if(getPermission("viewDonations"))
              <div class="card shadow-base card-body pd-25 bd-0 mg-t-20">
                <div class="row">
                  <div class="col-sm-6">
                    <h6 class="card-title tx-uppercase tx-12">LIVE DONATION</h6>
                    <p class="display-4 tx-medium tx-inverse mg-b-5 tx-lato">{{ $percentage_raised }}%</p>
                    <div class="progress mg-b-10">
                      <div class="progress-bar bg-primary progress-bar-xs wd-30p" role="progressbar" aria-valuenow="{{ $percentage_raised }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><!-- progress -->
                    <p class="tx-12">DIRECT SPONSORSHIPS</p>

                  </div><!-- col-6 -->
                  <div class="col-sm-6 mg-t-20 mg-sm-t-0 d-flex align-items-center justify-content-center">
                    @php echo naira() @endphp {{ number_format($total_raised, 2) }}/ @php echo naira() @endphp {{ number_format($total_budget,2) }}
                  </div><!-- col-6 -->
                </div><!-- row -->
              </div><!-- card -->
              @endif

            </div><!-- col-9 -->

            @if(auth()->user()->type == "user")
            <div class="col-12">
                <div class="card bd-0 shadow-base pd-30 mg-t-20">
                    <div class="d-flex align-items-center justify-content-between mg-b-30">
                      <div>
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Projects</h6>
                      </div>
                    </div><!-- d-flex -->
                    <div class="table-responsive">
                        <table class="table table-valign-middle mg-b-0">
                            <thead>
                                <tr>
                                <th class="">ID</th>
                                <th class="">Title</th>
                                <th class="">Created By</th>
                                <th class="">Supervisor</th>
                                <th class="">Start Date</th>
                                <th class="">Deadline</th>
                                <th class="">Budget</th>
                                <th class="">Raised</th>
                                <th class="">Status</th>
                                <th class="">Date</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($projects as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route("view.project", $row->id) }}">{{ ucfirst($row->title) }}</a></td>
                                            <td>{{ \App\Models\User::find($row->author)->firstname . ' '. \App\Models\User::find($row->author)->lastname  }}</td>
                                            <td>@if($row->supervisor_id) {{ \App\Models\User::find($row->supervisor_id)->firstname . ' '. \App\Models\User::find($row->supervisor_id)->lastname  }} @else -- @endif</td>
                                            <td>{{ \Carbon\Carbon::parse($row->start_date)->format("Y-m-d") }}</td>
                                            <td>{{ \Carbon\Carbon::parse($row->deadline)->format("Y-m-d") }}</td>
                                            <td>@php echo naira(); @endphp {{ number_format($row->budget, 2) }}</td>
                                            <td>@php echo naira(); @endphp {{ number_format($row->rasied, 2) }}</td>
                                            <td>@php echo projectStatus($row->status) @endphp </span></td>
                                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format("Y-m-d") }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                  </div><!-- card -->
            </div>
            <div class="col-12">
                <div class="card bd-0 shadow-base pd-10 mg-t-20">
                    <div class="d-flex align-items-center justify-content-between mg-b-30">
                      <div>
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Donations</h6>
                      </div>
                    </div><!-- d-flex -->
                    <div class="table-responsive">
                        <table class="table table-valign-middle mg-b-0">
                            <thead>
                                <tr>
                                <th class="">ID</th>
                                <th class="">Projects</th>
                                <th class="">Amount</th>
                                <th class="">Status</th>
                                <th class="">Date</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($donations as $row)
                                    @php
                                        $projects = \App\Models\Project::find($row->project_id);
                                    @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ route("view.project", $row->id) }}">{{ ucfirst($projects->title) }}</a></td>
                                            <td>@php echo naira(); @endphp {{ number_format($row->amount, 2) }}</td>
                                            <td>@php echo donationStatus($row->status) @endphp </span></td>
                                            <td>{{ \Carbon\Carbon::parse($row->created_at)->format("Y-m-d") }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                  </div><!-- card -->
            </div>
            @endif

            <div class="col-12">
                @if(\App\Models\User::isSponsor())
                <div class="card bd-0 shadow-base pd-10 mb-2 mt-2">
                    <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Donate now</h6>
                    <p class="mg-b-25">Not sure where to donate, we can do that for you.</p>
                    <div>
                        <a href="{{ route("donate.now") }}" class="btn btn-primary">Donate Now</a>
                      </div>
                </div><!-- card -->
                @endif
                @if(getPermission("viewDonations"))
                    <div class="card bd-0 shadow-base pd-10">
                        <h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Latest Donations</h6>
                        <p class="mg-b-25">Summary of latest donations</p>
                        <div class="table-responsive">
                            <table class="table table-valign-middle mg-b-0">
                                <tbody>
                                @foreach ($latestdonations as $row)
                                    <tr>
                                        <td>@php echo naira() @endphp {!! number_format($row->amount, 2); !!}</td>
                                        <td>{!! donationStatus($row->status) !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- card -->
                @endif
                @if(getPermission("viewPosts"))
                <div class="card bd-0 mg-t-20">
                    <div id="carousel2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($posts as $row)
                            <li data-target="#carousel{{ $loop->iteration }}" data-slide-to="{{ $loop->iteration }}" class="@if($loop->iteration == "1") active @endif"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach ($posts as $row)
                        @php
                            $totalComments = \App\Models\Comment::where('postid', $row->id)->count();
                        @endphp
                            <div class="carousel-item @if($loop->iteration == "1") active @endif">
                                <div class="bg-br-primary pd-10 ht-300 pos-relative d-flex align-items-center rounded">
                                <div class="tx-white">
                                    <p class="tx-uppercase tx-11 tx-medium tx-mont tx-spacing-2 tx-white-5">Recent Article</p>
                                    <h5 class="lh-5 mg-b-20">{{ $row->title }}</h5>
                                    <nav class="nav flex-row tx-13">
                                    <a href="#" class="tx-white-8 hover-white pd-l-0 pd-r-5">{{ $row->views }} Views</a>
                                    <a href="#" class="tx-white-8 hover-white pd-x-5">{{ $row->likes }} Likes</a>
                                    <a href="#" class="tx-white-8 hover-white pd-x-5">{{ $totalComments }} Comments</a>
                                    </nav>
                                </div>
                                </div><!-- d-flex -->
                            </div>
                        @endforeach
                    </div><!-- carousel-inner -->
                    </div><!-- carousel -->
                </div><!-- card -->
              @endif
            </div><!-- col-3 -->
          </div><!-- row -->

        </div><!-- br-pagebody -->

@endsection
