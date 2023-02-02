@extends("layouts.dashboard.app")
@section("title", "Comments -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <span class="breadcrumb-item active">Manage Comments</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Manage Comments</h4>
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
                                    <th class="">Author</th>
                                    <th class="">Comment</th>
                                    <th class="">In response to</th>
                                    <th class="">Type</th>
                                    <th class="">Submitted</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach ($comments as $row)
                                        @php
                                        if($row->type == "twitter"){
                                            $author_name = $row->name;
                                            $author_image = $row->picture;
                                        }else{
                                            if($row->author){
                                                $user = \App\Models\User::find($row->author);
                                                $author_name = $user->firstname . ' ' . $user->lastname;
                                                $author_image = asset($user->photo);
                                            }else{
                                                $author_name = $row->name;
                                                $author_image = asset("image/default.png");
                                            }

                                        }
                                        $post  = \App\Models\Post::find($row->postid);
                                    @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div><img src="{{ $author_image }}" alt="" srcset=""  style="width: 40px; height:40px; object-fit:contain;"></div>
                                                    <div class="margin-top:10px;"><strong>{{ $author_name }}</strong></div>
                                                </td>
                                                <td>
                                                    <div>
                                                        {{ $row->message }}
                                                    </div>
                                                    <div>
                                                        <ul>
                                                            @if(getPermission("approveComment"))
                                                                <li style="display: inline">
                                                                    @if($row->status == "approve")
                                                                    <a href="{{ route("unapprove.comment.status", $row->id) }}">Unapprove</a>
                                                                    @else
                                                                    <a href="{{ route("approve.comment.status", $row->id) }}">Approve</a>
                                                                    @endif
                                                                    |
                                                                </li>
                                                            @endif
                                                            @if(getPermission("deleteComment"))
                                                            <li style="display: inline">
                                                                <a href="{{ route("delete.comment", $row->id) }}">Delete</a>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td><a href="/discussion/{{ $post->id }}/{{ $post->slug }}" target="_blank">{{ $post->title }}</a></td>
                                                <td>{{ $row->type ?? "Blog" }}</td>
                                                <td>{{ $row->views }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->created_at)->format("Y-m-d") }}</td>

                                                <td>

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



          <script src="{{ asset("assets/dashboard/lib/jquery/jquery.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/popper.js/popper.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/highlightjs/highlight.pack.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/datatables/jquery.dataTables.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/datatables-responsive/dataTables.responsive.js") }}"></script>
          <script src="{{ asset("assets/dashboard/lib/select2/js/select2.min.js") }}"></script>
          <script>

        </script>
@endsection
