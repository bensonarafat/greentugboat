<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use App\Models\Pages;
use App\Models\Comment;
use App\Models\Project;
use App\Models\Category;
use App\Models\Donation;
use App\Charts\DashboardChart;
use App\Models\ProjectApplication;

class PagesController extends Controller
{
    public function index(){


        $posts = Post::where('status', 'publish')->orderBy('created_at', 'desc')->limit(4)->get();

        // totoal budget of all projects
        $total_budget = Project::where('status', 'active')->sum("budget");
        $total_raised = Project::where('status', 'active')->sum('raised');
        $total_remaining = $total_budget - $total_raised;
        // percentages raised
        if($total_budget > 0){
            $percentage_raised = ($total_raised / $total_budget) * 100;
        }else{
            $percentage_raised = 0;
        }
        return view("index")->with([
            "posts" => $posts,
            "total_budget" => $total_budget,
            "total_raised" => $total_raised,
            "total_remaining" => $total_remaining,
            "percentage_raised" => $percentage_raised,
        ]);
    }
    public function about(){
        return view("about");
    }

    public function faq(){
        $categories = Category::where("type", "project")->latest()->limit(5)->get();
        return view("faq")->with([
            "categories" => $categories,
        ]);
    }
    public function projects(){
        $categories = Category::where("type", "project")->whereNull("parentid")->limit(5)->latest()->get();

        $projects = Project::where('status', '!=', 'deleted')->orderBy('created_at', 'desc')->paginate(10);
        return view("projects")->with([
            "categories" => $categories,
            "projects" => $projects,
        ]);
    }

    public function userDetails($username){
        $user = User::where("username", $username)->first();
        $type = "All Projects";
        if(request()->has("type")){
            if(request()->get("type") == "past"){
                $projects = Project::where(["status" => "completed"])->where(function($query) use ($user) {
                    $query->orWhere("vendor_id", $user->id)

                    ->orWhere("sponsor_id", $user->id);
                })->latest()->get();

                $type = "Pasted Projects";
            }else{
                $projects = Project::where(["status" => "active"])->where(function($query) use ($user){
                    $query->orWhere("vendor_id", $user->id)
                    ->orWhere("sponsor_id", $user->id);
                })->latest()->get();
            }

            $type = "Active Projects";
        }else{
            $projects = Project::where("status", "!=" ,"deleted")->where(function($query) use ($user){
                $query ->orWhere("vendor_id", $user->id)
                ->orWhere("sponsor_id", $user->id);
            })->latest()->get();
        }
        $categories = Category::where("type", "project")->whereNull("parentid")->limit(5)->latest()->get();
        return view("user-projects", compact("user", "projects", 'type', 'categories'));
    }

    public function users(){
        $type = "Users";
        if(request()->has("type")){
            $type = request()->get("type");
            if($type == "volunteer"){
                $where = [
                    "is_account_completed" => true,
                    "status" => "activated",
                    "is_volunteer" => true,
                ];
                $type = "Volunteer";
            }else if ($type == "sponsor"){
                $where = [
                    "is_account_completed" => true,
                    "status" => "activated",
                    "is_sponsor" => true,
                ];
                $type = "Sponsor";
            }else if($type == "vendor"){
                $where = [
                    "is_account_completed" => true,
                    "status" => "activated",
                    "is_vendor" => true,
                ];
                $type = "Vendor";
            }else{
                $where = [
                    "is_account_completed" => true,
                    "status" => "activated",
                ];
            }

            if(request()->has("sort")){
                if(request()->get("sort") == "new"){
                    $users = User::where($where)->latest()->paginate(20);
                }else{
                    $users = User::where($where)->oldest()->paginate(20);
                }

            }else{

                $users = User::where($where)->latest()->paginate(20);
            }

            $count = User::where($where)->count();

        }else{
            if(request()->has("sort")){
                if(request()->get("sort") == "new"){

                $users = User::where(["is_account_completed" => true, "status" => "activated"])->latest()->paginate(20);

                }else{
                $users = User::where(["is_account_completed" => true, "status" => "activated"])->oldest()->paginate(20);

                }
            }else{
                $users = User::where(["is_account_completed" => true, "status" => "activated"])->latest()->paginate(20);
            }

            $count = User::where(["is_account_completed" => true, "status" => "activated"])->count();
        }
        return view("users", compact("users", "count", "type"));
    }
    public function project($id, $slug){
        $categories = Category::where("type", "project")->whereNull("parentid")->limit(5)->latest()->get();
        $donations = Donation::where(["project_id" => $id, "status" => "active"])->get();

        return view("project")->with([
            "project" => Project::find($id),
            "categories" => $categories,
            "donations" => $donations
        ]);
    }
    public function discussions(){
        $posts = Post::where(["status" => "publish"])->latest()->paginate(15);
        $tags = Tag::latest()->limit(10)->get();
        $categories = Category::where("type", "blog")->latest()->limit(6)->get();
        $pinned_posts = Post::where(["status" => "publish", "is_pinned" => 1])->first();
        return view("discussions")->with(["posts" => $posts, "categories" => $categories, "tags" => $tags,  "pinned" => $pinned_posts]);
    }

