@extends("layouts.dashboard.app")
@section("title", "Events -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <span class="breadcrumb-item active">Manage Events</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Manage Events</h4>
          @if(getPermission("addEvent"))
          <div>
            <a href="{{ route("new.event") }}" class="btn btn-primary">New Event</a>
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
                                    <th class="">Author</th>
                                    <th class="">Venue</th>
                                    <th class="">Start Date</th>
                                    <th class="">End Date</th>
                                    <th class="">Status</th>
                                    <th class="">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach ($events as $row)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ strtoupper(strtolower($row->title)) }}
                                                    <br/>
                                                    <div style="margin-top: 5px;">

                                                            @if(getPermission("editEvent"))
                                                                <div style="display: inline">
                                                                    <a href="{{ route("edit.event", $row->id) }}">Edit</a>
                                                                    |
                                                                </div>
                                                            @endif
                                                            @if(getPermission("deleteEvent"))
                                                            <div style="display: inline">
                                                                <a href="{{ route("delete.event", $row->id) }}">Delete</a>
                                                            </div>
                                                            @endif

                                                    </div>
                                                </td>
                                                <td>{{ \App\Models\User::find($row->author)->firstname .' ' . \App\Models\User::find($row->author)->lastname }}</td>

                                                <td>{{ $row->venue }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->startdate)->format("Y-m-d") }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->enddate)->format("Y-m-d") }}</td>

                                                <td>@php echo postStatus($row->status) @endphp </span></td>
                                                <td>{{ \Carbon\Carbon::parse($row->updated_at)->format("Y-m-d") }}</td>
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



          <script src="{{ asset("assets/dashboard/lib/jquery/jquery.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/popper.js/popper.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/highlightjs/highlight.pack.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/datatables/jquery.dataTables.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/datatables-responsive/dataTables.responsive.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/select2/js/select2.min.js") }}"></script>
          <script>


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
