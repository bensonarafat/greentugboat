<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function postComment(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "message" => "required",
            "id" => "required",
        ]);

        if(Auth::check()){
            $author = auth()->user()->id;
        }else{
            $author = null;
        }
        if($request->parentid){
            $parentid = $request->parentid;
        }else{
            $parentid = null;
        }
        try {
            Comment::create([
                "name" => $request->name,
                "email" => $request->email,
                "message" => $request->message,
                "postid" => $request->id,
                "author" => $author,
                "parentid" => $parentid,
            ]);
            toastr()->success("Comment has been sent successfully");
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error('Ooops! Something went wrong');
            return redirect()->back();
        }
    }

    public function delete($id){
        try {
            Comment::where("id", $id)->delete();
            toastr()->success("Comment deleted successful");
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error('Ooops! Something went wrong');
            return redirect()->back();
        }
    }


    public function approveCommentStatus($id){
        try {
            Comment::where("id", $id)->update(["status" => "approve"]);
            toastr()->success("Comment updated successful");
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error('Ooops! Something went wrong');
            return redirect()->back();
        }
    }

    public function unapproveCommentStatus($id){
        try {
            Comment::where("id", $id)->update(["status" => "unapprove"]);
            toastr()->success("Comment updated successful");
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error('Ooops! Something went wrong');
            return redirect()->back();
        }
    }
}
