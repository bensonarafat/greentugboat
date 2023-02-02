@extends("layouts.dashboard.app")
@section("title", "Roles -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("roles") }}">Roles</a>
            <span class="breadcrumb-item active">Manage Role</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Manage Roles</h4>
          @if(getPermission("addRole"))
          <div>
            <a href="{{ route("role.create") }}" class="btn btn-primary">New Role</a>
          </div>
          @endif
        </div>
        <div class="br-pagebody">

            @include("layouts.dashboard.alert")

            <div class="br-section-wrapper">
              <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-15p">ID</th>
                      <th class="wd-15p">Name</th>
                      <th class="wd-20p">Type</th>
                      <th class="wd-15p">Date</th>
                      <th class="wd-25p">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($roles as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->type }}</td>
                        <td>{{ \Carbon\Carbon::parse($row->created_at)->format("Y-m-d") }}</td>
                        <td>
                            @if(getPermission("editRole")) <a href="{{ route("role", $row->id) }}" class="btn btn-primary btn-icon"><ion-icon name="create-outline"></ion-icon></a> @endif
                            @if(getPermission("deleteRole")) <a href="{{ route("delete.role", $row->id) }}" class="btn btn-danger btn-icon" href=""><ion-icon name="trash-outline"></ion-icon></a> @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- table-wrapper -->
            </div><!-- br-section-wrapper -->
          </div><!-- br-pagebody -->

          <script src="{{ asset("assets/dashboard/lib/jquery/jquery.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/popper.js/popper.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/highlightjs/highlight.pack.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/datatables/jquery.dataTables.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/datatables-responsive/dataTables.responsive.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/select2/js/select2.min.js") }}"></script>

          <script>


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
