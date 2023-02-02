@extends("layouts.dashboard.app")
@section("title", "Edit Profile  - " . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("people") }}">People</a>
            <span class="breadcrumb-item active">Profile</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">{{  Auth::user()->firstname . ' '. Auth::user()->lastname  }}</h4>
        </div>


        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="br-section-wrapper">
                <form method="POST" name="roleForm" action="{{ route("update.profile") }}" enctype="multipart/form-data">

                    @csrf
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">First Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="firstname" id="firstname" value="{{ auth()->user()->firstname }}" required class="form-control">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Last Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="lastname" id="lastname" value="{{ auth()->user()->lastname }}" required class="form-control">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Gender: <span class="tx-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="male" @if(auth()->user()->gender == "male") selected @endif>Male</option>
                                        <option value="female" @if(auth()->user()->gender == "female") selected @endif>Female</option>
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Mobile: <span class="tx-danger">*</span></label>
                                    <input type="tel" name="mobile" id="mobile" class="form-control" value="{{ auth()->user()->mobile }}" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ auth()->user()->address }}" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">City: <span class="tx-danger">*</span></label>
                                    <input type="text" name="city" id="city" class="form-control" value="{{ auth()->user()->city }}" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Date of Birth: <span class="tx-danger">*</span></label>
                                    <input type="date" name="dob" id="dob" class="form-control" value="{{ auth()->user()->dob }}" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Photo: <span class="tx-danger">*</span></label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    <input type="hidden" name="filespan" value="{{ auth()->user()->photo }}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">NIN: <span class="tx-danger">*</span></label>
                                    <input type="text" name="nin" id="nin" class="form-control" value="{{ auth()->user()->nin }}" required>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                                    How do you want to participate ? <i>(You can select multiple)</i>
                                </label>
                                <div class="flex">
                                    <label for="volunteer_checkbox">
                                        <input type="checkbox" id="volunteer_checkbox" name="type[]" value="volunteer" @if(auth()->user()->is_volunteer) checked @endif>
                                        <span class="mr-2">Volunteer</span>
                                    </label>
                                    <label for="sponsor_checkbox">
                                        <input type="checkbox" id="sponsor_checkbox" name="type[]" value="sponsor" @if(auth()->user()->is_sponsor) checked @endif>
                                        <span class="mr-2">Sponsor</span>
                                    </label>
                                    <label for="vendor_checkbox">
                                        <input type="checkbox" id="vendor_checkbox" name="type[]" value="vendor" @if(auth()->user()->is_vendor) checked @endif>
                                        <span class="mr-2">Vendor</span>
                                    </label>
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <hr>
                        <h5>Bank Details</h5>
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Bank: <span class="tx-danger">*</span></label>
                                    <input type="text" name="bank" id="bank" class="form-control" value="{{ auth()->user()->bank }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Account Name: <span class="tx-danger">*</span></label>
                                    <input type="text" name="account_name" id="account_name" class="form-control" value="{{ auth()->user()->account_name }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Account Number: <span class="tx-danger">*</span></label>
                                    <input type="text" name="account_number" id="account_number" class="form-control" value="{{ auth()->user()->account_number }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">BVN: <span class="tx-danger">*</span></label>
                                    <input type="text" name="bvn" id="bvn" class="form-control" value="{{ auth()->user()->bvn }}" readonly>
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
