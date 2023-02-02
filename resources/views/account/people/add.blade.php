@extends("layouts.dashboard.app")
@section("title", "Add User -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("people") }}">People</a>
            <span class="breadcrumb-item active">Add User</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Add User</h4>
        </div>


        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="br-section-wrapper">
                <form method="POST" name="roleForm" action="{{ route("store.people") }}">

                    @csrf
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="email" placeholder="Enter email">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                                    <select name="role" id="role" class="form-control">
                                        @foreach ($roles as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="firstname" id="firstname" class="form-control">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Last Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="lastname" id="lastname" class="form-control">
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Gender: <span class="tx-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Mobile: <span class="tx-danger">*</span></label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control">
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->


                        <div class="form-layout-footer">
                            <button name="submit" class="btn btn-info">Submit</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
        </div>

@endsection
