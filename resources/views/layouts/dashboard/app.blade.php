<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>@yield("title")</title>
    <link rel="icon" href="{{ asset("image/favicon-X.png") }}" type="image/png">
    <!-- vendor css -->
    <link href="{{ asset("assets/dashboard/lib/font-awesome/css/font-awesome.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/Ionicons/css/ionicons.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/perfect-scrollbar/css/perfect-scrollbar.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/jquery-switchbutton/jquery.switchButton.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/rickshaw/rickshaw.min.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/chartist/chartist.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/jquery.steps/jquery.steps.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/highlightjs/github.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/datatables/jquery.dataTables.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/select2/css/select2.min.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("assets/dashboard/lib/select2/css/select2.min.css") }}">
    <link href="{{ asset("assets/dashboard/lib/jquery-toggles/toggles-full.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/jt.timepicker/jquery.timepicker.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/spectrum/spectrum.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/bootstrap-tagsinput/bootstrap-tagsinput.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/ion.rangeSlider/css/ion.rangeSlider.css") }}" rel="stylesheet">
    <link href="{{ asset("assets/dashboard/lib/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css") }}" rel="stylesheet">
    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset("assets/dashboard/css/bracket.css") }}">

    <!-- Insert the blade containing the TinyMCE configuration and source script -->
    <x-head.tinymce-config/>
      <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <script>
        const BASE_URL = "{{ url('/') }}";
        const REQUEST_URL = "<?=Request::url()?>";
        let CSRF = "{{ csrf_token() }}";
      </script>
  </head>
  <body>

        <!-- ########## START: LEFT PANEL ########## -->
        <div class="br-logo"><a href="/"><img src="{{ asset("image/logos/logo.png") }}" alt="logo" width="50"></a></div>
        <div class="br-sideleft overflow-y-auto">
          <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
          <div class="br-sideleft-menu">
            <a href="{{ route("account") }}" class="br-menu-link @if(request()->path() == "account") active @endif">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->


            @if(getPermission("viewCategories"))
            <a href="{{ route("categories") }}" class="br-menu-link @if(request()->segment(2) == "categories") active @endif">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Categories</span>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            @endif
            @if(getPermission("viewPosts"))
            <a href="#" class="br-menu-link  @if(request()->segment(2) == "posts") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon icon ion-compose tx-22"></i>
                  <span class="menu-item-label">Posts</span>
                  <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub nav flex-column">
                @if(getPermission("addPost")) <li class="nav-item"><a href="{{ route("new.post") }}" class="nav-link">New Post</a></li> @endif
                @if(getPermission("viewPosts")) <li class="nav-item"><a href="{{ route("manage.post") }}" class="nav-link">Manage Post</a></li>@endif
                @if(getPermission("viewTags")) <li class="nav-item"><a href="{{ route("tags") }}" class="nav-link">Tags</a></li> @endif
            </ul>
            @endif
            @if(getPermission("viewComments"))
            <a href="{{ route("comments") }}" class="br-menu-link @if(request()->segment(2) == "comments") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon icon ion-android-textsms tx-22"></i>
                  <span class="menu-item-label">Comments</span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            @endif
            @if(getPermission("viewProjects"))
            <a href="#" class="br-menu-link @if(request()->segment(2) == "projects") active @endif">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Projects</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub nav flex-column">
                @if(getPermission("addProject")) <li class="nav-item"><a href="{{ route("add.project") }}" class="nav-link">New Project</a></li> @endif
                <li class="nav-item"><a href="{{ route("manage.projects") }}" class="nav-link">Manage Projects</a></li>
                @if(getPermission("viewProjectCategories")) <li class="nav-item"><a href="{{ route("project.categories") }}" class="nav-link">Categories</a></li> @endif
            </ul>
            @endif

            @if(\App\Models\User::isSponsor())
            <a href="{{ route("donate.now") }}" class="br-menu-link @if(request()->segment(2) == "donate") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon fa fa-bullhorn tx-20" style="color:yellow;"></i>
                  <span class="menu-item-label" style="color: white;">Make an Easy Donation</span>
                </div><!-- menu-item -->
              </a><!-- br-menu-link -->
            @endif


            @if(auth()->user()->type == "user")
            <a href="{{ route("projects") }}" class="br-menu-link @if(request()->segment(2) == "projects") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon  icon ion-ios-bookmarks-outline tx-20"></i>
                  <span class="menu-item-label">Projects</span>
                </div><!-- menu-item -->
              </a><!-- br-menu-link -->
            @endif

            @if(\App\Models\User::isVolunteer() || \App\Models\User::isVendor())
            <a href="{{ route("bids") }}" class="br-menu-link @if(request()->segment(2) == "bids") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon ion ion-clock tx-20"></i>
                  <span class="menu-item-label">Bids</span>
                </div><!-- menu-item -->
              </a><!-- br-menu-link -->
            @endif

            @if(\App\Models\User::isSponsor())
            <a href="{{ route("donations") }}" class="br-menu-link @if(request()->segment(2) == "donations") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon fa fa-dollar tx-22"></i>
                  <span class="menu-item-label">Donations</span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->

            {{-- <a href="{{ route("portfolio") }}" class="br-menu-link @if(request()->segment(2) == "portfolio") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon fa fa-rocket tx-22"></i>
                  <span class="menu-item-label">Portfolio</span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link --> --}}

            <a href="{{ route("company") }}" class="br-menu-link @if(request()->segment(2) == "company") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon fa fa-briefcase tx-22"></i>
                  <span class="menu-item-label">Company</span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            @endif


            @if(auth()->user()->type == "team" || auth()->user()->type == "admin" )
            <a href="#" class="br-menu-link @if(request()->segment(2) == "people") active @endif">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-people-outline tx-22"></i>
                <span class="menu-item-label">Users</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub nav flex-column">
                @if(getPermission("viewUsers"))<li class="nav-item"><a href="{{ route("people") }}" class="nav-link">People</a></li>@endif
                <li class="nav-item"><a href="{{ route("profile") }}" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="{{ route("change.password") }}" class="nav-link">Change Password</a></li>
                @if(getPermission("viewRoles")) <li class="nav-item"><a href="{{ route("roles") }}" class="nav-link">Roles</a></li> @endif
              </ul>
            @endif


            @if (auth()->user()->type == "user")
            <a href="{{ route("profile") }}" class="br-menu-link @if(request()->segment(3) == "profile") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon fa fa-user tx-22"></i>
                  <span class="menu-item-label">Profile</span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <a href="{{ route("change.password") }}" class="br-menu-link @if(request()->segment(3) == "change-password") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon fa fa-lock tx-22"></i>
                  <span class="menu-item-label">Change Password</span>
                </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            @endif

            @if(getPermission("viewEvents"))
            <a href="{{ route("manage.event") }}" class="br-menu-link @if(request()->segment(2) == "events") active @endif">
              <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                <span class="menu-item-label">Events</span>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            @endif
            @if(getPermission("viewSettings"))
            <a href="#" class="br-menu-link  @if(request()->segment(2) == "settings") active @endif">
              <div class="br-menu-item">
                {{-- <i class="menu-item-icon icon ion-ios-settings-outline tx-22"></i> --}}
                <ion-icon name="settings-outline" class="menu-item-icon icon" size="large"></ion-icon>
                <span class="menu-item-label">Settings</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
              </div><!-- menu-item -->
            </a><!-- br-menu-link -->
            <ul class="br-menu-sub nav flex-column">
                @if(getPermission("systemLogs")) <li class="nav-item"><a href="" class="nav-link">System Logs</a></li> @endif
                @if(getPermission("emailLogs")) <li class="nav-item"><a href="" class="nav-link">Email Logs</a></li> @endif
                @if(getPermission("appConfig")) <li class="nav-item"><a href="" class="nav-link">Configs</a></li> @endif
            </ul>
            @endif

            @if(getPermission("appPages"))
            <a href="#" class="br-menu-link @if(request()->segment(2) == "pages") active @endif">
                <div class="br-menu-item">
                  <i class="menu-item-icon icon ion-android-folder-open tx-22"></i>
                  <span class="menu-item-label">Pages</span>
                  <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
              </a><!-- br-menu-link -->

              <ul class="br-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route("pages.home") }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route("pages.about") }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route("pages.contact") }}" class="nav-link">Contacts</a></li>
                <li class="nav-item"><a href="{{ route("pages.faq") }}" class="nav-link">FAQs</a></li>
                <li class="nav-item"><a href="{{ route("pages.terms") }}" class="nav-link">Terms of Service</a></li>
                <li class="nav-item"><a href="{{ route("pages.privacy") }}" class="nav-link">Privacy</a></li>
              </ul>
              @endif
          </div><!-- br-sideleft-menu -->
          <br>
        </div><!-- br-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->

        <!-- ########## START: HEAD PANEL ########## -->
        <div class="br-header">
          <div class="br-header-left">
            <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href="#"><i class="icon ion-navicon-round"></i></a></div>
            <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href="#"><i class="icon ion-navicon-round"></i></a></div>
            <div class="input-group hidden-xs-down wd-170 transition">
              <input id="searchbox" type="text" class="form-control" placeholder="Search">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
              </span>
            </div><!-- input-group -->
          </div><!-- br-header-left -->
          <div class="br-header-right">
            <nav class="nav">
              <div class="dropdown">
                <a href="#" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                  <i class="icon ion-ios-bell-outline tx-24"></i>
                  <!-- start: if statement -->
                  <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                  <!-- end: if statement -->
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-300 pd-0-force">
                  <div class="d-flex align-items-center justify-content-between pd-y-10 pd-x-20 bd-b bd-gray-200">
                    <label class="tx-12 tx-info tx-uppercase tx-semibold tx-spacing-2 mg-b-0">Notifications</label>
                    <a href="#" class="tx-11">Mark All as Read</a>
                  </div><!-- d-flex -->

                  <div class="media-list">
                    <!-- loop starts here -->

                    <!-- loop ends here -->

                    <div class="pd-y-10 tx-center bd-t">
                      <a href="#" class="tx-12"><i class="fa fa-angle-down mg-r-5"></i> Show All Notifications</a>
                    </div>
                  </div><!-- media-list -->
                </div><!-- dropdown-menu -->
              </div><!-- dropdown -->
              <div class="dropdown">
                <a href="#" class="nav-link nav-link-profile" data-toggle="dropdown">
                  <span class="logged-name hidden-md-down">{{ auth()->user()->firstname }}</span>
                  <img src="@if(auth()->user()->photo) {{ asset(auth()->user()->photo)  }}@else {{ asset("image/default.png") }} @endif"  style="object-fit:cover;width:40px;height:40px;" class="wd-32 rounded-circle" alt="">
                  <span class="square-10 bg-success"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                  <ul class="list-unstyled user-profile-nav">
                    <li><a href="{{ route("profile") }}"><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                    <li><a href="{{ route("change.password") }}"><i class="icon fa fa-lock"></i> Change Password</a></li>
                    @if(\App\Models\User::isVendor())
                        {{-- <li><a href="{{ route("portfolio") }}"><i class="icon fa fa-rocket"></i> Portfolio </a></li> --}}
                        <li><a href="{{ route("company") }}"><i class="icon ion-ios-briefcase"></i> Company </a></li>
                    @endif
                    <li>
                        <a href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                  </ul>
                </div><!-- dropdown-menu -->
              </div><!-- dropdown -->
            </nav>
          </div><!-- br-header-right -->
        </div><!-- br-header -->
        <!-- ########## END: HEAD PANEL ########## -->

        @yield("content")

        <footer class="br-footer">
            <div class="footer-left">
              <div class="mg-b-2">Copyright &copy; {{ date("Y") }}. {{ config("app.name") }}. All Rights Reserved.</div>
            </div>
          </footer>
        </div><!-- br-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ asset("assets/dashboard/lib/jquery/jquery.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/popper.js/popper.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/bootstrap/bootstrap.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/moment/moment.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/jquery-ui/jquery-ui.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/jquery-switchbutton/jquery.switchButton.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/peity/jquery.peity.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/chartist/chartist.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/jquery.sparkline.bower/jquery.sparkline.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/d3/d3.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/rickshaw/rickshaw.min.js") }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset("assets/dashboard/lib/highlightjs/highlight.pack.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/jquery.steps/jquery.steps.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/parsleyjs/parsley.js") }}"></script>
    <script src="{{ asset("assets/dashboard/js/ResizeSensor.js") }}"></script>
    <script src="{{ asset("assets/dashboard/js/dashboard.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/select2/js/select2.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/jquery-toggles/toggles.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/jt.timepicker/jquery.timepicker.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/spectrum/spectrum.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/jquery.maskedinput/jquery.maskedinput.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/bootstrap-tagsinput/bootstrap-tagsinput.js") }}"></script>
    <script src="{{ asset("assets/dashboard/lib/ion.rangeSlider/js/ion.rangeSlider.min.js") }}"></script>
    <script src="{{ asset("assets/dashboard/js/bracket.js") }}"></script>

    <script>
      $(function(){
        'use strict'
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();


            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();

          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  <script>
    $(document).ready(function(){
      'use strict';

      $('#wizard7').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
        cssClass: 'wizard wizard-style-3 step-equal-width',
        onFinished(){
            $('#projectForm').submit();
        }
      });

      $('.datepickerNoOfMonths').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true,
          numberOfMonths: 2,
          dateFormat: 'yy-mm-dd'
    });
    });


  </script>
</html>
