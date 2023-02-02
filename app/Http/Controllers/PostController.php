<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Post;
use App\Models\SocialShare;
use Illuminate\Http\Request;
use App\Http\Classes\AppTwitterApi;
use App\Http\Classes\SystemFileManager;
use App\Models\Tag;

class PostController extends Controller
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
            $image = SystemFileManager::InternalUploader($request->featureimage, "posts");
        }else{
            $image = "uploads/posts/default.jpg";
        }


        if($request->tags){
            $stack = [];
            for ($i=0; $i < count($request->tags); $i++) {

                if(!intval($request->tags[$i])){
                    $tag = Tag::create([
                        "name"=> $request->tags[$i],
                        "slug" => str_replace("", "-", $request->tags[$i])
                    ]);
                    array_push($stack, $tag->id);
                }else{
                    array_push($stack, $request->tags[$i]);
                }
            }
            $tags = json_encode($stack);
        }else{
            $tags = json_encode([null]);
        }

        if($request->categories){
            $categories = json_encode($request->categories);
        }else{
            $categories = json_encode([null]);
        }
        try {
            $post = Post::create([
                "title" => $request->title,
                "slug" => $slug,
                "content" => $request->editorinstance,
                "content_filtered" => $content_filtered,
                "author" => auth()->user()->id,
                "featureimage" => $image,
                "categoryid" => $categories,
                "tags" => $tags,
                "status" => $request->status,
            ]);

            if($request->status == "publish"){
                $lastid = $post->id;
                $link = config("app.url") . '/discussion' . '/' . $lastid . '/' . $slug;
                $body = $request->title .' '. $link;
                $twitterapi = app(AppTwitterApi::class);
                $tweet = $twitterapi->postTweet($body, $image);

                //create SocialShare
                SocialShare::create([
                    "postid"  => $lastid,
                    "socialid" => $tweet->data->id,
                    "link" => $link,
                    "body" => $body,
                    "type" => "twitter",
                ]);
            }
            return redirect()->back()->with(["success" => "Post created successful"]);

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
            $slug = strtolower(trim(str_replace($replace,"-",$request->title)));

            $content_filtered = substr(strip_tags($request->editorinstance), 0, 200);

            if($request->featureimage){
                $image = SystemFileManager::InternalUploader($request->featureimage, "posts");
            }else{
                if($request->featureimagespan == "" || $request->featureimagespan == null){
                    $image = "uploads/posts/default.jpg";
                }else{
                    $image = $request->featureimagespan;
                }
            }


            if($request->tags){
                $stack = [];
                for ($i=0; $i < count($request->tags); $i++) {
                    if(!intval($request->tags[$i])){
                        $tag = Tag::create([
                            "name"=> $request->tags[$i],
                            "slug" => str_replace("", "-", $request->tags[$i])
                        ]);
                        array_push($stack, $tag->id);
                    }else{
                        array_push($stack, $request->tags[$i]);
                    }
                }
                $tags = json_encode($stack);
            }else{
                $tags = json_encode([null]);
            }


            if($request->categories){
                $categories = json_encode($request->categories);
            }else{
                $categories = json_encode([null]);
            }

            try {
                Post::where("id", $request->id)->update([
                    "title" => $request->title,
                    // "slug" => $slug,
                    "content" => $request->editorinstance,
                    "content_filtered" => $content_filtered,
                    "author" => auth()->user()->id,
                    "featureimage" => $image,
                    "categoryid" => $categories,
                    "tags" => $tags,
                    "status" => $request->status,
                ]);


                // $socialShare = SocialShare::where(["type" => "twitter", "postid" => $request->id])->first();
                // $twitterapi = app(AppTwitterApi::class);
                // $twitterapi->deleteTweet($socialShare->socialid);

                // if($request->status == "publish"){
                //     $lastid = $request->id;
                //     $link = config("app.url") . '/discussion' . '/' . $lastid . '/' . $slug;
                //     $body = $request->title .' '. $link;
                //     $twitterapi = app(AppTwitterApi::class);
                //     $tweet = $twitterapi->postTweet($body, $image);

                //     //create SocialShare
                //     SocialShare::create([
                //         "postid"  => $lastid,
                //         "socialid" => $tweet->data->id,
                //         "link" => $link,
                //         "body" => $body,
                //         "type" => "twitter",
                //     ]);
                // }

                return redirect()->back()->with(["success" => "Post updated successful"]);

            } catch (Exception $e) {

                return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
            }
    }

    public function delete($id){
        try {
            Post::where("id", $id)->delete();
            $socialShare = SocialShare::where(["type" => "twitter", "postid" => $id])->first();
            $twitterapi = app(AppTwitterApi::class);
            $twitterapi->deleteTweet($socialShare->socialid);
            return redirect()->back()->with(["success" => "Post deleted successful"]);
        } catch (\Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function pin($id){
        try {
            //unpin all posts 
            Post::where("status", "publish")->update([
                "is_pinned" => 0
            ]);
            Post::where("id", $id)->update([
                "is_pinned" => 1
            ]);
            return redirect()->back()->with(["success" => "Post pinned successful"]);
        } catch (Exception $th) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function unpin($id){
        try {
            Post::where("id", $id)->update([
                "is_pinned" => 0
            ]);
            return redirect()->back()->with(["success" => "Post unpin successful"]);
        } catch (Exception $th) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }
}
