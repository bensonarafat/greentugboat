@extends("layouts.dashboard.app")
@section("title", "Submit Payment Proof - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")




    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="#">Submit Payment Proof</a>
          </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Submit Payment Proof</h4>


        </div>
        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route("store.payment.proof") }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description (optional)</label>
                                    <textarea id="" cols="30" rows="10" name="description" class="form-control"></textarea>
                                </div>
                                <div class="pl-lg-4 pb-5">
                                    <button class="btn btn-primary" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->

@endsection
