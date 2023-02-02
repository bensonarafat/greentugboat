<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "slug" => "required",
            "type" => "required",
        ]);
        try {
            if($request->parentid == ""){
                $parentid = null;
            }else{
                $parentid = $request->parentid;
            }
            Category::create([
                "name" => $request->name,
                "slug" => $request->slug,
                "type" => $request->type,
                "parentid" => $parentid,
                "description" => $request->description,
            ]);
            return redirect()->back()->with(["success" => "Category created successful"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function update(Request $request){
        $request->validate([
            "name" => "required",
            "slug" => "required",
            "type" => "required",
        ]);
        try{
            Category::where("id", $request->id)->update([
                "name" => $request->name,
                "slug" => $request->slug,
                "type" => $request->type,
                "parentid" => $request->parentid,
                "description" => $request->description,
            ]);
            return redirect()->back()->with(["success" => "Category updated successful"]);

        }catch(Exception $e){
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function delete($id){
        try {
            Category::where("id", $id)->delete();
            return redirect()->back()->with(["success" => "Category deleted successful"]);
        } catch (Exception $th) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }
}
