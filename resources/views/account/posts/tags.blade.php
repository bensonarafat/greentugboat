@extends("layouts.dashboard.app")
@section("title", "Tags -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("tags") }}">Tags</a>
            <span class="breadcrumb-item active">Manage Tags</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Manage Tags</h4>
        </div>
        <div class="br-pagebody">

            @include("layouts.dashboard.alert")



                <div class="row">
                    @if(getPermission("addTag"))
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ route("tag.store") }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control _js_keyup_slug" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control slug" readonly>
                                    </div>

                                    <div class="pl-lg-4 pb-5">
                                        <button class="btn btn-primary" type="submit"> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
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
                                            @foreach ($tags as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format("Y-m-d") }}</td>
                                                    <td>
                                                        @if(getPermission("editTag")) <a href="" class="btn btn-primary btn-sm js_edit_tag" data-toggle="modal" data-target="#editTag" data-id="{{ $row->id }}">Edit</a> @endif
                                                        @if(getPermission("deleteTag")) <a href="{{ route("delete.tag", $row->id) }}" class="btn btn-danger btn-sm">Delete</a> @endif
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


    <div id="editTag" class="modal fade">
            <div class="modal-dialog modal-dialog-vertical-center" role="document">
                <form action="{{ route("tag.update") }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editTagTitle">Edit Tag</h5>
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

            $('body').on("click", '.js_edit_tag', function(e){
                $('#js_replace_edit_content').html(loader);
                const id = $(this).attr("data-id");
                var data = new FormData();
                data.append('id', id);
                $.ajax({
                    url: BASE_URL + '/account/posts/tags/edit/' + id,
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
