@extends("layouts.dashboard.app")
@section("title", "Our core Values - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20 ">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="#">Pages</a>
            <span class="breadcrumb-item active">Our core Values</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
        <h4 class="tx-gray-800 mg-b-5">Our core Values</h4>
    </div>
    <div class="br-pagebody">

        @include("layouts.dashboard.alert")

        <div class="br-section-wrapper">
            <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route("update.about.core.values") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea id="myeditorinstance" name="content">{{ $data->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image1">Image 1 (407 X 407)</label>
                                <input type="file" name="image1" id="image1" value="" class="form-control">
                                <input type="hidden" name="image1span" value="{{ $data->image }}">
                            </div>

                            <div class="form-group">
                                <label for="image2">Image 2 (640 X 640)</label>
                                <input type="file" name="image2" id="image2" value="" class="form-control">
                                <input type="hidden" name="image2span" value="{{ $data->icon }}">
                            </div>

                            <div class="form-group">
                                <label for="image3">Image 3 (407 X 407)</label>
                                <input type="file" name="image3" id="image3" value="" class="form-control">
                                <input type="hidden" name="image3span" value="{{ $data->email }}">
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
