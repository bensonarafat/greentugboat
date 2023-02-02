<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Classes\SystemFileManager;

class EventController extends Controller
{

    public function store(Request $request){
        $request->validate(
            [
                "title" => "required",
                "featureimage" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048"
            ]);

        $replace = array(" ", "'", ".", ",","/",'"', "?","[","]","(",")");
        $slug = strtolower(trim(str_replace($replace,"-",$request->title)));

        $content_filtered = substr(strip_tags($request->editorinstance), 0, 200);

        if($request->featureimage){
            $image = SystemFileManager::InternalUploader($request->featureimage, "events");
        }else{
            $image = "uploads/posts/default.jpg";
        }

        try {
            $post = Event::create([
                "title" => $request->title,
                "slug" => $slug,
                "content" => $request->editorinstance,
                "content_filtered" => $content_filtered,
                "author" => auth()->user()->id,
                "featureimage" => $image,
                "venue" => $request->venue,
                "startdate" => $request->startdate,
                "enddate" => $request->enddate,
                "status" => $request->status,
            ]);


            return redirect()->back()->with(["success" => "Event created successful"]);

        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function update(Request $request){
        $request->validate(
            [
                "title" => "required",
                "featureimage" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
                "id" => "required",
            ]);
            $replace = array(" ", "'", ".", ",","/",'"', "?","[","]","(",")");

            $content_filtered = substr(strip_tags($request->editorinstance), 0, 200);

            if($request->featureimage){
                $image = SystemFileManager::InternalUploader($request->featureimage, "events");
            }else{
                if($request->featureimage == "" || $request->featureimage == null){
                    $image = "uploads/posts/default.jpg";
                }else{
                    $image = $request->featureimagespan;
                }
            }



            try {
                Event::where("id", $request->id)->update([
                    "title" => $request->title,
                    "content" => $request->editorinstance,
                    "content_filtered" => $content_filtered,
                    "author" => auth()->user()->id,
                    "featureimage" => $image,
                    "venue" => $request->venue,
                    "startdate" => $request->startdate,
                    "enddate" => $request->enddate,
                    "status" => $request->status,
                ]);


                return redirect()->back()->with(["success" => "Event updated successful"]);

            } catch (Exception $e) {

                return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
            }
    }


    public function delete($id){
        try {
            Event::where("id", $id)->delete();
            return redirect()->back()->with(["success" => "Post deleted successful"]);
        } catch (\Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }
}
