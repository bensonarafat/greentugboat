<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Classes\SystemFileManager;
use Exception;

class AccountController extends Controller
{
    public function continueStepOne(Request $request){
        $request->validate([
            "gender" => "required",
            "dob" => "required",
            "mobile" => "required",
            "photo" => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048'
        ]);

        if($request->photo){
            $photo = SystemFileManager::InternalUploader($request->photo, "photo");
        }else{
            if($request->photospan){
                $photo = $request->photospan;
            }else{
                $photo = "updates/photo/default.svg";
            }
        }

        session()->put("step", "two");
        session()->put("gender", $request->gender);
        session()->put("dob", $request->dob);
        session()->put("mobile", $request->mobile);
        session()->put("photo", $photo);

        return redirect()->back();

    }

    public function continueStepTwo(Request $request){
        $request->validate([
            "address" => "required",
            "city" => "required",
            "nin" => "required|unique:users|max:11",
        ]);

        $is_sponsor = auth()->user()->is_sponser;
        $is_volunteer = auth()->user()->is_volunteer;
        $is_vendor = auth()->user()->is_vendor;
        if($is_vendor){
            $step = "company";
        }else if($is_sponsor ){
            $step = "complete";
        }else if($is_volunteer) {
            $step = "complete";
        }
        session()->put("step", $step);
        session()->put("address", $request->address);
        session()->put("city", $request->city);
        session()->put("nin", $request->nin);

        return redirect()->back();
    }

    public function continueStepCompany(Request $request){
        $request->validate([
            "company_name" => "required",
            "company_rc" => "required",
            "position" => "required",
            "company_address" => "required",
        ]);

        session()->put("step", "bank-step");
        session()->put("company_name", $request->company_name);
        session()->put("company_rc", $request->company_rc);
        session()->put("position", $request->position);
        session()->put("company_address", $request->company_address);
        return redirect()->back();
    }

    public function continueBankStep(Request $request){
        $request->validate([
            "bank" => "required",
            "account_name" => "required",
            "account_number" => "required",
            "bvn" => "required|unique:users|max:11",
        ]);

        try {
            $gender = session()->get("gender");
            $dob = session()->get("dob");
            $mobile = session()->get("mobile");
            $photo = session()->get("photo");
            $address = session()->get("address");
            $city = session()->get("city");
            $nin = session()->get("nin");

            $company_name = session()->get("company_name") ?? null;
            $company_rc = session()->get("company_rc") ?? null;
            $position = session()->get("position") ?? null;
            $company_address = session()->get("company_address") ?? null;


            User::where("id", Auth::user()->id)->update(
                [
                    "gender" => $gender,
                    "dob" => $dob,
                    "mobile" => $mobile,
                    "photo" => $photo,
                    "address" => $address,
                    "city" => $city,
                    "nin" => $nin,
                    "company_name" => $company_name,
                    "company_rc" => $company_rc,
                    "position" => $position,
                    "company_address" => $company_address,
                    "bank" => $request->bank,
                    "account_name" => $request->account_name,
                    "account_number" => $request->account_number,
                    "bvn" => $request->bvn,
                    "is_account_completed" => 1,
                ]
            );

            if(config("app.url") == session()->get("back_url")){
                return redirect()->route("account")->with([
                    "success" => "Account successfully updated"
                ]);
            }else{
                redirect()->to(session()->get("back_url"))->send();
            }

        } catch (Exception $e) {

            return redirect()->back()->with([
                "error" => "An error occured. Please try again later."
            ]);
        }
    }

    public function continueCompleteStep(Request $request){
        try {

            $gender = session()->get("gender");
            $dob = session()->get("dob");
            $mobile = session()->get("mobile");
            $photo = session()->get("photo");
            $address = session()->get("address");
            $city = session()->get("city");
            $nin = session()->get("nin");

            $company_name = session()->get("company_name") ?? null;
            $company_rc = session()->get("company_rc") ?? null;
            $position = session()->get("position") ?? null;
            $company_address = session()->get("company_address") ?? null;

            User::where("id", Auth::user()->id)->update(
                [
                    "gender" => $gender,
                    "dob" => $dob,
                    "mobile" => $mobile,
                    "photo" => $photo,
                    "address" => $address,
                    "city" => $city,
                    "nin" => $nin,
                    "company_name" => $company_name,
                    "company_rc" => $company_rc,
                    "position" => $position,
                    "company_address" => $company_address,
                    "is_account_completed" => 1,
                ]
            );

            if(config("app.url") == session()->get("back_url")){
                return redirect()->route("account")->with([
                    "success" => "Account successfully updated"
                ]);
            }else{
                redirect()->to(session()->get("back_url"))->send();
            }
        } catch (Exception $e) {
            return redirect()->back()->with([
                "error" => "An error occured. Please try again later."
            ]);
        }
    }



    public function backRegistration($step){
        try {
            session()->put("step", $step);
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                "error" => "An error occured. Please try again later."
            ]);
        }
    }

    public function updateCompany(Request $request){
        try {

            User::where("id", auth()->user()->id)->update(
                [
                    "company_name" => $request->company_name,
                    "company_address" => $request->company_address,
                    "company_rc" => $request->company_rc,
                    "position" => $request->position,
                ]
            );
            return redirect()->back()->with([
                "success" => "Company Updated successful"
            ]);
        } catch (\Exception $th) {
            return redirect()->back()->with([
                "error" => "An error occured. Please try again later."
            ]);
        }
    }

    public function backRegisterStore(){
        session()->forget("step");
        return redirect()->back();
    }
}
