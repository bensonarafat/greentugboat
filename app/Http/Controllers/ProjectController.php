<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Project;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Mail\ProjectDonationAdmin;
use App\Models\ProjectApplication;
use Illuminate\Support\Facades\Log;
use App\Mail\ProjectDonationSponsor;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectApplicationStatus;
use App\Mail\ProjectDonationVolunteer;
use App\Http\Classes\SystemFileManager;
use App\Mail\ProjectApplicationRequest;
use App\Mail\ProjectDonationSupervisor;
use Illuminate\Support\Facades\Session;
use App\Mail\ProjectApplicationRequestAdmin;

class ProjectController extends Controller
{
    public function store(Request $request){
        $request->validate([
            "title" => "required",
            "editorinstance" => "required",
            "start_date" => "required",
            "deadline" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "category_id" => "required",
            "volunteer" => "required",
        ]);

        try {
            $images = [];
            if($request->images){
                for($x = 0; $x < count($request->images); $x ++){
                    $image = SystemFileManager::InternalUploader($request->images[$x], "projects");
                    $images[] = $image;
                    array_push($images, $image);
                }
                $featureimage = $images[0];
            }
            if($request->supervisor_id) {
                $supervisor_id = $request->supervisor_id;
            }else{
                $supervisor_id = null;
            }

            $replace = array(" ", "'", ".", ",","/",'"', "?","[","]","(",")");
            $slug = strtolower(trim(str_replace($replace,"-",$request->title)));
            $content_filtered = substr(strip_tags($request->editorinstance), 0, 100);
            Project::create([
                "title" => $request->title,
                'slug' => $slug,
                "author" => auth()->user()->id,
                "start_date" => $request->start_date,
                "deadline" => $request->deadline,
                "story" => $request->editorinstance,
                "category_id" => $request->category_id,
                "images" => json_encode($images),
                "content_filtered" => $content_filtered,
                "featureimage" => $featureimage,
                "supervisor_id" => $supervisor_id,
                "priority" => $request->priority,
                "volunteer" => $request->volunteer,
            ]);

            return redirect()->back()->with(["success" => "Project published"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }

    }

    public function update(Request $request){
        $request->validate([
            "title" => "required",
            "editorinstance" => "required",
            "start_date" => "required",
            "deadline" => "required",
            "images.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "category_id" => "required",
            "volunteer" => "required",
        ]);

        try {
            $images = [];
            if($request->images){
                for($x = 0; $x < count($request->images); $x ++){
                    $image = SystemFileManager::InternalUploader($request->images[$x], "projects");
                    $images[] = $image;
                    array_push($images, $image);
                }
                $images = json_encode($images);
                $featureimage = $images[0];
            }else{
                $images = $request->imagespan;
                $featureimage = json_decode($images)[0];

            }
            if($request->supervisor_id) {
                $supervisor_id = $request->supervisor_id;
            }else{
                $supervisor_id = null;
            }

            $replace = array(" ", "'", ".", ",","/",'"', "?","[","]","(",")");
            $slug = strtolower(trim(str_replace($replace,"-",$request->title)));
            $content_filtered = substr(strip_tags($request->editorinstance), 0, 100);
            Project::where("id", $request->id)->update([
                "title" => $request->title,
                'slug' => $slug,
                "author" => auth()->user()->id,
                "start_date" => $request->start_date,
                "deadline" => $request->deadline,
                "story" => $request->editorinstance,
                "category_id" => $request->category_id,
                "images" => $images,
                "content_filtered" => $content_filtered,
                "featureimage" => $featureimage,
                "supervisor_id" => $supervisor_id,
                "priority" => $request->priority,
                "volunteer" => $request->volunteer,
            ]);

            return redirect()->back()->with(["success" => "Project updated"]);
        } catch (Exception $e) {

            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateProjectStatus(Request $request){
        try {
            Project::where("id", $request->id)->update(["status" => $request->status]);
            return redirect()->back()->with(["success" => "Project status updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateSupervisor(Request $request){
        try {
            Project::where("id", $request->id)->update(["supervisor_id" => $request->supervisor_id]);
            return redirect()->back()->with(["success" => "Project supervisor updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function removeSupervisor($id){
        try {
            Project::where("id", $id)->update(["supervisor_id" => null]);
            return redirect()->back()->with(["success" => "Project supervisor removed"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function donationPayment(Request $request){
        $request->validate([
            "payment_proof" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "id" => "required",
            "amount" => $request->amount,
        ]);

        try {
            $donation = Donation::create([
                "project_id" => $request->id,
                "user_id" => auth()->user()->id,
                "amount" => $request->amount,
                "image" => SystemFileManager::InternalUploader($request->payment_proof, "donations"),
            ]);

            $project = Project::find($request->id);

            $data = [
                "project" => $project,
                "donation" => $donation,
                "supervisor" => User::find($project->supervisor_id),
                "volunteer" => User::find($project->volunteer_id),
                "sponsor" => User::find(auth()->user()->id),
            ];
            $sponsor = User::find(auth()->user()->id);
            $supervisor = User::find($project->supervisor_id);
            $volunteer = User::find($project->volunteer_id);

            Mail::to("sponsor@greentugboat.org")->send(new ProjectDonationAdmin($data));
            if($sponsor) Mail::to($sponsor->email)->send(new ProjectDonationSponsor($data));
            if($supervisor) Mail::to($supervisor->email)->send(new ProjectDonationSupervisor($data));
            if($volunteer) Mail::to($volunteer->email)->send(new ProjectDonationVolunteer($data));


            Session::forget("donation");
            Session::forget("donation_project_id");
            Session::forget("amount");

            return redirect("/project". "/" . $project->id . '/' . $project->slug )->with(["success" => "You have successfully made a donation and your payment is under review"]);
        } catch (Exception $e) {
            Log::info($e);

            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function projectApplication($id, $type){


        try {

            ///
            /// check if user is registered for the role
            ///
            if($type == "vendor"){
                if(!auth()->user()->is_vendor){
                    return redirect()->back()->with(["warning" => "You can't apply as a vendor for this project, please update your profile"]);
                }
            }else if($type == "volunteer"){
                if(!auth()->user()->is_volunteer){
                    return redirect()->back()->with(["warning" => "You can't apply as a volunteer for this project, please update your profile"]);
                }
            }else if($type == "sponsor"){
                if(!auth()->user()->is_sponsor){
                    return redirect()->back()->with(["warning" => "You can't apply as a sponsor for this project, please update your profile"]);
                }
            }else{
                return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
            }

            ProjectApplication::create(
                [
                    "user_id" => auth()->user()->id,
                    "project_id" => $id,
                    "type" => $type,
                ]
            );
            $data =   [
                "project" => Project::find($id),
                "user" => User::find(auth()->user()->id),
                "type" => $type,
            ];
            //send mail to admin
            Mail::to("sponsor@greentugboat.org")->send(new ProjectApplicationRequestAdmin($data));
            //send mail to user
            $email = auth()->user()->email;
            Mail::to($email)->send(new ProjectApplicationRequest($data));

            return redirect()->back()->with(["success" => "You have successfully applied for this project, your application is under review"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }


    public function updateDonationStatus(Request $request){
        try {
            Donation::where("id", $request->id)->update(["status" => $request->status]);
            if($request->status == "active"){
                $donation = Donation::find($request->id);
                $project = Project::find($donation->project_id);
                $raised = $project->raised;
                $total = $donation->amount + $raised;
                Project::where("id", $project->id)->update(["raised" => $total]);

                $data = [
                    "project" => $project,
                    "total" => $total,
                    "donation" => $donation,
                    "supervisor" => User::find($project->supervisor_id),
                    "volunteer" => User::find($project->volunteer_id),
                    "sponsor" => User::find($project->sponsor_id)
                ];
                $sponsor = User::find($project->sponsor_id);
                $supervisor = User::find($project->supervisor_id);
                $volunteer = User::find($project->volunteer_id);

                Mail::to("info@greentugboat.org")->send(new ProjectDonationAdmin($data));
                if($sponsor) Mail::to($sponsor->email)->send(new ProjectDonationSponsor($data));
                if($supervisor) Mail::to($supervisor->email)->send(new ProjectDonationSupervisor($data));
                if($volunteer) Mail::to($volunteer->email)->send(new ProjectDonationVolunteer($data));

            }


            return redirect()->back()->with(["success" => "Project status updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateProjectApplicationStatus(Request $request){
        try {
            $projectapplication = ProjectApplication::find($request->id);
            ProjectApplication::where(["id" => $request->id])->update(["status" => $request->status]);
            if($projectapplication->type == "volunteer"){
                if($request->status != "active"){
                    Project::where("id", $projectapplication->project_id)->update(["volunteer_id" => null]);
                }else{
                    Project::where("id", $projectapplication->project_id)->update(["volunteer_id" => $projectapplication->user_id]);
                }
            }else if($projectapplication->type == "vendor"){
                if($request->status != "active"){
                    Project::where("id", $projectapplication->project_id)->update(["vendor_id" => null, "status" => "pending"]);
                }else{
                    Project::where("id", $projectapplication->project_id)->update(["vendor_id" => $projectapplication->user_id, "status" => "active", "budget" => $projectapplication->amount]);
                }
            }

            $user = User::find($projectapplication->user_id);
            Mail::to($user->email)->send(new ProjectApplicationStatus([
                "user" => $user,
                "type" => $projectapplication->type,
                "status" => $request->status,
                "project" => Project::find($projectapplication->project_id),
            ]));

            return redirect()->back()->with(["success" => "Project status updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateRaisedAmount(Request $request){
        $request->validate([
            "amount" => "required",
            "id" => "required"
        ]);
        try {
            Project::where("id", $request->id)->update(["raised" => $request->amount]);
            Donation::create([
                "project_id" => $request->id,
                "user_id" => auth()->user()->id,
                "amount" => $request->amount,
                "image" => 'images/system/donations/default.png',
                "status" => "active",
            ]);
            return redirect()->back()->with(["success" => "Project raised amount updated"]);
        } catch (\Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function revokeProjectApplication($id){
        try {
            ProjectApplication::where("id", $id)->delete();
            return redirect()->back()->with(["success" => "Application revoked"]);
        } catch (\Exception $th) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function applybidproject(Request $request) {
        $request->validate([
            "amount" => "required",
            "invoice" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "cv" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            if($request->invoice){
                $invoice = SystemFileManager::InternalUploader($request->invoice, "projects");
            }else{
                $invoice = null;
            }
            if($request->cv){
                $cv = SystemFileManager::InternalUploader($request->cv, "projects");
            }else{
                $cv = null;
            }
            $project = Project::find($request->project_id);
            ProjectApplication::create([
                "amount" => $request->amount,
                "invoice" => $invoice,
                "cv" => $cv,
                "description" => $request->description,
                "project_id" => $request->project_id,
                "user_id" => auth()->user()->id,
                "type" => "vendor",
            ]);

            $data =   [
                "project" => Project::find($request->project_id),
                "user" => User::find(auth()->user()->id),
                "type" => "vendor",
            ];
            //send mail to admin
            Mail::to("sponsor@greentugboat.org")->send(new ProjectApplicationRequestAdmin($data));
            //send mail to user
            $email = auth()->user()->email;
            Mail::to($email)->send(new ProjectApplicationRequest($data));

            return redirect("/project/$project->id}/$project->slug")->with(["success" => "Vendor Application sent"]);

        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }
}
