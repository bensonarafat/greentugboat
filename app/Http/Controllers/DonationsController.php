<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Project;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Classes\SystemFileManager;

class DonationsController extends Controller
{
    public function setDonateHandler(Request $request){

        $selected = $request->selected;
        if(count($selected) == 0){
            return redirect()->back()->with(["error" => "You must select at least one project"]);
        }
        //set session
        session()->put("projects", $selected);
        return redirect()->back()->with(["success" => "Download the document which you can take to your bank for payment"]);

    }

    public function sponsorPdf(Request $request){


        $projects = \App\Models\Project::whereIn("id", session()->get("projects"))->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->setPaper("A4", "portrait")->loadView(
            'bank-instruction', [
            "budget" => $request->budget,
            "amount" => $request->amount,
            "name" => auth()->user()->firstname . ' '. auth()->user()->lastname,
            "mobile" => auth()->user()->mobile,
            "email" => auth()->user()->email,
            "projects" => $projects,
            "date" => date("d-m-y"),
        ]);

        $budget = $request->budget;
        $spent = 0.00;
     //save prepending donations
        foreach ($projects as $row) {

            $remain = $row->budget - $row->raised;


            $to_pay = $budget - $remain;
            if($remain >  $budget){
                $amount = $budget;
            }else{
                $amount = $remain;
            }
            Donation::create(
                [
                    "project_id" => $row->id,
                    "user_id" => auth()->user()->id,
                    "status" => "prepending",
                    "amount" => $amount,
                    "image" => "",
                    "description" => "Bulk transfer via bank instructions"
                ]
            );

            $spent+= $amount;
            $budget = $to_pay;
        }

        //clear session
    session()->forget("projects");
       return $pdf->stream();
    }

    public function storePaymentProof(Request $request){
        $request->validate([
            "file" => "required|image|mimes:jpeg,png,jpg|max:2048"
        ]);
        try {
            if($request->file){
                $image = SystemFileManager::InternalUploader($request->file, "donations");
            }
            Donation::where(["user_id" => auth()->user()->id, "status" => "prepending"])->update([
                "image" => $image,
                "status" => "pending",
                "description" => $request->description,
            ]);
            return redirect()->back()->with(["success" => "Payment updated!"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }
}
