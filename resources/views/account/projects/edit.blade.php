@extends("layouts.dashboard.app")
@section("title", "Edit Project -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("manage.projects") }}">Manage Projects</a>
            <span class="breadcrumb-item active">New Project</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">New Project</h4>
        </div>


        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <form action="{{ route("project.update") }}" method="post" id="projectForm" enctype="multipart/form-data">
                @csrf
                <div class="br-section-wrapper" style="padding: 30px 20px;">
                    <div id="wizard7">
                        <h3>Story</h3>
                        <section>
                            <div class="form-group">
                                <label for="title"><strong>Title</strong></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}" style="width: 100%; font-size:18px;font-style:italic;" placeholder="Type title here ......." required>
                            </div>
                            <div class="form-group">
                                <label for="story"><strong>Tell us your story</strong></label>
                                <textarea id="myeditorinstance" name="editorinstance" class="form-control">{{ $project->story }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="priority"><strong>Priority</strong></label>
                                <select name="priority" id="priority" class="form-control">
                                    <option value="1" @if($project->priority == "1") selected @endif>Low</option>
                                    <option value="2" @if($project->priority == "2") selected @endif>Medium</option>
                                    <option value="3" @if($project->priority == "3") selected @endif>High</option>
                                    <option value="4" @if($project->priority == "4") selected @endif>Urgent</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="volunteer"><strong>No of Volunteer</strong></label>
                                <input type="number" name="volunteer" id="volunteer" value="{{ $project->volunteer }}" class="form-control">
                            </div>
                        </section>

                        <h3>Categories</h3>
                        <section>
                            <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                                @php echo recursiveCategory(null, $project->category_id); @endphp
                              </div><!-- accordion -->
                        </section>
                        <h3>People</h3>
                        <section>
                            <h6>You can select project supervisor later</h6>
                            <div class="bd rounded table-responsive" style="background: white">
                                <table class="table table-hover mg-b-0">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Avatar</th>
                                      <th>Name</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($people as $row)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset($row->photo) }}" alt="" width="50" height="50" style="object-fit: cover;border-radius:100%;"></td>
                                        <td>{{ $row->firstname . ' '. $row->lastname }}</td>
                                        <td>
                                            <input type="checkbox" name="supervisor_id" id="supervisor_id" @if($project->supervisor_id == $row->id) checked @endif value="{{ $row->id }}">
                                        </td>
                                      </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div><!-- bd -->
                        </section>
                        <h3>Deadline</h3>
                        <section>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for=""><strong>Start Date</strong></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                        <input name="start_date" type="text" value="{{ $project->start_date }}" class="form-control datepickerNoOfMonths" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for=""><strong>Deadline</strong></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                        <input name="deadline" type="text" value="{{ $project->deadline }}" class="form-control datepickerNoOfMonths" placeholder="MM/DD/YYYY">
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3>Images</h3>
                        <section>
                          <div style="text-align: center;">
                            <img src="{{ asset($project->featureimage) }}" alt="{{ $project->title }}" style="width: 200px; height:200px; object-fit:contain;">
                            <div style="display:flex;justify-content: center;">
                                <div class="form-group">
                                    <label for=""><strong>Images</strong> <i>You can upload multiple images</i></label>
                                    <input type="file" name="images[]" class="form-control" id="file" multiple>
                                    <input type="hidden" name="imagespan" value="{{ $project->images }}">
                                    <input type="hidden" name="id" value="{{ $project->id }}">
                                </div>
                            </div>
                          </div>
                        </section>
                      </div>
                </div>
            </form>
        </div>



    <script src="{{ asset("assets/dashboard/lib/jquery/jquery.js") }}"></script>
    <script>

    </script>
@endsection