    public function discussion($id, $slug){
        $post = Post::find($id);
        $posts = Post::where(["status" => "publish"])->latest()->take(5)->get();
        $tags = Tag::latest()->limit(10)->get();
        $categories = Category::where("type", "blog")->latest()->limit(6)->get();
        $posttags = json_decode($post->tags);
        $comments = Comment::where(["postid" => $id, "status" => "approve"])->whereNull("parentid")->get();
        return view("discussion")->with(["post" => $post, "posts" => $posts, "tags" => $tags, "categories" => $categories, "posttags" => $posttags, "comments" => $comments]);
    }

    public function privacy(){
        return view("privacy-policy");
    }
    public function terms(){
        return view("terms-service");
    }


    public function sponsor(){
        $categories = Category::where("type", "project")->whereNull("parentid")->limit(5)->latest()->get();
        $projects = Project::where('status', 'active')->orderBy('created_at', 'desc')->paginate(10);
        return view("action.sponsor", compact("categories", "projects"));
    }

    public function promote(){
        $categories = Category::where("type", "project")->whereNull("parentid")->limit(5)->latest()->get();
        $projects = Project::where('status', 'active')->orderBy('created_at', 'desc')->paginate(10);
        return view("action.promote", compact("categories", "projects"));
    }

    public function events(){
        $events = Event::latest()->get();
        return view("action.events", compact("events"));
    }

    public function event($id, $slug){
        $event = Event::find($id);
        return view("action.event", compact("event"));
    }

    public function contact(){
        return view("contact");
    }

    public function account(){

        $chart = new DashboardChart;

        # get the donations for this months
        $donationschartdata = Donation::where("status", "active")->whereMonth('created_at', date('m'))->pluck('amount', 'created_at');

        $keyarray = [];
        for ($x = 0; $x < count($donationschartdata->keys()); $x++) {
            //convert date to better format
            $keyarray[] = date("M", strtotime($donationschartdata->keys()[$x]));
        }

        $chart->labels($keyarray);
        $chart->dataset('Monthly Donations', 'line', $donationschartdata->values())->color("#ff0000");

        $countUser = User::where("status", "activated")->count();
        if(auth()->user()->type == "user"){
            $countProject = Project::where("status", "!=" ,"deleted")->where(function($query){
                $query->orWhere("vendor_id", auth()->user()->id)
                ->orWhere("sponsor_id", auth()->user()->id);
            })->latest()->count();
            $countDonation = Donation::where(["status" => "active", "user_id" => auth()->user()->id])->count();

        }else{
            $countDonation = Donation::where("status", "active")->count();
            $countProject = Project::where("status", "!=" ,"deleted")->count();
        }

        $openProjects = Project::where("status", "active")->count();
        $completedProjects = Project::where("status", "completed")->count();
        $totalPosts = Post::where("status", "publish")->count();
        $totalComments = Comment::where("status", "approve")->count();

        $totalCategories = Category::count();
        $posts = Post::latest()->limit(3)->get();

        // totoal budget of all projects
        $total_budget = Project::where('status', 'active')->sum("budget");
        $total_raised = Project::where('status', 'active')->sum('raised');
        $total_remaining = $total_budget - $total_raised;
        // percentages raised
        if($total_budget > 0){
            $percentage_raised = ($total_raised / $total_budget) * 100;
        }else{
            $percentage_raised = 0;
        }

        $users = User::where("status", "activated")->latest()->limit(5)->get();
        if(auth()->user()->type == "user"){
            $latestdonations = Donation::where("user_id", auth()->user()->id)->latest()->limit(5)->get();
            $projects = Project::where("vendor_id", auth()->user()->id)
                                ->orWhere("sponsor_id", auth()->user()->id)
                                ->latest()->limit(5)->get();
        }else{
            $latestdonations = Donation::latest()->limit(5)->get();
            $projects = Project::latest()->limit(5)->get();
        }


        return view("account.index")->with([
            "countUser" => $countUser,
            "countProject" => $countProject,
            "countDonation" => $countDonation,
            "openProjects" => $openProjects,
            "completedProjects" => $completedProjects,
            "totalPosts" => $totalPosts,
            "totalComments" => $totalComments,
            "totalCategories" => $totalCategories,
            "posts" => $posts,
            "total_budget" => $total_budget,
            "total_raised" => $total_raised,
            "total_remaining" => $total_remaining,
            "percentage_raised" => round($percentage_raised),
            "users" => $users,
            "chart" => $chart,
            "latestdonations" => $latestdonations,
            "donations" => $latestdonations,
            "projects" => $projects,
        ]);
    }

