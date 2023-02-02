@extends("layouts.dashboard.app")
@section("title", $project->title)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel br-profile-page">

            @include("layouts.dashboard.alert")

          <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
            <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#projects" role="tab">Projects</a></li>
              @if(auth()->user()->type != "user")
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#donations" role="tab">Donations</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#volunteers" role="tab">Volunteers</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#vendors" role="tab">Vendors</a></li>
              @endif
            </ul>
          </div>

          <div class="tab-content br-profile-body">
            <div class="tab-pane fade active show" id="projects">
              <div class="row">
                <div class="col-lg-8">
                    <div class="media-list bg-white rounded shadow-base">
                        <div class="pd-20 pd-xs-30">
                            <div style="text-align:center; display:flex;justify-content:center;">
                                <h3>{{ $project->title }}</h3>
                            </div>
                            <div style="margin-bottom: 10px;">
                                <img src="{{ asset($project->featureimage) }}" alt="{{ $project->title }}" style="width: 100%; height:300px; object-fit:contain;">
                            </div>
                            @php echo $project->story @endphp
                        </div>
                    </div>

                    {{-- <div class="media-list bg-white rounded shadow-base mt-2">
                        <div class="pd-20 pd-xs-30">
                            <h5>Project Activities</h5>
                            <hr>


                        </div>
                    </div> --}}
                </div><!-- col-lg-8 -->
                <div class="col-lg-4 mg-t-30 mg-lg-t-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card pd-20 pd-xs-30 shadow-base bd-0">
                                <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Details</h6>

                                <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Start Date</label>
                                <h3>{{ \Carbon\Carbon::parse($project->start_date)->format("d M, Y") }}</h3>

                                <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Deadline</label>
                                <h3>{{ \Carbon\Carbon::parse($project->deadline)->format("d M, Y") }} </h3>


                                <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Category</label>
                                <h3>{{ \App\Models\Category::find($project->category_id)->name }} </h3>

                                @if(auth()->user()->type != "user")
                                <div>
                                    <hr>
                                    <form action="{{ route("update.project.status") }}" method="post">
                                        @csrf
                                        <div style="display:flex;">
                                            <div class="input-group pr-2">
                                                <select name="status" id="status" class="form-control form-control-sm">
                                                    <option value="scheduled" @if($project->status == "scheduled") selected @endif>Scheduled</option>
                                                    <option value="active" @if($project->status == "active") selected @endif>Active</option>
                                                    <option value="inactive" @if($project->status == "inactive") selected @endif>Inactive</option>
                                                    <option value="suspended" @if($project->status == "suspended") selected @endif>Suspended</option>
                                                    <option value="ended" @if($project->status == "ended") selected @endif>Ended</option>
                                                    <option value="deleted" @if($project->status == "deleted") selected @endif>Deleted</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $project->id }}">
                                            @if(getPermission("editProject"))
                                            <button type="submit" class="btn btn-danger btn-sm" style="cursor:pointer">UPDATE</button>

                                            <a href="{{ route("edit.project", $project->id) }}" class="btn btn-warning btn-sm" style="cursor:pointer; margin-left:2px;">Edit</a>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                                @endif
                              </div><!-- card -->
                        </div>

                        <div class="col-sm-12" style="margin-top:10px;">
                            <div class="card pd-20 pd-xs-30 shadow-base bd-0">
                                <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Budget @php echo projectStatus($project->status) @endphp</h6>

                                <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Budget</label>
                                <h3>@php echo naira() @endphp {{ number_format($project->budget, 2) }} </h3>

                                <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Raised @if(getPermission("editProject")) <u class="clickEditAmount"><a href="javascript:void(0)">Edit</a></u> @endif</label>

                                    <span id="readonlyRaised"> <h3>@php echo naira() @endphp {{ number_format($project->raised, 2) }}    </h3> </span>
                                    <form action="{{ route("update.raised.amount") }}" method="post">
                                        @csrf
                                        <div id="readAndWriteRaised" style="display: none">
                                            <input type="hidden" name="id" value="{{ $project->id }}">
                                            <input type="number" class="form-control" id="amount" name="amount" value="{{ number_format($project->raised, 2) }}">
                                            <button class="btn btn-danger" type="submit">Update</button>
                                        </div>
                                    </form>



                                <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">To Go</label>
                                <h3>@php echo naira() @endphp {{ number_format(($project->budget - $project->raised), 2) }} </h3>
                              </div><!-- card -->
                        </div>

                        <div class="col-sm-12" style="margin-top:10px;">
                            <div class="card pd-20 pd-xs-30 shadow-base bd-0">
                                <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">People</h6>

                                <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Creator</label>
                                <div>
                                    <img src="{{ asset($author->photo) }}" alt="" style="width:70px; height:70px; object-fit:cover;border-radius:100%;">
                                    <strong>{{ $author->firstname .' '. $author->lastname }}</strong>
                                </div>

                                <hr>
                                @if($project->supervisor_id)
                                    @php
                                        $supervisor = \App\Models\User::find($project->supervisor_id);
                                    @endphp
                                    <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Supervisor</label>
                                    <div>
                                        <img src="{{ asset($supervisor->photo) }}" alt="" style="width:70px; height:70px; object-fit:cover;border-radius:100%;">
                                        <strong>{{ $supervisor->firstname .' '. $supervisor->lastname }}</strong>
                                        <a href="{{ route("remove.supervisor", $project->id) }}" class="btn btn-danger btn-sm">Remove</a>
                                    </div>
                                @else
                                    @if(getPermission("assignProject"))
                                    <form action="{{ route("update.supervisor") }}" method="post">
                                        @csrf
                                        <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Supervisor</label>
                                        <select name="supervisor_id" id="supervisor_id" class="form-control">
                                            <option value=""> -- select supervisor--</option>
                                            @foreach ($supervisor as $row)
                                                <option value="{{ $row->id }}">{{ $row->firstname . ' ' . $row->lastname }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id" value="{{ $project->id }}">

                                        <button type="submit" class="btn btn-primary btn-sm btn-block" style="cursor:pointer; margin-top:5px;">Assign</button>
                                    </form>
                                    @endif
                                @endif
                              </div><!-- card -->
                        </div>
                    </div>

                </div><!-- col-lg-4 -->


              </div><!-- row -->
            </div><!-- tab-pane -->

            @if(auth()->user()->type != "user")
            <div class="tab-pane fade" id="donations">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                    <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Donations</h6>
                    <div class="table-wrapper">
                        <table id="datatable1" class="table display responsive">
                        <thead>
                            <tr>
                            <th class="">ID</th>
                            <th class="">Name</th>
                            <th class="">Amount</th>
                            <th class="">Status</th>
                            <th class="">Date</th>
                            <th class="">Proof</th>
                            <th class="">Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($donations as $row)
                                @php
                                    $user = \App\Models\User::find($row->user_id);
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="/account/people/view/{{ $row->user_id }}/{{ $user->username }}">{{ $user->firstname .' ' . $user->lastname }}</a></td>
                                        <td>@php echo naira() @endphp {{  number_format($row->amount, 2) }}</td>
                                        <td>@php echo donationStatus($row->status) @endphp</td>
                                        <td>{{ \Carbon\Carbon::parse($row->created)->format("d-m-y") }}</td>
                                        <td>
                                            <a href="{{ asset($row->image) }}" download title="Download Payment Proof">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route("update.donation.status") }}" method="post">
                                                @csrf
                                                <div style="display:flex;">
                                                    <div class="input-group pr-2">
                                                        <select name="status" id="status" class="form-control form-control-sm">
                                                            <option value="pending" @if($row->status == "pending") selected @endif>Pending</option>
                                                            <option value="active" @if($row->status == "active") selected @endif>Active</option>
                                                            <option value="declined" @if($row->status == "declined") selected @endif>Declined</option>
                                                            <option value="deleted" @if($row->status == "deleted") selected @endif>Deleted</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm" style="cursor:pointer">UPDATE</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                  </div><!-- card -->
                </div><!-- col-lg-8 -->
              </div><!-- row -->
            </div><!-- tab-pane -->

            <div class="tab-pane fade" id="volunteers">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                      <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Volunteers</h6>
                      <div class="table-wrapper">
                        <table id="datatable2" class="table display responsive">
                        <thead>
                            <tr>
                            <th class="">ID</th>
                            <th class="">Name</th>
                            <th class="">Status</th>
                            <th class="">Date</th>
                            <th class="">Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($volunteerApplications as $row)
                                @php
                                    $user = \App\Models\User::find($row->user_id);
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="/account/people/view/{{ $row->user_id }}/{{ $user->username }}">{{ $user->firstname .' ' . $user->lastname }}</a></td>
                                        <td>@php echo donationStatus($row->status) @endphp</td>
                                        <td>{{ \Carbon\Carbon::parse($row->created)->format("d-m-y") }}</td>
                                        <td>
                                            <form action="{{ route("update.project.application.status") }}" method="post">
                                                @csrf
                                                <div style="display:flex;">
                                                    <div class="input-group pr-2">
                                                        <select name="status" id="status" class="form-control form-control-sm">
                                                            <option value="pending" @if($row->status == "pending") selected @endif>Pending</option>
                                                            <option value="active" @if($row->status == "active") selected @endif>Active</option>
                                                            <option value="declined" @if($row->status == "declined") selected @endif>Declined</option>
                                                            <option value="deleted" @if($row->status == "deleted") selected @endif>Deleted</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm" style="cursor:pointer">UPDATE</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->

                    </div><!-- card -->
                  </div><!-- col-lg-8 -->
                </div><!-- row -->
            </div><!-- tab-pane -->

            <div class="tab-pane fade" id="vendors">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                      <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Vendors</h6>
                      <div class="table-wrapper">
                        <table id="datatable3" class="table display responsive">
                        <thead>
                            <tr>
                            <th class="">ID</th>
                            <th class="">Name</th>
                            <th class="">Status</th>
                            <th class="">Amount</th>
                            <th class="">Invoice</th>
                            <th class="">CV</th>
                            <th class="">Date</th>
                            <th class="">Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($vendorApplications as $row)
                                @php
                                    $user = \App\Models\User::find($row->user_id);
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="/account/people/view/{{ $row->user_id }}/{{ $user->username }}">{{ $user->firstname .' ' . $user->lastname }}</a>
                                            <br/>
                                            <a href="javascript:void(0)" class="js_show_cover_letter"  data-toggle="modal" data-target="#coverletter" data-description="{{ $row->description }}">
                                                <u><small><i>cover letter</i></small></ul>
                                            </a>
                                        </td>
                                        <td>@php echo donationStatus($row->status) @endphp</td>
                                        <td>{!! naira() . number_format($row->amount) !!}</td>
                                        <td>@if($row->invoice) <a href="{{ asset($row->invoice) }}"><i class="fa fa-download"></i></a>  @else -- @endif</td>
                                        <td>@if($row->cv) <a href="{{ asset($row->cv) }}"><i class="fa fa-download"></i></a>  @else -- @endif</td>
                                        <td>{{ \Carbon\Carbon::parse($row->created)->format("d-m-y") }}</td>
                                        <td>
                                            <form action="{{ route("update.project.application.status") }}" method="post">
                                                @csrf
                                                <div style="display:flex;">
                                                    <div class="input-group pr-2">
                                                        <select name="status" id="status" class="form-control form-control-sm">
                                                            <option value="pending" @if($row->status == "pending") selected @endif>Pending</option>
                                                            <option value="active" @if($row->status == "active") selected @endif>Active</option>
                                                            <option value="declined" @if($row->status == "declined") selected @endif>Declined</option>
                                                            <option value="deleted" @if($row->status == "deleted") selected @endif>Deleted</option>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm" style="cursor:pointer">UPDATE</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- table-wrapper -->
                    </div><!-- card -->
                  </div><!-- col-lg-8 -->
                </div><!-- row -->
            </div><!-- tab-pane -->
            @endif
          </div>

          <div id="coverletter" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="coverletterTitle">Cover letter</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body" id="js_replace_edit_content">
                            <p id="coverlettercontent">

                            </p>
                        </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

          <script src="{{ asset("assets/dashboard/lib/jquery/jquery.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/popper.js/popper.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/highlightjs/highlight.pack.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/datatables/jquery.dataTables.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/datatables-responsive/dataTables.responsive.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/select2/js/select2.min.js") }}"></script>
          <script>

            $(document).ready(function(){

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
            $('#datatable2').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
            $('#datatable3').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
        });

        $('.clickEditAmount').on("click", function(){
            $('#readAndWriteRaised').css("display", "flex");
            $('#readonlyRaised').css('display', 'none');
        });

        $('.js_show_cover_letter').on("click", function(){
            let _this = $(this);
            $("#coverlettercontent").html(_this.attr("data-description"));
        });
        </script>
@endsection
