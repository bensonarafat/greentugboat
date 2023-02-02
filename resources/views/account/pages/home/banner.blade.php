@extends("layouts.dashboard.app")
@section("title", "Banner Section - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20 ">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="#">Pages</a>
            <span class="breadcrumb-item active">Banner Section</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
        <h4 class="tx-gray-800 mg-b-5">Banner Section</h4>
    </div>
    <div class="br-pagebody">

        @include("layouts.dashboard.alert")

        <div class="br-section-wrapper">
            <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h6 class="mg-b-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition">
                      Test
                    </a>
                    </h6>
                </div><!-- card-header -->

                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-block pd-20">
                        <form action="{{ route("update.banner.text") }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Text 1</label>
                                <input type="text" name="text1" id="text1" value="{{ pagesContent("home", "banner", "text1")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Text 2</label>
                                <input type="text" name="text2" id="text2"  value="{{ pagesContent("home", "banner", "text2")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Text 3</label>
                                <input type="text" name="text3" id="text3"  value="{{ pagesContent("home", "banner", "text3")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Text 4</label>
                                <input type="text" name="text4" id="text4"  value="{{ pagesContent("home", "banner", "text4")->content }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Text 5</label>
                                <input type="text" name="text5" id="text5"  value="{{ pagesContent("home", "banner", "text5")->content }}" class="form-control">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                    <h6 class="mg-b-0">
                    <a class="collapsed tx-gray-800 transition" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Images
                    </a>
                    </h6>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card-block pd-20">
                        <form action="{{ route("update.banner.image") }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Image 1 (600 × 791 px)</label>
                                <input type="file" name="image1" id="image" class="form-control">
                                <input type="hidden" name="image1span" value="{{ pagesContent("home", "banner", "image1")->image }}">
                            </div>

                            <p>Thumbnails</p>
                            <div class="form-group">
                                <label for="">Thumbnail 1 (56 × 52 px)</label>
                                <input type="file" name="thumbnail1" id="image"  class="form-control">
                                <input type="hidden" name="thumbnail1span" value="{{ pagesContent("home", "banner", "thumbnail1")->image }}">
                            </div>

                            <div class="form-group">
                                <label for="">Thumbnail 2 (56 × 52 px)</label>
                                <input type="file" name="thumbnail2" id="image"  class="form-control">
                                <input type="hidden" name="thumbnail2span" value="{{ pagesContent("home", "banner", "thumbnail2")->image }}">
                            </div>

                            <div class="form-group">
                                <label for="">Thumbnail 3 (56 × 52 px)</label>
                                <input type="file" name="thumbnail3" id="image"  class="form-control">
                                <input type="hidden" name="thumbnail3span" value="{{ pagesContent("home", "banner", "thumbnail3")->image }}">
                            </div>

                            <div class="form-group">
                                <label for="">Thumbnail 4 (56 × 52 px)</label>
                                <input type="file" name="thumbnail4" id="image"  class="form-control">
                                <input type="hidden" name="thumbnail4span" value="{{ pagesContent("home", "banner", "thumbnail4")->image }}">
                            </div>

                            <div class="form-group">
                                <label for="">Thumbnail 5 (56 × 52 px)</label>
                                <input type="file" name="thumbnail5" id="image"  class="form-control">
                                <input type="hidden" name="thumbnail5span" value="{{ pagesContent("home", "banner", "thumbnail5")->image }}">
                            </div>

                            <div class="form-group">
                                <label for="">Thumbnail 6 (56 × 52 px)</label>
                                <input type="file" name="thumbnail6" id="image"  class="form-control">
                                <input type="hidden" name="thumbnail6span" value="{{ pagesContent("home", "banner", "thumbnail6")->image }}">
                            </div>

                            <div class="form-group">
                                <label for="">Thumbnail 7 (56 × 52 px)</label>
                                <input type="file" name="thumbnail7" id="image"  class="form-control">
                                <input type="hidden" name="thumbnail7span" value="{{ pagesContent("home", "banner", "thumbnail7")->image }}">
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
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
