@extends("layouts.dashboard.app")
@section("title", "Home -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="#">Pages</a>
            <span class="breadcrumb-item active">Home Page</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Home Page</h4>
        </div>
        <div class="br-pagebody">

            @include("layouts.dashboard.alert")

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mg-b-0">
                                <a href="{{ route("pages.home.banner") }}">
                                    Banner section
                                </a>
                                </h6>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mg-b-0">
                                <a href="{{ route("pages.home.game.plan") }}">
                                    Game plan section
                                </a>
                                </h6>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mg-b-0">
                                <a href="{{ route("pages.home.support.partner") }}">
                                    Support Partner section
                                </a>
                                </h6>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mg-b-0">
                                <a href="{{ route("pages.home.join.us") }}">
                                    Join us section
                                </a>
                                </h6>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mg-b-0">
                                <a  href="{{ route("pages.home.about.foundation") }}">
                                    About foundation section
                                </a>
                                </h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mg-b-0">
                                <a href="{{ route("pages.home.need.your.help") }}">
                                    Need your help section
                                </a>
                                </h6>
                        </div>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="mg-b-0">
                                <a href="{{ route("pages.home.testimonial") }}">
                                    Affimations section
                                </a>
                                </h6>
                        </div>
                    </div>
                </div>
            </div><!-- br-section-wrapper -->
          </div><!-- br-pagebody -->

<script src="{{ asset("assets/dashboard/lib/jquery/jquery.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/popper.js/popper.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/highlightjs/highlight.pack.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/datatables/jquery.dataTables.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/datatables-responsive/dataTables.responsive.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/select2/js/select2.min.js") }}"></script>

@endsection
