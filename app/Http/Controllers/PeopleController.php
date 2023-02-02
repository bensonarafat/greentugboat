<?php

namespace App\Http\Controllers;

use App\Http\Classes\SystemFileManager;
use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PeopleController extends Controller
{

    public function updatePeopleStatus(Request $request){
        try {
            User::where("id", $request->id)->update(["status" => $request->status]);
            return redirect()->back()->with(["success" => "User status updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function store(Request $request){
        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|unique:users",
            "role" => "required",
            "gender" => "required",
            "mobile" => "required",
        ]);

        try {


            $username = strtolower($request->firstname) . '-' . rand(1000, 9999);
            $role = Role::find($request->role);
            if($role->type == "admin"){
                $is_admin = true;
                $is_vendor = false;
                $is_volunteer = false;
                $is_sponsor = false;
            }
            if($role->type == "team"){
                $is_admin = true;
                $is_vendor = false;
                $is_volunteer = false;
                $is_sponsor = false;
            }
            if($role->type == "user"){
                $is_admin = false;
                $is_vendor = true;
                $is_volunteer = true;
                $is_sponsor = true;
            }
            User::create(
                [
                    "firstname" => $request->firstname,
                    "lastname" => $request->lastname,
                    "email" => $request->email,
                    "role_id" => $request->role,
                    "type" => $role->type,
                    "username" => $username,
                    "gender" => $request->gender,
                    "mobile" => $request->mobile,
                    "is_admin" => $is_admin,
                    "is_vendor" => $is_vendor,
                    "is_volunteer" => $is_volunteer,
                    "is_sponsor" => $is_sponsor,
                ]
            );
            //mail to complete registration

            return redirect()->back()->with(["success" => "User created successful"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateProfile(Request $request){

        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "gender" => "required",
            "dob" => "required",
            "mobile" => "required",
            "address" => "required",
            "city" => "required",
            "type" => "required",
            "bank" => "required",
            "account_name" => "required",
            "account_number" => "required",
            "bvn" => "required",
            "file" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $is_volunteer = false;
            $is_sponsor = false;
            $is_vendor = false;
            if(in_array("volunteer", $request->type)) $is_volunteer = true;
            if(in_array("sponsor", $request->type)) $is_sponsor = true;
            if(in_array("vendor", $request->type)) $is_vendor = true;

            if($request->file){
                $photo = SystemFileManager::InternalUploader($request->file, "photo");
            }else{
                $photo = $request->filespan;
            }
            User::where("id", auth()->user()->id)->update([
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "gender" => $request->gender,
                "dob" => $request->dob,
                "mobile" => $request->mobile,
                "address" => $request->address,
                "city" => $request->city,
                "photo" => $photo,
                "is_volunteer" => $is_volunteer,
                "is_sponsor" => $is_sponsor,
                "is_vendor" => $is_vendor,
                "bank" => $request->bank,
                "account_name" => $request->account_name,
                "account_number" => $request->account_number,
                "bvn" => $request->bvn,
            ]);

            return redirect()->back()->with(["success" => "Profile updated successfully"]);
        } catch (Exception $e) {
            return redirect()->back()->with([
                "error" => "Oops, there was an error, try again later"
            ]);
        }

    }

    public function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        //verify password
        if(Hash::check($request->old_password, Auth::user()->password)){
            try {
                //change password
                DB::table("users")->where("id", Auth::user()->id)->update(["password" =>  Hash::make($request->password)]);
                return redirect()->back()->with("success", "Password changed");
            } catch (Exception $e) {
                return redirect()->back()->with("error", "Oops, there was an error, try again!!");
            }
        }else{
            return redirect()->back()->with("error", "Password do not match");
        }
    }


    public function updateRoleProfile($type){
        if($type == "volunteer"){
            User::where("id", auth()->user()->id)->update([
                "is_volunteer" => 1,
            ]);
        }else if($type == "vendor"){
            User::where("id", auth()->user()->id)->update([
                "is_vendor" => 1,
            ]);
        }else if($type == "sponsor"){
            User::where("id", auth()->user()->id)->update([
                "is_sponsor" => 1,
            ]);
        }
        return redirect()->back()->with(["success" => "Your membership has been updated!"]);
    }
}
