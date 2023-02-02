@extends("layouts.dashboard.app")
@section("title", "Edit Role -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("roles") }}">Roles</a>
            <span class="breadcrumb-item active">Edit Role</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Edit Roles</h4>
        </div>


        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="br-section-wrapper">
                <form method="POST" name="roleForm" action="{{ route("role.update") }}">
                    @csrf
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Enter name" value="{{ $role->name }}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Type: <span class="tx-danger">*</span></label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="admin" @if($role->type == "admin") selected @endif>Admin</option>
                                        <option value="team"  @if($role->type == "team") selected @endif>Team</option>
                                        <option value="user" @if($role->type == "user") selected @endif>User</option>
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->


                        <div class="row mg-b-25">
                            <div class="col-lg-3">
                                <h6>Roles</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewRoles"  @php if(in_array("viewRoles", $perms)) { echo "checked"; } @endphp>
                                    <span>View Roles</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="addRole"  @php if(in_array("addRole", $perms)) { echo "checked"; } @endphp>
                                    <span>Add Role</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="editRole"  @php if(in_array("editRole", $perms)) { echo "checked"; } @endphp>
                                    <span>Edit Role</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deleteRole"  @php if(in_array("deleteRole", $perms)) { echo "checked"; } @endphp>
                                    <span>Delete Role</span>
                                </label>

                            </div>
                            <div class="col-lg-3">
                                <h6>Categories</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewCategories", $perms)) { echo "checked"; } @endphp value="viewCategories">
                                    <span>View Categories</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("addCategory", $perms)) { echo "checked"; } @endphp value="addCategory">
                                    <span>Add Category</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("editCategory", $perms)) { echo "checked"; } @endphp value="editCategory">
                                    <span>Edit Category</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" @php if(in_array("deleteCategory", $perms)) { echo "checked"; } @endphp value="deleteCategory">
                                    <span>Delete Category</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Posts</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewPosts", $perms)) { echo "checked"; } @endphp value="viewPosts">
                                    <span>View Posts</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("addPost", $perms)) { echo "checked"; } @endphp value="addPost">
                                    <span>Add Post</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("editPost", $perms)) { echo "checked"; } @endphp value="editPost">
                                    <span>Edit Post</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" @php if(in_array("deletePost", $perms)) { echo "checked"; } @endphp value="deletePost">
                                    <span>Delete Post</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Comments</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewComments", $perms)) { echo "checked"; } @endphp value="viewComments">
                                    <span>View Comments</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("approveComment", $perms)) { echo "checked"; } @endphp value="approveComment">
                                    <span>Approve Comment</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" @php if(in_array("deleteComment", $perms)) { echo "checked"; } @endphp value="deleteComment">
                                    <span>Delete Comment</span>
                                </label>
                            </div>
                        </div>

                        <div class="row mg-b-25">
                            <div class="col-lg-3">
                                <h6>Projects</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewProjects", $perms)) { echo "checked"; } @endphp value="viewProjects">
                                    <span>View Projects</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("addProject", $perms)) { echo "checked"; } @endphp value="addProject">
                                    <span>Add Project</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("editProject", $perms)) { echo "checked"; } @endphp value="editProject">
                                    <span>Edit Project</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" @php if(in_array("deleteProject", $perms)) { echo "checked"; } @endphp value="deleteProject">
                                    <span>Delete Project</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]"  @php if(in_array("assignProject", $perms)) { echo "checked"; } @endphp value="assignProject">
                                    <span>Assign Project</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Project Categories</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewProjectCategories", $perms)) { echo "checked"; } @endphp value="viewProjectCategories">
                                    <span>View Project Categories</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("addProjectCategory", $perms)) { echo "checked"; } @endphp value="addProjectCategory">
                                    <span>Add Project Category</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("editProjectCategory", $perms)) { echo "checked"; } @endphp value="editProjectCategory">
                                    <span>Edit Project Category</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" @php if(in_array("deleteProjectCategory", $perms)) { echo "checked"; } @endphp value="deleteProjectCategory">
                                    <span>Delete Project Category</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Users</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewUsers", $perms)) { echo "checked"; } @endphp value="viewUsers">
                                    <span>View Users</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("addUser", $perms)) { echo "checked"; } @endphp value="addUser">
                                    <span>Add User</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("editUser", $perms)) { echo "checked"; } @endphp value="editUser">
                                    <span>Edit User</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" @php if(in_array("deleteUser", $perms)) { echo "checked"; } @endphp value="deleteUser">
                                    <span>Delete User</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Settings</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewSettings", $perms)) { echo "checked"; } @endphp value="viewSettings">
                                    <span>View Settings</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("systemLogs", $perms)) { echo "checked"; } @endphp value="systemLogs">
                                    <span>System Logs</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" @php if(in_array("emailLogs", $perms)) { echo "checked"; } @endphp value="emailLogs">
                                    <span>Email Logs</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("appConfig", $perms)) { echo "checked"; } @endphp value="appConfig">
                                    <span>App Config</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("appPages", $perms)) { echo "checked"; } @endphp value="appPages">
                                    <span>App Pages</span>
                                </label>
                            </div>
                        </div>

                        <div class="row mg-b-25">
                            <div class="col-lg-3">
                                <h6>Tags</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewTags", $perms)) { echo "checked"; } @endphp value="viewTags">
                                    <span>View Tags</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("addTag", $perms)) { echo "checked"; } @endphp value="addTag">
                                    <span>Add Tag</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("editTag", $perms)) { echo "checked"; } @endphp value="editTag">
                                    <span>Edit Tag</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" @php if(in_array("deleteTag", $perms)) { echo "checked"; } @endphp value="deleteTag">
                                    <span>Delete Tag</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Donations</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewDonations", $perms)) { echo "checked"; } @endphp value="viewDonations">
                                    <span>View Donations</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("updateDonation", $perms)) { echo "checked"; } @endphp value="updateDonation">
                                    <span>Update Donation
                                    </span>
                                </label>
                            </div>

                            <div class="col-lg-3">
                                <h6>Events</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("viewEvents", $perms)) { echo "checked"; } @endphp value="viewEvents">
                                    <span>View Events</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("addEvent", $perms)) { echo "checked"; } @endphp value="addEvent">
                                    <span>Add Event</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" @php if(in_array("editEvent", $perms)) { echo "checked"; } @endphp value="editEvent">
                                    <span>Edit Event</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" @php if(in_array("deleteEvent", $perms)) { echo "checked"; } @endphp value="deleteEvent">
                                    <span>Delete Event</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-layout-footer">
                            <input type="hidden" name="perm[]" value="null">
                            <input type="hidden" name="id" value="{{ $role->id }}">
                            <a onclick="javascript:checkAll('roleForm', true);" href="javascript:void();"><button type="button" class="btn text-primary my-4"><i class="fa fa-check-square text-primary"></i>Check All</button></a>
                            <a onclick="javascript:checkAll('roleForm', false);" href="javascript:void();"><button type="button" class="btn text-danger my-4"><i class="fa fa-square text-danger" ></i>Uncheck All</button></a>
                            <button name="submit" class="btn btn-info">Submit</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div>
        </div>

        <script type="text/javascript" language="javascript">
            function checkAll(formname, checktoggle)
                {
                var checkboxes = new Array();
                checkboxes = document[formname].getElementsByTagName('input');

                for (var i=0; i<checkboxes.length; i++)  {
                    if (checkboxes[i].type == 'checkbox')   {
                    checkboxes[i].checked = checktoggle;
                    }
                }
            }
        </script>

@endsection
