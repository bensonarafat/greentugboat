<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Pages;
use Illuminate\Http\Request;
use App\Http\Classes\SystemFileManager;

class TemplateController extends Controller
{


    // update
    public function updateBannerText(Request $request){
        try {
            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "text1"
            ])->update([
                "content" => $request->text1
            ]);
            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "text2"
            ])->update([
                "content" => $request->text2
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "text3"
            ])->update([
                "content" => $request->text3
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "text4"
            ])->update([
                "content" => $request->text4
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "text5"
            ])->update([
                "content" => $request->text5
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateBannerImage(Request $request){
        $request->validate([
            "image1" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048",
            "thumbnail1" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048",
            "thumbnail2" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048",
            "thumbnail3" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048",
            "thumbnail4" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048",
            "thumbnail5" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048",
            "thumbnail6" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048",
            "thumbnail7" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048"
        ]);
        try {

            if($request->image1){
                $image1 = SystemFileManager::InternalUploader($request->image1, "pages");
            }else{
                $image1 = $request->image1span;
            }

            if($request->thumbnail1){
                $thumbnail1 = SystemFileManager::InternalUploader($request->thumbnail1, "pages");
            }else{
                $thumbnail1 = $request->thumbnail1span;
            }
            if($request->thumbnail2){
                $thumbnail2 = SystemFileManager::InternalUploader($request->thumbnail2, "pages");
            }else{
                $thumbnail2 = $request->thumbnail2span;
            }

            if($request->thumbnail3){
                $thumbnail3 = SystemFileManager::InternalUploader($request->thumbnail3, "pages");
            }else{
                $thumbnail3 = $request->thumbnail3span;
            }

            if($request->thumbnail4){
                $thumbnail4 = SystemFileManager::InternalUploader($request->thumbnail4, "pages");
            }else{
                $thumbnail4 = $request->thumbnail4span;
            }

            if($request->thumbnail5){
                $thumbnail5 = SystemFileManager::InternalUploader($request->thumbnail5, "pages");
            }else{
                $thumbnail5 = $request->thumbnail5span;
            }

            if($request->thumbnail6){
                $thumbnail6 = SystemFileManager::InternalUploader($request->thumbnail6, "pages");
            }else{
                $thumbnail6 = $request->thumbnail6span;
            }

            if($request->thumbnail7){
                $thumbnail7 = SystemFileManager::InternalUploader($request->thumbnail7, "pages");
            }else{
                $thumbnail7 = $request->thumbnail7span;
            }

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "image1"
            ])->update([
                "image" => $image1
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "thumbnail1"
            ])->update([
                "image" => $thumbnail1
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "thumbnail2"
            ])->update([
                "image" => $thumbnail2
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "thumbnail3"
            ])->update([
                "image" => $thumbnail3
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "thumbnail4"
            ])->update([
                "image" => $thumbnail4
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "thumbnail5"
            ])->update([
                "image" => $thumbnail5
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "thumbnail6"
            ])->update([
                "image" => $thumbnail6
            ]);

            Pages::where([
                "page" => "home",
                "section" => "banner",
                "type" => "thumbnail7"
            ])->update([
                "image" => $thumbnail7
            ]);

            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }


    public function storeGamePlan(Request $request){
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:4048",
            "order" => "required",
        ]);
        try {
            $image = SystemFileManager::InternalUploader($request->image, "pages");
            Pages::create([
                "page" => "home",
                "section" => "game-plan",
                "type" => "slide",
                "title" => $request->title,
                "content" => $request->description,
                "icon" => $image,
                "image" => $request->order,
                "address" => $request->url,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateGamePlan(Request $request){
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048",
            "order" => "required",
        ]);
        try {
            if($request->image){
                $image = SystemFileManager::InternalUploader($request->image, "pages");
            }else{
                $image = $request->imagespan;
            }
            Pages::where("id", $request->id)->update([
                "page" => "home",
                "section" => "game-plan",
                "type" => "slide",
                "title" => $request->title,
                "content" => $request->description,
                "icon" => $image,
                "address" => $request->url,
                "image" => $request->order,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function deleteGamePlan($id){
        try {
            Pages::where([
                "id" => $id
            ])->delete();
            return redirect()->back()->with(["success" => "Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function storeSupportPartner(Request $request){
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:4048"
        ]);
        try {
            $image = SystemFileManager::InternalUploader($request->image, "pages");
            Pages::create([
                "page" => "home",
                "section" => "support-partner",
                "type" => "slide",
                "title" => $request->title,
                "content" => $request->description,
                "icon" => $image,
                "address" => $request->url,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateSupportPartner(Request $request){
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048"
        ]);
        try {
            if($request->image){
                $image = SystemFileManager::InternalUploader($request->image, "pages");
            }else{
                $image = $request->imagespan;
            }
            Pages::where("id", $request->id)->update([
                "page" => "home",
                "section" => "support-partner",
                "type" => "slide",
                "title" => $request->title,
                "content" => $request->description,
                "icon" => $image,
                "address" => $request->url,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function deleteSupportPartner($id){
        try {
            Pages::where([
                "id" => $id
            ])->delete();
            return redirect()->back()->with(["success" => "Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateJoinUs(Request $request){
        try {

            Pages::where([
                "page" => "home",
                "section" => "join-us",
                "type" => "text1"
            ])->update([
                "content" => $request->text1
            ]);

            Pages::where([
                "page" => "home",
                "section" => "join-us",
                "type" => "text2"
            ])->update([
                "content" => $request->text2
            ]);
            Pages::where([
                "page" => "home",
                "section" => "join-us",
                "type" => "text3"
            ])->update([
                "content" => $request->text3
            ]);

            if($request->image){
                $image = SystemFileManager::InternalUploader($request->image, "pages");
            }else{
                $image = $request->imagespan;
            }

            Pages::where([
                "page" => "home",
                "section" => "join-us",
                "type" => "image"
            ])->update([
                "image" => $image
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function updateAboutFoundation(Request $request){
        try {

            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "text1"
            ])->update([
                "content" => $request->text1
            ]);

            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "text2"
            ])->update([
                "content" => $request->text2
            ]);
            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "text3"
            ])->update([
                "content" => $request->text3
            ]);

            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "text4"
            ])->update([
                "content" => $request->text4
            ]);
            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "text5"
            ])->update([
                "content" => $request->text5
            ]);
            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "text6"
            ])->update([
                "content" => $request->text6
            ]);

            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "url1"
            ])->update([
                "content" => $request->url1
            ]);

            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "url2"
            ])->update([
                "content" => $request->url2
            ]);

            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "url3"
            ])->update([
                "content" => $request->url3
            ]);
            if($request->image){
                $image = SystemFileManager::InternalUploader($request->image, "pages");
            }else{
                $image = $request->imagespan;
            }

            Pages::where([
                "page" => "home",
                "section" => "about-foundation",
                "type" => "image"
            ])->update([
                "image" => $image
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }


    public function storeNeedYourHelp(Request $request){
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:4048"
        ]);
        try {
            $image = SystemFileManager::InternalUploader($request->image, "pages");
            Pages::create([
                "page" => "home",
                "section" => "need-your-help",
                "type" => "slide",
                "title" => $request->title,
                "content" => $request->description,
                "icon" => $image
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateNeedYourHelp(Request $request){
        $request->validate([
            "title" => "required",
            "description" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048"
        ]);
        try {
            if($request->image){
                $image = SystemFileManager::InternalUploader($request->image, "pages");
            }else{
                $image = $request->imagespan;
            }
            Pages::where("id", $request->id)->update([
                "page" => "home",
                "section" => "need-your-help",
                "type" => "slide",
                "title" => $request->title,
                "content" => $request->description,
                "icon" => $image
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }
    public function deleteNeedYourHelp($id){
        try {
            Pages::where([
                "id" => $id
            ])->delete();
            return redirect()->back()->with(["success" => "Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function deleteTestimonial($id){
        try {
            Pages::where([
                "id" => $id
            ])->delete();
            return redirect()->back()->with(["success" => "Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }


    public function storeTestimonial(Request $request){
        $request->validate([
            "title" => "required",
            "name" => "required",
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:4048"
        ]);
        try {
            $image = SystemFileManager::InternalUploader($request->image, "pages");
            Pages::create([
                "page" => "home",
                "section" => "testimonial",
                "type" => "slide",
                "title" => $request->title,
                "name" => $request->name,
                "content" => $request->description,
                "icon" => $image
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateTestimonial(Request $request){
        $request->validate([
            "title" => "required",
            "name" => "required",
            "description" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048"
        ]);
        try {
            if($request->image){
                $image = SystemFileManager::InternalUploader($request->image, "pages");
            }else{
                $image = $request->imagespan;
            }
            Pages::where("id", $request->id)->update([
                "page" => "home",
                "section" => "testimonial",
                "type" => "slide",
                "title" => $request->title,
                "name" => $request->name,
                "content" => $request->description,
                "icon" => $image
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }
    public function updateAboutPageFoundation(Request $request){
        try {

            Pages::where(["section" => "foundation", "page" => "about"])->update([
                "title" => $request->title,
                "content" => $request->content,
            ]);

            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function updateAimsObjective(Request $request){
        try {
            if($request->image1){
                $image1 = SystemFileManager::InternalUploader($request->image1, "pages");
            }else{
                $image1 = $request->image1span;
            }
            if($request->image2){
                $image2 = SystemFileManager::InternalUploader($request->image2, "pages");
            }else{
                $image2 = $request->image2span;
            }
            if($request->image3){
                $image3 = SystemFileManager::InternalUploader($request->image3, "pages");
            }else{
                $image3 = $request->image3span;
            }
            Pages::where(["section" => "aims-objectives", "page" => "about"])->update([
                "content" => $request->content,
                "image" =>  $image1,
                "icon" =>  $image2,
                "email" =>  $image3,
            ]);

            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {

            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function updateVision(Request $request){
        try {
            if($request->image1){
                $image1 = SystemFileManager::InternalUploader($request->image1, "pages");
            }else{
                $image1 = $request->image1span;
            }
            if($request->image2){
                $image2 = SystemFileManager::InternalUploader($request->image2, "pages");
            }else{
                $image2 = $request->image2span;
            }
            if($request->image3){
                $image3 = SystemFileManager::InternalUploader($request->image3, "pages");
            }else{
                $image3 = $request->image3span;
            }
            Pages::where(["section" => "vision", "page" => "about"])->update([
                "content" => $request->content,
                "image" =>  $image1,
                "icon" =>  $image2,
                "email" =>  $image3,
            ]);

            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }


    public function updateMission(Request $request){
        try {
            if($request->image1){
                $image1 = SystemFileManager::InternalUploader($request->image1, "pages");
            }else{
                $image1 = $request->image1span;
            }
            if($request->image2){
                $image2 = SystemFileManager::InternalUploader($request->image2, "pages");
            }else{
                $image2 = $request->image2span;
            }
            if($request->image3){
                $image3 = SystemFileManager::InternalUploader($request->image3, "pages");
            }else{
                $image3 = $request->image3span;
            }
            Pages::where(["section" => "mission", "page" => "about"])->update([
                "content" => $request->content,
                "image" =>  $image1,
                "icon" =>  $image2,
                "email" =>  $image3,
            ]);

            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }


    public function updateCoreValues(Request $request){
        try {
            if($request->image1){
                $image1 = SystemFileManager::InternalUploader($request->image1, "pages");
            }else{
                $image1 = $request->image1span;
            }
            if($request->image2){
                $image2 = SystemFileManager::InternalUploader($request->image2, "pages");
            }else{
                $image2 = $request->image2span;
            }
            if($request->image3){
                $image3 = SystemFileManager::InternalUploader($request->image3, "pages");
            }else{
                $image3 = $request->image3span;
            }
            Pages::where(["section" => "core-value", "page" => "about"])->update([
                "content" => $request->content,
                "image" =>  $image1,
                "icon" =>  $image2,
                "email" =>  $image3,
            ]);

            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }


    public function updateStragergyMethod(Request $request){
        try {
            if($request->image1){
                $image1 = SystemFileManager::InternalUploader($request->image1, "pages");
            }else{
                $image1 = $request->image1span;
            }
            if($request->image2){
                $image2 = SystemFileManager::InternalUploader($request->image2, "pages");
            }else{
                $image2 = $request->image2span;
            }
            if($request->image3){
                $image3 = SystemFileManager::InternalUploader($request->image3, "pages");
            }else{
                $image3 = $request->image3span;
            }
            Pages::where(["section" => "stratergy-methods", "page" => "about"])->update([
                "content" => $request->content,
                "image" =>  $image1,
                "icon" =>  $image2,
                "email" =>  $image3,
            ]);

            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);

        }
    }

    public function storeAboutVolunteers(Request $request){
        $request->validate([
            "name" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:4048"
        ]);
        try {
            $image = SystemFileManager::InternalUploader($request->image, "pages");
            Pages::create([
                "page" => "about",
                "section" => "volunteers",
                "type" => "slide",
                "facebook" => $request->facebook,
                "twitter" => $request->twitter,
                "instagram" => $request->instagram,
                "linkedin" => $request->linkedin,
                "name" => $request->name,
                "icon" => $image
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateAboutVolunteers(Request $request){
        $request->validate([
            "name" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:4048"
        ]);
        try {
            if($request->image){
                $image = SystemFileManager::InternalUploader($request->image, "pages");
            }else{
                $image = $request->imagespan;
            }
            Pages::where("id", $request->id)->update([
                "page" => "about",
                "section" => "volunteers",
                "type" => "slide",
                "facebook" => $request->facebook,
                "twitter" => $request->twitter,
                "instagram" => $request->instagram,
                "linkedin" => $request->linkedin,
                "name" => $request->name,
                "icon" => $image
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function deleteVolunteers($id){
        try {
            Pages::where([
                "id" => $id
            ])->delete();
            return redirect()->back()->with(["success" => "Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function storeContact(Request $request){
        $request->validate([
            "address" => "required",
            "phone" => "required",
            "email" => "required",
            "title" => "required",
        ]);
        try {
            Pages::create([
                "page" => "contact",
                "section" => "contact",
                "type" => "contact",
                "address" => $request->address,
                "phone" => $request->phone,
                "email" => $request->email,
                "title" => $request->title,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateContact(Request $request){
        $request->validate([
            "address" => "required",
            "phone" => "required",
            "email" => "required",
            "title" => "required",
        ]);
        try {
            Pages::where("id", $request->id)->update([
                "page" => "contact",
                "section" => "contact",
                "type" => "contact",
                "address" => $request->address,
                "phone" => $request->phone,
                "email" => $request->email,
                "title" => $request->title,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }


    public function deleteContact($id){
        try {
            Pages::where([
                "id" => $id
            ])->delete();
            return redirect()->back()->with(["success" => "Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }


    public function storeFaq(Request $request){
        $request->validate([
            "title" => "required",
            "content" => "required",
        ]);
        try {
            if($request->sort == ""){
                $sort = "1";
            }else{
                $sort = $request->sort;
            }
            Pages::create([
                "page" => "faq",
                "section" => "faq",
                "type" => "faq",
                "title" => $request->title,
                "icon" => $sort,
                "content" => $request->content,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateFaq(Request $request){
        $request->validate([
            "title" => "required",
            "content" => "required",
        ]);
        try {
            if($request->sort == ""){
                $sort = "1";
            }else{
                $sort = $request->sort;
            }
            Pages::where("id", $request->id)->update([
                "page" => "faq",
                "section" => "faq",
                "type" => "faq",
                "icon" => $sort,
                "title" => $request->title,
                "content" => $request->content,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function deleteFaq($id){
        try {
            Pages::where([
                "id" => $id
            ])->delete();
            return redirect()->back()->with(["success" => "Deleted"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updateTerms(Request $request){
        $request->validate([
            "content" => "required",
        ]);
        try {
            Pages::where([
                "page" => "terms",
                "section" => "terms",
                "type" => "terms",
            ])->update([
                "content" => $request->content,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }

    public function updatePrivacy(Request $request){
        $request->validate([
            "content" => "required",
        ]);
        try {
            Pages::where([
                "page" => "privacy",
                "section" => "privacy",
                "type" => "privacy",
            ])->update([
                "content" => $request->content,
            ]);
            return redirect()->back()->with(["success" => "Updated"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error, try again later"]);
        }
    }
}
