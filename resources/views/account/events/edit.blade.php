@extends("layouts.dashboard.app")
@section("title", "Edit Event -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("manage.event") }}">Manage Event</a>
            <span class="breadcrumb-item active">Edit Event</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Edit Event</h4>
        </div>


        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="br-section-wrapper" style="padding: 30px 20px;">
                <form method="POST" name="" action="{{ route("update.event") }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="title"><strong>Title</strong></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" style="width: 100%; font-size:18px;font-style:italic;" placeholder="Type title here ......." required>
                            </div>
                            <textarea id="myeditorinstance" name="editorinstance">{{ $event->content }}</textarea>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for=""><strong>Feature Image</strong></label>
                                <input type="file" class="form-control" name="featureimage">
                                <input type="hidden" name="featureimagespan" value="{{ $event->featureImage }}">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Venue</strong></label>
                                <input type="text" class="form-control" name="venue" required value="{{ $event->venue }}">
                            </div>
                            <div class="form-group">
                                <label for=""><strong>Start Date</strong></label>
                                <input type="datetime-local" class="form-control" name="startdate" value="{{ $event->startdate }}" required>
                            </div>
                            <div class="form-group">
                                <label for=""><strong>End Date</strong></label>
                                <input type="datetime-local" class="form-control" name="enddate" value="{{ $event->enddate }}" required>
                            </div>

                            <div class="form-group">
                                <label for=""><strong>Author</strong></label>
                                <input class="form-control" type="text" readonly name="" id="" value="{{ auth()->user()->firstname . ' ' . auth()->user()->lastname }}">
                            </div>
                            <div class="form-group">
                                <label for="status"><strong>Status</strong></label>
                                <select class="form-control" name="status">
                                    <option value="publish" @if($event->status == "publish") selected @endif>Publish</option>
                                    <option value="draft" @if($event->status == "draft") selected @endif>Draft</option>
                                </select>
                            </div>
                            <div class="form-layout-footer">
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <button name="submit" class="btn btn-info" style="width: 100%">Update</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>

@endsection
