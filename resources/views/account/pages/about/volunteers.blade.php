
@extends("layouts.dashboard.app")
@section("title", "Volunteers -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="">{{ config("app.name") }}</a>
            <span class="breadcrumb-item active">Volunteers</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Volunteers</h4>
        </div>
        <div class="br-pagebody">

            @include("layouts.dashboard.alert")



                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route("store.about.volunteers") }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" id="name" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Facebook url</label>
                                        <input type="text" name="facebook" id="facebook" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Twitter url</label>
                                        <input type="text" name="twitter" id="twitter" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Instagram url</label>
                                        <input type="text" name="instagram" id="instagram" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Linkedin url</label>
                                        <input type="text" name="linkedin" id="linkedin" value="" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="image" id="image" value="" class="form-control">
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-wrapper">
                                    <table id="datatable1" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                        <th class="">ID</th>
                                        <th class="">Name</th>
                                        <th class="">Date</th>
                                        <th class="">Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format("Y-m-d") }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-sm js_edit" data-toggle="modal" data-target="#editModel" data-id="{{ $row->id }}">Edit</a>
                                                        <a href="{{ route("delete.volunteers", $row->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
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

          <div id="editModel" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <form action="{{ route("update.about.volunteers") }}" method="POST" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryTitle">Edit</h5>
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

            $('body').on("click", '.js_edit', function(e){
                $('#js_replace_edit_content').html(loader);
                const id = $(this).attr("data-id");
                var data = new FormData();
                data.append('id', id);
                $.ajax({
                    url: BASE_URL + '/account/pages/about/volunteers/edit/' + id,
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
