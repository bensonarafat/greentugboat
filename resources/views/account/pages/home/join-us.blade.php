@extends("layouts.dashboard.app")
@section("title", "Join us - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20 ">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="#">Pages</a>
            <span class="breadcrumb-item active">Join us</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
        <h4 class="tx-gray-800 mg-b-5">Join us</h4>
    </div>
    <div class="br-pagebody">

        @include("layouts.dashboard.alert")

        <div class="br-section-wrapper">
            <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route("join.us.update") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Text 1</label>
                                <input type="text" name="text1" id="text1" value="{{ pagesContent("home", "join-us", "text1")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Text 2</label>
                                <input type="text" name="text2" id="text2"  value="{{ pagesContent("home", "join-us", "text2")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Text 3</label>
                                <input type="text" name="text3" id="text3"  value="{{ pagesContent("home", "join-us", "text3")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Image (867 X 679)</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <input type="hidden" name="image" value="{{ pagesContent("home", "join-us", "image")->image }}">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- accordion -->
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

<script src="{{ asset("assets/dashboard/lib/jquery/jquery.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/popper.js/popper.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/highlightjs/highlight.pack.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/datatables/jquery.dataTables.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/datatables-responsive/dataTables.responsive.js") }}"></script>
<script src="{{ asset("assets/dashboard/lib/select2/js/select2.min.js") }}"></script>

@endsection
