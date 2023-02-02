@extends("layouts.dashboard.app")
@section("title", "Posts -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <span class="breadcrumb-item active">Manage Posts</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Manage Posts</h4>
          @if(getPermission("addPost"))
          <div>
            <a href="{{ route("new.post") }}" class="btn btn-primary">New Post</a>
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
                                    <th class="">Category</th>
                                    <th class="">Likes</th>
                                    <th class="">View</th>
                                    <th class="">Status</th>
                                    <th class="">Date</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach ($posts as $row)
                                            @php
                                                $categories = json_decode($row->categoryid);
                                                $stack = [];
                                                for ($i=0; $i < count($categories); $i++) {
                                                    if($categories[$i] == null || $categories[$i] == ""){
                                                        continue;
                                                    }
                                                    $stack[] = \App\Models\Category::find($categories[$i])->name;
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ strtoupper(strtolower($row->title)) }}
                                                    <br/>
                                                    <div style="margin-top: 5px;">

                                                            @if(getPermission("editPost"))
                                                                <div style="display: inline">
                                                                    <a href="{{ route("edit.post", $row->id) }}">Edit</a>
                                                                    |
                                                                </div>
                                                            @endif
                                                            @if(getPermission("deletePost"))
                                                            <div style="display: inline">
                                                                <a href="{{ route("delete.post", $row->id) }}">Delete</a>
                                                                |
                                                            </div>
                                                            @endif

                                                            @if(getPermission("deletePost"))
                                                            <div style="display: inline">
                                                                @if($row->is_pinned)
                                                                <a href="{{ route("unpin.post", $row->id) }}">
                                                                    Unpin
                                                                </a>
                                                                @endif
                                                                @if(!$row->is_pinned)
                                                                <a href="{{ route("pin.post", $row->id) }}">
                                                                    Pin
                                                                </a>
                                                                @endif
                                                            </div>
                                                            @endif

                                                    </div>
                                                </td>
                                                <td>{{ \App\Models\User::find($row->author)->firstname .' ' . \App\Models\User::find($row->author)->lastname }}</td>
                                                <td>{{ implode(", ", $stack) }}</td>
                                                <td>{{ $row->likes }}</td>
                                                <td>{{ $row->views }}</td>
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
