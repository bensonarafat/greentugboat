@extends("layouts.dashboard.app")
@section("title", "Change Password  - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("people") }}">People</a>
            <span class="breadcrumb-item active">Change passord</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">{{  Auth::user()->firstname . ' '. Auth::user()->lastname  }}</h4>
        </div>


        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="br-section-wrapper">
                <form method="POST" name="roleForm" action="{{ route("update.password") }}">

                    @csrf
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                <label class="form-control-label">Old Password: <span class="tx-danger">*</span></label>
                                <input type="password" class="form-control @error('old_password') border border-danger @enderror" name="old_password" id="InputPassword" placeholder="Current Password">
                                @error('old_password')<span class="ml-3 text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">New Password: <span class="tx-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') border border-danger @enderror" name="password" id="newInputPassword" placeholder="New Password">
                                    @error('password')<span class="ml-3 text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label password_confirmation">Confirm Password: <span class="tx-danger">*</span></label>
                                    <input type="password" class="form-control @error('password') border border-danger @enderror" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <div class="form-layout-footer">
                            <button name="submit" class="btn btn-info">Change Password</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
        </div>

@endsection
