@extends("layouts.dashboard.app")
@section("title", "Add Role -" . Auth::user()->firstname . ' '. Auth::user()->lastname)
@section("content")


    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20 ">
          <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="/">{{ config("app.name") }}</a>
            <a class="breadcrumb-item" href="{{ route("roles") }}">Roles</a>
            <span class="breadcrumb-item active">Add Role</span>
          </nav>

        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30" style="display: flex;justify-content:space-between">
          <h4 class="tx-gray-800 mg-b-5">Add Roles</h4>
        </div>


        <div class="br-pagebody">

            @include("layouts.dashboard.alert")
            <div class="br-section-wrapper">
                <form method="POST" name="roleForm" action="{{ route("role.store") }}">

                    @csrf
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="Enter name">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Type: <span class="tx-danger">*</span></label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="team">Team</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                        </div><!-- row -->


                        <div class="row mg-b-25">
                            <div class="col-lg-3">
                                <h6>Roles</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewRoles">
                                    <span>View Roles</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="addRole">
                                    <span>Add Role</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="editRole">
                                    <span>Edit Role</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deleteRole">
                                    <span>Delete Role</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Categories</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewCategories">
                                    <span>View Categories</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="addCategory">
                                    <span>Add Category</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="editCategory">
                                    <span>Edit Category</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deleteCategory">
                                    <span>Delete Category</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Posts</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewPosts">
                                    <span>View Posts</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="addPost">
                                    <span>Add Post</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="editPost">
                                    <span>Edit Post</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deletePost">
                                    <span>Delete Post</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Comments</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewComments">
                                    <span>View Comments</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="approveComment">
                                    <span>Approve Comment</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deleteComment">
                                    <span>Delete Comment</span>
                                </label>
                            </div>

                        </div>

                        <div class="row mg-b-25">
                            <div class="col-lg-3">
                                <h6>Projects</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewProjects">
                                    <span>View Projects</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="addProject">
                                    <span>Add Project</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="editProject">
                                    <span>Edit Project</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deleteProject">
                                    <span>Delete Project</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="assignProject">
                                    <span>Assign Project</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Project Categories</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewProjectCategories">
                                    <span>View Project Categories</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="addProjectCategory">
                                    <span>Add Project Category</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="editProjectCategory">
                                    <span>Edit Project Category</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deleteProjectCategory">
                                    <span>Delete Project Category</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Users</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewUsers">
                                    <span>View Users</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="addUser">
                                    <span>Add User</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="editUser">
                                    <span>Edit User</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deleteUser">
                                    <span>Delete User</span>
                                </label>
                            </div>
                            <div class="col-lg-3">
                                <h6>Settings</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewSettings">
                                    <span>View Settings</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="systemLogs">
                                    <span>System Logs</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="emailLogs">
                                    <span>Email Logs</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="appConfig">
                                    <span>App Config</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="appPages">
                                    <span>App Pages</span>
                                </label>
                            </div>
                        </div>

                        <div class="row mg-b-25">
                            <div class="col-lg-3">
                                <h6>Tags</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewTags">
                                    <span>View Tags</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="addTag">
                                    <span>Add Tag</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="editTag">
                                    <span>Edit Tag</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deleteTag">
                                    <span>Delete Tag</span>
                                </label>
                            </div>

                            <div class="col-lg-3">
                                <h6>Donations</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewDonations">
                                    <span>View Donations</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="updateDonation">
                                    <span>Update Donation
                                    </span>
                                </label>
                            </div>

                            <div class="col-lg-3">
                                <h6>Events</h6>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="viewEvents">
                                    <span>View Events</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="addEvent">
                                    <span>Add Event</span>
                                </label>
                                <label class="ckbox">
                                    <input type="checkbox" name="perm[]" value="editEvent">
                                    <span>Edit Event</span>
                                </label>
                                <label class="ckbox">
                                <input type="checkbox" name="perm[]" value="deleteEvent">
                                    <span>Delete Event</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-layout-footer">
                            <input type="hidden" name="perm[]" value="null">
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