    public function donations(){
        $donations = Donation::where("user_id", auth()->user()->id)->latest()->get();
        return view("account.donations")->with(["donations" => $donations]);
    }

    public function donate($id){
        $project = Project::find($id);
        $donation_exists = Donation::where(["project_id" => $id, "user_id" => auth()->user()->id])->exists();
        $donations = Donation::where(["project_id" => $id, "status" => "active"])->get();
        return view("donate")->with([
            "project" => $project,
            "donation_exists" => $donation_exists,
            "donations" => $donations
        ]);
    }

    public function vendorBid($id){
        $project = Project::find($id);
        $donations = Donation::where(["project_id" => $id, "status" => "active"])->get();
        $projectApplication = ProjectApplication::where(["user_id" => auth()->user()->id, "type" => "vendor"])->first();
        return view("vendor-bid", compact("project", "projectApplication", "donations"));
    }

    public function continueRegistration(){
        return view("account.continue-registration");
    }


    // account
    public function people(){
        $people = User::latest()->get();
        return view("account.people.index")->with(["people" => $people]);
    }

    public function profile(){
        return view("account.people.profile");
    }
    public function changePassword(){
        return view("account.people.change-password");
    }

    public function addPeople(){
        $roles = Role::latest()->get();
        return view("account.people.add")->with(["roles"=>$roles]);
    }

    public function roles(){
        $roles = Role::latest()->get();
        return view("account.roles.index")->with(["roles" => $roles]);
    }

    public function editRole($id){
        $role = Role::find($id);
        $perms = json_decode($role->perms);
        return view("account.roles.edit")->with(["role" => $role, "perms" => $perms]);
    }

    public function createRole(){

        return view("account.roles.add");
    }

    public function categories(){
        $categories = Category::where("type", "blog")->latest()->get();
        $parentCategory = Category::where("type", "blog")->whereNull("parentid")->get();
        return view("account.categories")->with(["categories" => $categories, "parentCategory" => $parentCategory]);
    }

    public function editCategoryModal($id){
        $category = Category::find($id);
        $view = view('modals.category.edit', compact('category'))->render();
        return response()->json(['html'=>$view]);
    }

    public function viewUser($id, $username){
        $user = User::find($id);
        return view("account.people.view")->with(["user" => $user]);
    }

    public function newPost(){
        $tags = Tag::latest()->get();
        $categories = Category::where(["type" => "blog"])->whereNull("parentid")->latest()->get();
        return view("account.posts.new")->with(["tags" => $tags, "categories" => $categories]);
    }

    public function managePost(){
        $posts = Post::latest()->get();
        return view("account.posts.manage")->with(["posts" => $posts]);
    }

    public function editPost($id){
        $post = Post::find($id);
        $tags = Tag::latest()->get();
        $categories = Category::where(["type" => "blog"])->whereNull("parentid")->latest()->get();
        $posttags = json_decode($post->tags);
        return view("account.posts.edit")->with(["post" => $post, "tags" => $tags, "categories" => $categories, "posttags" => $posttags]);
    }

    // Events

    public function newEvent(){
        return view("account.events.new");
    }

    public function manageEvent(){
        $events = Event::latest()->get();
        return view("account.events.manage", compact("events"));
    }

