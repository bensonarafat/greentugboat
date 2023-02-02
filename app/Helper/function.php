<?php

use App\Models\Role;
use App\Models\Pages;
use App\Models\Project;
use App\Models\Category;
use App\Models\Donation;
use Illuminate\Support\Facades\Auth;


function userStatus($status){
    switch ($status) {
        case 'pending':
            return '<span class="badge badge-primary">'. ucfirst($status) .'</span>';
            break;
        case 'activated':
            return '<span class="badge badge-success">'. ucfirst($status) .'</span>';
            break;
        case 'deactivated':
            return '<span class="badge badge-warning">'. ucfirst($status) .'</span>';
            break;
        case 'suspended':
            return '<span class="badge badge-secondary">'. ucfirst($status) .'</span>';
            break;
        case 'blacklisted':
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
        case 'deleted':
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
        default:
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
    }
}

function userRole($is_admin, $is_vendor, $is_volunteer, $is_sponsor){
    $stack = [];

    if($is_admin){
        $stack[] = '<span class="badge badge-primary">Admin</span>';
    }
    if($is_vendor){
        $stack[] = '<span class="badge badge-success">Vendor</span>';
    }
    if($is_volunteer){
        $stack[] = '<span class="badge badge-danger">Volunteer</span>';
    }
    if($is_sponsor){
        $stack[] = '<span class="badge badge-warning">Sponsor</span>';
    }

    return $stack;
}

function userType($type){


    if($type == "admin"){
        return '<span class="badge badge-primary">Admin</span>';
    }else if($type == "team"){
        return '<span class="badge badge-success">Team</span>';
    }else if($type == "user"){
        return '<span class="badge badge-danger">User</span>';
    }else{
        return '<span class="badge badge-danger">Error</span>';
    }
}

function projectStatus($status){
    switch ($status) {
        case 'scheduled':
            return '<span class="badge badge-primary">'. ucfirst($status) .'</span>';
            break;
        case 'active':
            return '<span class="badge badge-success">'. ucfirst($status) .'</span>';
            break;
        case 'inactive':
            return '<span class="badge badge-warning">'. ucfirst($status) .'</span>';
            break;
        case 'suspended':
            return '<span class="badge badge-secondary">'. ucfirst($status) .'</span>';
            break;
        case 'ended':
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
        case 'deleted':
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
        default:
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
    }
}


function donationStatus($status){
    switch ($status) {
        case 'pending':
            return '<span class="badge badge-primary">'. ucfirst($status) .'</span>';
            break;
        case 'active':
            return '<span class="badge badge-success">'. ucfirst($status) .'</span>';
            break;
        case 'inactive':
            return '<span class="badge badge-warning">'. ucfirst($status) .'</span>';
            break;
            break;
        case 'declined':
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
        case 'deleted':
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
        default:
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
    }
}

function naira(){
    return "&#8358;";
}
function postStatus($status){
    switch ($status) {
        case 'draft':
            return '<span class="badge badge-warning">'. ucfirst($status) .'</span>';
            break;
        case 'publish':
            return '<span class="badge badge-success">'. ucfirst($status) .'</span>';
            break;
        default:
            return '<span class="badge badge-danger">'. ucfirst($status) .'</span>';
            break;
    }
}

function pagesContent($page, $section, $type = null, $multiple = false){
    if($multiple){
        if($type == "faq"){
            $data = Pages::where(["section" => $section, "page" => $page])->orderBy("icon", "ASC")->get();
        }else if($section == "game-plan" && $type == "slide"){
            $data = Pages::where(["section" => $section, "page" => $page])->orderBy("image", "ASC")->get();
        }else{
            $data = Pages::where(["section" => $section, "page" => $page])->get();
        }
        return $data;
    }else{
        if($type){
            return Pages::where(["section" => $section, "page" => $page, "type" => $type])->first();
        }else{
            return Pages::where(["section" => $section, "page" => $page])->first();
        }
    }

}

function recursiveCategory($id = null, $editid = null){
    if($id){
        $categories = Category::where(["type" => "project", "parentid" => $id])->latest()->get();
    }else{
        $categories = Category::where("type", "project")->whereNull("parentid")->latest()->get();
    }

    $html = "";

    foreach ($categories as $row) {
        $html .= '
                <div class="card">
                <div class="card-header" role="tab" id="heading'.$row->id.'">
                <h6 class="mg-b-0">
                    <a class="collapsed tx-gray-800 transition" data-toggle="collapse" data-parent="#accordion'. $row->id .'" href="#collapse'. $row->id .'" aria-expanded="false" aria-controls="collapse'.$row->id .'">
                        <div style="display:flex;justify-content: space-between;">
                            '. $row->name .'
                            '. radioSelect($row->id, $editid) .'
                        </div>
                    </a>
                </h6>
                </div>
                <div id="collapse'. $row->id .'" class="collapse" role="tabpanel" aria-labelledby="heading'.$row->id.'">
                <div class="card-block pd-20">
                    '. recursiveCategory($row->id) .'
                </div>
                </div>
            </div>
        ';
    }

    return $html;
}


function radioSelect($id, $edit){
    if($edit){
        if($edit == $id){
            $isChecked = "checked";
        }else{
            $isChecked = "";
        }
        return '<input type="radio" name="category_id" id="" '. $isChecked .' value="'.$id.'">';
    }else{
        return '<input type="radio" name="category_id" id="" value="'.$id.'">';
    }
}
function projectPercentage($id){
    // totoal budget of all projects
    $project = Project::find($id);
    $total_raised = Donation::where(['project_id' => $id, "status" => "active"])->sum('amount');
    // percentages raised
    if($project->budget > 0){
        $percentage_raised = ($total_raised / $project->budget) * 100;
    }else{
        $percentage_raised = 0;
    }

    return  round($percentage_raised);
}


function getPermission($permission){
    if(Auth::check()){
        $role_id = auth()->user()->role_id;
        $role = Role::find($role_id);
        $perms = json_decode($role->perms);
        if(in_array($permission, $perms)){
            return true;
        }
        return false;
    }
    return false;
}

function postCategories($categories, $postcategories = null){

    if($postcategories){
        $postcat = json_decode($postcategories, true);
    }else{
        $postcat = [];
    }
    $html = "";
    foreach($categories as $row){

        $subcat = Category::where(["parentid" => $row->id])->get();

        $isChecked = "";
        if(in_array($row->id, $postcat)){
            $isChecked = "checked";
        }
        $html .= '
                <li style="list-style:none;">
                    <label>
                        <input type="checkbox" name="categories[]" '. $isChecked .' value="'. $row->id .'"> '. $row->name .'
                    </label>
                    <ul id="myUL">
                        '. postCategories($subcat, $postcategories) .'
                    </ul>
                </li>
                    ';
    }

    return $html;
}


function renameNamePath(){
    return str_replace(url('/'), '', url()->previous());
}
?>
