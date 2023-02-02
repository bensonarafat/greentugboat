@extends("layouts.dashboard.app")
@section("title", "Edit Post -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("manage.post") }}">Manage Posts</a>
            <span class="breadcrumb-item active">Edit Post</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Edit Post</h4>
        </div>


        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="br-section-wrapper" style="padding: 30px 20px;">
                <form method="POST" name="" action="{{ route("update.post") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="title"><strong>Title</strong></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" style="width: 100%; font-size:18px;font-style:italic;" placeholder="Type title here ......." required>
                            </div>
                            <textarea id="myeditorinstance" name="editorinstance">{{ $post->content }}</textarea>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for=""><strong>Feature Image</strong></label>
                                <input type="file" class="form-control" name="featureimage">
                                <input type="hidden" name="featureimagespan" value="{{ $post->featureimage }}">
                            </div>
                            <div class="form-group">
                                <label for="category"><strong>Search Category</strong></label>
                                <input type="text" name="" id="search_category" onkeyup="myFunction()" class="form-control">
                                <ul id="myUL" style="margin-top:10px; height: 400px;overflow-y:scroll;scroll-behavior: auto;padding: 5px;">
                                    {!! postCategories($categories, $post->categoryid) !!}
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="tags"><strong>Tags</strong></label>
                                <select class="form-control select2-tag" multiple name="tags[]">
                                    <option value="">--select tags--</option>
                                    @foreach ($tags as $row)
                                        <option value="{{ $row->id }}" @if(in_array($row->id, $posttags))selected @endif>{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Author</strong></label>
                                <input class="form-control" type="text" readonly name="" id="" value="{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}">
                            </div>
                            <div class="form-group">
                                <label for="status"><strong>Status</strong></label>
                                <select class="form-control" name="status">
                                    <option value="publish" @if($post->status == "publish") selected @endif>Publish</option>
                                    <option value="draft" @if($post->status == "draft") selected @endif>Draft</option>
                                </select>
                            </div>
                            <div class="form-layout-footer">
                                <input type="hidden" name="id" value="{{ $post->id }}">
                                <button name="submit" class="btn btn-info" style="width: 100%">Update</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>

        <script>
            function myFunction() {
              // Declare variables
              var input, filter, ul, li, a, i, txtValue;
              input = document.getElementById('search_category');
              filter = input.value.toUpperCase();
              ul = document.getElementById("myUL");
              li = ul.getElementsByTagName('li');

              // Loop through all list items, and hide those who don't match the search query
              for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("label")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  li[i].style.display = "";
                } else {
                  li[i].style.display = "none";
                }
              }
            }
    </script>
@endsection
