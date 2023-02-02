<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request){
        $request->validate([
            "name" => "required"
        ]);

        try {
            Tag::create([
                "name"=> $request->name,
                "slug" => $request->slug
            ]);
            return redirect()->back()->with(["success" => "Tag created successful"]);
        } catch (Exception $th) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function update(Request $request){
        $request->validate([
            "name" => "required",
            "id" => "required"
        ]);

        try {
            Tag::where("id", $request->id)->update([
                "name"=> $request->name,
                "slug" => $request->slug
            ]);
            return redirect()->back()->with(["success" => "Tag updated successful"]);
        } catch (Exception $th) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function delete($id){
        try {
            Tag::where("id",$id)->delete();
            return redirect()->back()->with(["success" => "Tag deleted"]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }
}
