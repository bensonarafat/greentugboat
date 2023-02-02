<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "type" => "required",
        ]);

        try {

            $perms = json_encode($request->perm, true);
            Role::create([
                "name" => $request->name,
                "type" => $request->type,
                "perms" => $perms,
            ]);

            return redirect()->back()->with(["success" => "Role created successful"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function update(Request $request){
        $request->validate([
            "name" => "required",
            "type" => "required",
        ]);
        try {

            $perms = json_encode($request->perm, true);

            Role::where("id", $request->id)->update(
                [
                    "name" => $request->name,
                    "type" => $request->type,
                    "perms" => $perms
                ]
            );
            return redirect()->back()->with(["success" => "Role updated successful"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }
    public function delete($id){
        try {
            Role::where("id", $id)->delete();
            return redirect()->back()->with(["success" => "Role deleted successful"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }
}
