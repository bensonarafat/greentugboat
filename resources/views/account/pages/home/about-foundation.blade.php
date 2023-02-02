@extends("layouts.dashboard.app")
@section("title", "About foundation - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20 ">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="#">Pages</a>
            <span class="breadcrumb-item active">About foundation</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
        <h4 class="tx-gray-800 mg-b-5">About foundation</h4>
    </div>
    <div class="br-pagebody">

        @include("layouts.dashboard.alert")

        <div class="br-section-wrapper">
            <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route("about.foundation.update") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Text 1</label>
                                <input type="text" name="text1" id="text1" value="{{ pagesContent("home", "about-foundation", "text1")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Text 2</label>
                                <input type="text" name="text2" id="text2"  value="{{ pagesContent("home", "about-foundation", "text2")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Text 3</label>
                                <input type="text" name="text3" id="text3"  value="{{ pagesContent("home", "about-foundation", "text3")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Button Text 1</label>
                                <input type="text" name="text4" id="text4"  value="{{ pagesContent("home", "about-foundation", "text4")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Button Text 2</label>
                                <input type="text" name="text5" id="text5"  value="{{ pagesContent("home", "about-foundation", "text5")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Button Text 3</label>
                                <input type="text" name="text6" id="text6"  value="{{ pagesContent("home", "about-foundation", "text6")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Button URL 1</label>
                                <input type="text" name="url1" id="url1"  value="{{ pagesContent("home", "about-foundation", "url1")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Button URL 2</label>
                                <input type="text" name="url2" id="url2"  value="{{ pagesContent("home", "about-foundation", "url2")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Button URL 3</label>
                                <input type="text" name="url3" id="url3"  value="{{ pagesContent("home", "about-foundation", "url3")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Image (1034 X 804)</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <input type="hidden" name="imagespan" value="{{ pagesContent("home", "about-foundation", "image")->image }}">
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