    public function editEvent($id){
        $event = Event::find($id);
        return view("account.events.edit", compact("event"));
    }



    public function tags(){
        $tags = Tag::latest()->get();
        return view("account.posts.tags")->with(["tags" => $tags]);
    }

    public function editTagModal($id){
        $tag = Tag::find($id);
        $view = view('modals.tag.edit', compact('tag'))->render();
        return response()->json(['html'=>$view]);
    }


    public function projectCategories(){
        $categories = Category::where("type", "project")->latest()->get();
        $parentCategory = Category::where("type", "project")->get();
        return view("account.projects.categories")->with(["categories" => $categories, "parentCategory" => $parentCategory]);
    }

    public function editProjectCategoryModal($id){
        $category = Category::find($id);
        $view = view('modals.project.category', compact('category'))->render();
        return response()->json(['html'=>$view]);
    }

    public function manageProjects(){
        if(request()->has("status")){
            $status = request()->get("status");
            if($status == "open"){
                $_status = "active";
            }else{
                $_status = "completed";
            }
            $projects = Project::where("status", $_status)->latest()->get();
        }else{
            $projects = Project::latest()->get();
        }

        return view("account.projects.index")->with(["projects" => $projects]);
    }

    public function addProject(){
        $people = User::where("is_admin", true)->latest()->get();
        $categories = Category::where("type", "project")->latest()->get();

        return view("account.projects.add")->with([
            "people" => $people,
            "categories" => $categories
        ]);
    }

    public function editProject($id){
        $project = Project::find($id);
        $people = User::where("is_admin", true)->latest()->get();
        $categories = Category::where("type", "project")->latest()->get();
        return view("account.projects.edit")->with(["project" => $project, "people" => $people, "categories" => $categories]);
    }


    public function viewProject($id){
        $project = Project::find($id);
        $author = User::find($project->author);
        $supervisor = User::where("is_admin", true)->latest()->get();
        $donations = Donation::where("project_id", $id)->latest()->get();
        $vendorApplications = ProjectApplication::where(["type" => "vendor", "project_id" => $id])->latest()->get();
        $volunteerApplications = ProjectApplication::where(["type" => "volunteer", "project_id" => $id])->latest()->get();
        return view("account.projects.view")->with(["project" => $project, "author" => $author, "supervisor" => $supervisor, "vendorApplications" => $vendorApplications, "donations" => $donations, "volunteerApplications" => $volunteerApplications]);
    }

    public function managebids(){
        $bids = ProjectApplication::where("user_id", auth()->user()->id)->latest()->get();
        return view("account.bids.index", compact("bids"));
    }

    public function donateNow(){
        $projects = null;
        if(request()->has("set")){
            $budgets = floatval(request()->get("budget"));

            $projects = [];

            $all = Project::where(["status" =>  "active"])->orderBy("priority", "DESC")->get();

            foreach ($all as $row) {
                $remains = floatval($row->budget) - floatval($row->raised);

                if($budgets > 0 ){
                    $balance = floatval($budgets) - floatval($remains);
                    $budgets = $balance;
                    $projects[] = $row;
                }else{
                    continue;
                }

            }

        }

        return view("account.donate", compact("projects"));
    }
    public function manageComments(){
        $comments = Comment::latest()->get();
        return view("account.comments.index")->with(["comments" => $comments]);
    }

    public function pagesHome(){
        return view("account.pages.home.index");
    }
    public function pagesHomeBanner(){
        return view("account.pages.home.banner");
    }
    public function pagesGamePlan(){
        $data = Pages::where(["section" => "game-plan", "page" => "home"])->get();
        return view("account.pages.home.game-plan")->with(["data" => $data]);
    }

    public function pagesSupportPartner(){
        $data = Pages::where(["section" => "support-partner", "page" => "home"])->get();
        return view("account.pages.home.support-partner")->with(["data" => $data]);
    }

    public function pagesHomeJoinUs(){
        $data = Pages::where(["section" => "join-us", "page" => "home"])->get();
        return view("account.pages.home.join-us")->with(["data" => $data]);
    }

    public function pagesHomeAboutFoundation(){
        $data = Pages::where(["section" => "about-foundation", "page" => "home"])->get();
        return view("account.pages.home.about-foundation")->with(["data" => $data]);
    }

