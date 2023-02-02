@extends("layouts.dashboard.app")
@section("title", "Projects -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("manage.projects") }}">Projects</a>
            <span class="breadcrumb-item active">Manage Projects</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Manage Projects</h4>
          @if(getPermission("addProject"))
          <div>
            <a href="{{ route("add.project") }}" class="btn btn-primary">New Project</a>
          </div>
          @endif
        </div>
        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-wrapper">
                                <table id="datatable1" class="table display responsive">
                                <thead>
                                    <tr>
                                    <th class="">ID</th>
                                    <th class="">Title</th>
                                    <th class="">Created By</th>
                                    <th class="">Supervisor</th>
                                    <th class="">Start Date</th>
                                    <th class="">Deadline</th>
                                    <th class="">Budget</th>
                                    <th class="">Raised</th>
                                    <th class="">Status</th>
                                    <th class="">Date</th>
                                    @if(auth()->user()->type != "user")
                                    <th class="">Action</th>
                                    @endif
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach ($projects as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><a href="{{ route("view.project", $row->id) }}">{{ ucfirst($row->title) }}</a></td>
                                                <td>{{ \App\Models\User::find($row->author)->firstname . ' '. \App\Models\User::find($row->author)->lastname  }}</td>
                                                <td>@if($row->supervisor_id) {{ \App\Models\User::find($row->supervisor_id)->firstname . ' '. \App\Models\User::find($row->supervisor_id)->lastname  }} @else -- @endif</td>
                                                <td>{{ \Carbon\Carbon::parse($row->start_date)->format("Y-m-d") }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->deadline)->format("Y-m-d") }}</td>
                                                <td>@php echo naira(); @endphp {{ number_format($row->budget, 2) }}</td>
                                                <td>@php echo naira(); @endphp {{ number_format($row->rasied, 2) }}</td>
                                                <td>@php echo projectStatus($row->status) @endphp </span></td>
                                                <td>{{ \Carbon\Carbon::parse($row->created_at)->format("Y-m-d") }}</td>
                                                @if(auth()->user()->type != "user")
                                                <td>

                                                    <form action="{{ route("update.project.status") }}" method="post">
                                                        @csrf
                                                        <div style="display:flex;">
                                                            <div class="input-group pr-2">
                                                                <select name="status" id="status" class="form-control form-control-sm">
                                                                    <option value="scheduled" @if($row->status == "scheduled") selected @endif>Scheduled</option>
                                                                    <option value="active" @if($row->status == "active") selected @endif>Active</option>
                                                                    <option value="inactive" @if($row->status == "inactive") selected @endif>Inactive</option>
                                                                    <option value="suspended" @if($row->status == "suspended") selected @endif>Suspended</option>
                                                                    <option value="ended" @if($row->status == "ended") selected @endif>Ended</option>
                                                                    <option value="deleted" @if($row->status == "deleted") selected @endif>Deleted</option>
                                                                </select>
                                                            </div>
                                                            <input type="hidden" name="id" value="{{ $row->id }}">
                                                            @if(getPermission("editProject"))
                                                                <button type="submit" class="btn btn-danger btn-sm" style="cursor:pointer">UPDATE</button>
                                                            @endif
                                                        </div>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- table-wrapper -->
                        </div>
                    </div>
                </div>
            </div><!-- br-section-wrapper -->
        </div><!-- br-pagebody -->


    <div id="editCategory" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <form action="{{ route("category.update") }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryTitle">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body" id="js_replace_edit_content">

                        </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
                </form>
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
            var loader = `<div class="text-center">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        </div>`;
            $('body').on("click", '.js_edit_category', function(e){
                $('#js_replace_edit_content').html(loader);
                const id = $(this).attr("data-id");
                var data = new FormData();
                data.append('id', id);
                $.ajax({
                    url: BASE_URL + '/account/categories/edit/' + id,
                    method: "GET",
                    timeout: 5000,
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    headers: {'X-CSRF-TOKEN': CSRF},
                    success: function(response){
                        $('#js_replace_edit_content').html(response.html);
                    },
                    error: function(err){
                        alert("Oops, there was an error, try again later");
                    }
                })
            })
        });

            $('body').on("keyup", "._js_keyup_slug", function(){
                var _this = $(this);
                var slug = _this.val();
                $(".slug").val(slug.toLowerCase().replace(" ","-"));
            });
            $('#datatable1').DataTable({
              responsive: true,
              language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
              }
            });

        </script>
@endsection
