@extends("layouts.dashboard.app")
@section("title", "Update Company  - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <span class="breadcrumb-item active">Update Company</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Update Company</h4>
        </div>


        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="br-section-wrapper">
                <form method="POST" name="roleForm" action="{{ route("update.company") }}" enctype="multipart/form-data">

                    @csrf
                    <div class="form-layout form-layout-1">

                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Company Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="company_name" id="company_name" class="form-control" value="{{ auth()->user()->company_name }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
                                    <input type="text" name="company_address" id="company_address" class="form-control" value="{{ auth()->user()->company_address }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Company RC: <span class="tx-danger">*</span></label>
                                    <input type="text" name="company_rc" id="company_rc" class="form-control" value="{{ auth()->user()->company_rc }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Position: <span class="tx-danger">*</span></label>
                                    <input type="text" name="position" id="position" class="form-control" value="{{ auth()->user()->position }}" required>
                                </div>
                            </div>

                        </div>

                        <div class="form-layout-footer">
                            <button name="submit" class="btn btn-info">Update</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
        </div>

@endsection