    public function pagesHomeNeedYourHelp(){
        $data = Pages::where(["section" => "need-your-help", "page" => "home"])->get();
        return view("account.pages.home.need-your-help")->with(["data" => $data]);
    }

    public function pagesHomeTestimonial(){
        $data = Pages::where(["section" => "testimonial", "page" => "home"])->get();
        return view("account.pages.home.testimonial")->with(["data" => $data]);
    }
    public function pageAbout(){
        return view("account.pages.about.index");
    }

    public function aboutFoundation(){
        $data = Pages::where(["section" => "foundation", "page" => "about"])->first();
        return view("account.pages.about.foundation")->with(["data" => $data]);
    }

    public function aimsObjective(){
        $data = Pages::where(["section" => "aims-objectives", "page" => "about"])->first();
        return view("account.pages.about.aims-objective")->with(["data" => $data]);
    }
    public function mission(){
        $data = Pages::where(["section" => "mission", "page" => "about"])->first();
        return view("account.pages.about.mission")->with(["data" => $data]);
    }
    public function vision(){
        $data = Pages::where(["section" => "vision", "page" => "about"])->first();
        return view("account.pages.about.vision")->with(["data" => $data]);
    }

    public function coreValue(){
        $data = Pages::where(["section" => "core-value", "page" => "about"])->first();
        return view("account.pages.about.core-value")->with(["data" => $data]);
    }

    public function stratergyMethod(){
        $data = Pages::where(["section" => "stratergy-methods", "page" => "about"])->first();
        return view("account.pages.about.stratergy-method")->with(["data" => $data]);
    }


    public function aboutVolunteers(){
        $data = Pages::where(["section" => "volunteers", "page" => "about"])->get();
        return view("account.pages.about.volunteers")->with(["data" => $data]);
    }

    public function pageFaq(){
        $data =  Pages::where(["section" => "faq", "page" => "faq"])->get();
        return view("account.pages.faq.index")->with(["data" => $data]);
    }


    public function pageContact(){
        $data =  Pages::where(["section" => "contact", "page" => "contact"])->get();
        return view("account.pages.contact.index")->with(["data" => $data]);
    }

    public function editGamePlanModal($id){
        $data = Pages::find($id);
        $view = view('modals.pages.game-plan', compact('data'))->render();
        return response()->json(['html'=>$view]);
    }

    public function editSupportPartnerModal($id){
        $data = Pages::find($id);
        $view = view('modals.pages.support-partner', compact('data'))->render();
        return response()->json(['html'=>$view]);
    }

    public function editNeedYourHelpModal($id){
        $data = Pages::find($id);
        $view = view('modals.pages.need-your-help', compact('data'))->render();
        return response()->json(['html'=>$view]);
    }

    public function editTestimonialModal($id){
        $data = Pages::find($id);
        $view = view('modals.pages.testimonial', compact('data'))->render();
        return response()->json(['html'=>$view]);
    }

    public function editVolunteersModal($id){
        $data = Pages::find($id);
        $view = view('modals.pages.volunteers', compact('data'))->render();
        return response()->json(['html'=>$view]);
    }

    public function editFaqModal($id){
        $data = Pages::find($id);
        $view = view('modals.pages.faq', compact('data'))->render();
        return response()->json(['html'=>$view]);
    }

    public function editContactModal($id){
        $data = Pages::find($id);
        $view = view('modals.pages.contact', compact('data'))->render();
        return response()->json(['html'=>$view]);
    }

    public function pageTerms(){
        $data = Pages::where(["section" => "terms", "page" => "terms"])->first();
        return view("account.pages.terms.index")->with(["data" => $data]);
    }

    public function pagePrivacy(){
        $data = Pages::where(["section" => "privacy", "page" => "privacy"])->first();
        return view("account.pages.privacy.index")->with(["data" => $data]);
    }

    public function submitPaymentProof(){
        return view("account.payment-proof");
    }

    public function search(){
        $q = request()->get("q");
        if($q == "") return redirect()->back();

        $projects = Project::where("status", "active")->where('title', 'LIKE', "%{$q}%")->latest()->paginate(10);

        $posts = Post::where("status", "publish")->where('title', 'LIKE', "%{$q}%")->latest()->paginate(10);

        return view("search", compact("projects", "posts"));
    }


    public function company(){
        return view("account.company.index");
    }

    public function portfolio(){
        return view("account.portfolio.index");
    }

}
