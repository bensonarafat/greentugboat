<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TemplateController;
use App\Http\Middleware\AccountCompleted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get("/about", [PagesController::class, "about"])->name("about");
Route::get("/faq", [PagesController::class, "faq"])->name("faq");
Route::get("/projects", [PagesController::class, "projects"])->name("projects");
Route::get("/discussions", [PagesController::class, "discussions"])->name("discussions");
Route::get("/discussion/{id}/{slug}", [PagesController::class, "discussion"]);
Route::get("/privacy-policy", [PagesController::class, "privacy"])->name("privacy");
Route::get("/terms-of-service", [PagesController::class, "terms"])->name("terms");
Route::get("/users", [PagesController::class, "users"]);
Route::get("/user-details/{username}", [PagesController::class, "userDetails"])->name("user.details");
Route::get("/search", [PagesController::class, "search"])->name("search");

Route::post("/post-comment", [CommentController::class, "postComment"])->name("post.comment");

Route::prefix('action')->group(function () {
    Route::get("/sponsor", [PagesController::class, "sponsor"])->name("sponsor");
    Route::get("/promote", [PagesController::class, "promote"])->name("promote");
    Route::get("/events", [PagesController::class, "events"])->name("events");
    Route::get("/event/{id}/{slug}", [PagesController::class, "event"]);
});

Route::get("/contact", [PagesController::class, "contact"])->name("contact");
Route::get("/project/{id}/{slug}", [PagesController::class, "project"])->name("project");

Route::group(["middleware" => ["auth", "account.completed"]], function(){
    Route::get("/continue-registration", [PagesController::class, "continueRegistration"])->name("continue.registration");
    Route::post("/continue-step-one",[AccountController::class, "continueStepOne"])->name("continue.step.one");
    Route::post("/continue-step-two",[AccountController::class, "continueStepTwo"])->name("continue.step.two");
    Route::post("/continue-step-company",[AccountController::class, "continueStepCompany"])->name("continue.step.company");
    Route::post("/continue-bank-step",[AccountController::class, "continueBankStep"])->name("continue.bank.step");
    Route::post("/continue-complete-step",[AccountController::class, "continueCompleteStep"])->name("continue.complete.step");

    Route::get("/back-registration/{one}", [AccountController::class, "backRegistration"])->name("back.registration");

});

Route::group(["middleware" => "auth"], function(){
    Route::get("/donate/{id}", [PagesController::class, "donate"])->name("donate");
    Route::get("/bid/{id}", [PagesController::class, "vendorBid"])->name("vendor.bid");
    Route::get("/project-application/{id}/{type}", [ProjectController::class, "projectApplication"])->name("project.application");
    Route::post("/donation-payment", [ProjectController::class, "donationPayment"])->name("donation.payment");

    Route::post("/update-donation-status", [ProjectController::class, "updateDonationStatus"])->name("update.donation.status");
    Route::post("/update-project-application-status", [ProjectController::class, "updateProjectApplicationStatus"])->name("update.project.application.status");

});


Route::group(["prefix" => "account", "middleware" => ["account.not.completed", "auth"]], function(){
    Route::get("/", [PagesController::class, "account"])->name("account");
    Route::get("/donations", [PagesController::class, "donations"])->name("donations");
    Route::get("/update-role-profile/{type}", [PeopleController::class, "updateRoleProfile"]);

    Route::group(["prefix" => "people"], function(){
        Route::get("/", [PagesController::class, "people"])->name("people");
        Route::get("/profile", [PagesController::class, "profile"])->name("profile");
        Route::post("/update-profile", [PeopleController::class, "updateProfile"])->name("update.profile");
        Route::get("/change-password", [PagesController::class, "changePassword"])->name("change.password");
        Route::post("/update-password", [PeopleController::class, "updatePassword"])->name("update.password");
        Route::get("/add", [PagesController::class, "addPeople"])->name("add.people");
        Route::get("/view/{id}/{username}/", [PagesController::class, "viewUser"])->name("view.user");
        Route::post("/store", [PeopleController::class, "store"])->name("store.people");
        Route::post("/update-people-status", [PeopleController::class, "updatePeopleStatus"])->name("update.people.status");
    });

    Route::group(["prefix" => "roles"], function(){
        Route::get("/", [PagesController::class, "roles"])->name("roles");
        Route::get("/edit/{id}", [PagesController::class, "editRole"])->name("role");
        Route::post("/update", [RoleController::class, "update"])->name("role.update");
        Route::get("/create", [PagesController::class, "createRole"])->name("role.create");
        Route::post("/store", [RoleController::class, "store"])->name("role.store");
        Route::get("/delete/{id}", [RoleController::class, "delete"])->name("delete.role");
    });

    Route::group(["prefix" => "categories"], function(){
        Route::get("/", [PagesController::class, "categories"])->name("categories");
        Route::get("/edit/{id}", [PagesController::class, "editCategoryModal"])->name("category");
        Route::post("/update", [CategoryController::class, "update"])->name("category.update");
        Route::post("/store", [CategoryController::class, "store"])->name("category.store");
        Route::get("/delete/{id}", [CategoryController::class, "delete"])->name("delete.category");
    });

    Route::group(["prefix" => "posts"], function(){
        Route::get("/new", [PagesController::class, "newPost"])->name("new.post");
        Route::get("/manage", [PagesController::class, "managePost"])->name("manage.post");
        Route::post("/store", [PostController::class, "store"])->name("store.post");
        Route::post("/update", [PostController::class, "update"])->name("update.post");
        Route::get("edit/{id}", [PagesController::class, "editPost"])->name("edit.post");
        Route::get("/delete/{id}",[PostController::class, "delete"])->name("delete.post");

        Route::get("/pin/{id}",[PostController::class, "pin"])->name("pin.post");
        Route::get("/unpin/{id}",[PostController::class, "unpin"])->name("unpin.post");


        Route::group(["prefix" => "tags"], function(){
            Route::get("/", [PagesController::class, "tags"])->name("tags");
            Route::get("/edit/{id}", [PagesController::class, "editTagModal"])->name("tag");
            Route::post("/update", [TagController::class, "update"])->name("tag.update");
            Route::post("/store", [TagController::class, "store"])->name("tag.store");
            Route::get("/delete/{id}", [TagController::class, "delete"])->name("delete.tag");
        });
    });


    Route::group(["prefix" => "events"], function(){
        Route::get("/new", [PagesController::class, "newEvent"])->name("new.event");
        Route::get("/manage", [PagesController::class, "manageEvent"])->name("manage.event");
        Route::post("/store", [EventController::class, "store"])->name("store.event");
        Route::post("/update", [EventController::class, "update"])->name("update.event");
        Route::get("edit/{id}", [PagesController::class, "editEvent"])->name("edit.event");
        Route::get("/delete/{id}",[EventController::class, "delete"])->name("delete.event");

    });


    Route::group(["prefix" => "projects"], function(){
        Route::get("/", [PagesController::class, "manageProjects"])->name("manage.projects");
        Route::get("/add", [PagesController::class, "addProject"])->name("add.project");
        Route::get("/edit/{id}", [PagesController::class, "editProject"])->name("edit.project");
        Route::get("/view/{id}", [PagesController::class, "viewProject"])->name("view.project");
        Route::post("/update", [ProjectController::class, "update"])->name("project.update");
        Route::post("/store", [ProjectController::class, "store"])->name("project.store");
        Route::post("/update-project-status", [ProjectController::class, "updateProjectStatus"])->name("update.project.status");
        Route::post("/update-supervisor", [ProjectController::class, "updateSupervisor"])->name("update.supervisor");
        Route::get("/remove-supervisor/{id}", [ProjectController::class, "removeSupervisor"])->name("remove.supervisor");
        Route::post("/update-raised-amount", [ProjectController::class, "updateRaisedAmount"])->name("update.raised.amount");


        Route::group(["prefix" => "categories"], function(){
            Route::get("/", [PagesController::class, "projectCategories"])->name("project.categories");
            Route::get("/edit/{id}", [PagesController::class, "editProjectCategoryModal"])->name("project.category");
            Route::post("/update", [CategoryController::class, "update"])->name("project.category.update");
            Route::post("/store", [CategoryController::class, "store"])->name("project.category.store");
            Route::get("/delete/{id}", [CategoryController::class, "delete"])->name("project.delete.category");
        });
    });

    Route::group(["prefix" => "bids"], function(){
        Route::get("/", [PagesController::class, "managebids"])->name("bids");
        Route::post("/apply", [ProjectController::class, "applybidproject"])->name("store.bid.apply");
        Route::get("/revoke-project-application/{id}", [ProjectController::class, "revokeProjectApplication"])->name("revoke.project.application");
    });

    Route::group(["prefix" => "donate"], function() {
        Route::get("/", [PagesController::class, "donateNow"])->name("donate.now");
        Route::post("/set-donate-handler", [DonationsController::class, "setDonateHandler"])->name("set.donate.handler");
        Route::post("/sponsor-pdf", [DonationsController::class, "sponsorPdf"])->name("sponsor.pdf");
        Route::get("/submit-payment-proof", [PagesController::class, "submitPaymentProof"])->name("submit.payment.proof");
        Route::post("/store-payment-proof", [DonationsController::class, "storePaymentProof"])->name("store.payment.proof");

    });

    Route::group(["prefix" => "comments"], function(){
        Route::get("/", [PagesController::class, "manageComments"])->name("comments");
        Route::get("/delete/{id}", [CommentController::class, "delete"])->name("delete.comment");
        Route::get("/approve-comment-status/{id}", [CommentController::class, "approveCommentStatus"])->name("approve.comment.status");
        Route::get("/unapprove-comment-status/{id}", [CommentController::class, "unapproveCommentStatus"])->name("unapprove.comment.status");
    });

    Route::group(["prefix" => "pages"], function(){
        Route::group(["prefix" => "home"], function(){
            Route::get("/", [PagesController::class, "pagesHome"])->name("pages.home");
            Route::get("/banner", [PagesController::class, "pagesHomeBanner"])->name("pages.home.banner");

            Route::get("/game-plan", [PagesController::class, "pagesGamePlan"])->name("pages.home.game.plan");
            Route::get("/game-plan/edit/{id}", [PagesController::class, "editGamePlanModal"]);

            Route::get("/support-partner", [PagesController::class, "pagesSupportPartner"])->name("pages.home.support.partner");
            Route::get("/support-partner/edit/{id}", [PagesController::class, "editSupportPartnerModal"]);


            Route::get("/join-us", [PagesController::class, "pagesHomeJoinUs"])->name("pages.home.join.us");
            Route::get("/about-foundation", [PagesController::class, "pagesHomeAboutFoundation"])->name("pages.home.about.foundation");

            Route::get("/need-your-help", [PagesController::class, "pagesHomeNeedYourHelp"])->name("pages.home.need.your.help");
            Route::get("/need-your-help/edit/{id}", [PagesController::class, "editNeedYourHelpModal"]);

            Route::get("/testimonial", [PagesController::class, "pagesHomeTestimonial"])->name("pages.home.testimonial");
            Route::get("/testimonial/edit/{id}", [PagesController::class, "editTestimonialModal"]);

            Route::post("/update-banner-text", [TemplateController::class, "updateBannerText"])->name("update.banner.text");
            Route::post("/update-banner-image", [TemplateController::class, "updateBannerImage"])->name("update.banner.image");

            Route::post("/store-game-plan", [TemplateController::class, "storeGamePlan"])->name("game.plan.store");
            Route::post("/update-game-plan", [TemplateController::class, "updateGamePlan"])->name("game.plan.update");
            Route::get("/delete-game-plan/{id}", [TemplateController::class, "deleteGamePlan"])->name("delete.game.plan");

            Route::post("/store-support-partner", [TemplateController::class, "storeSupportPartner"])->name("support.partner.store");
            Route::post("/update-support-partner", [TemplateController::class, "updateSupportPartner"])->name("support.partner.update");
            Route::get("/delete-support-partner/{id}", [TemplateController::class, "deleteSupportPartner"])->name("delete.support.partner");


            Route::post("/update-join-us", [TemplateController::class, "updateJoinUs"])->name("join.us.update");
            Route::post("/update-about-foundation", [TemplateController::class, "updateAboutFoundation"])->name("about.foundation.update");


            Route::post("/store-need-your-help", [TemplateController::class, "storeNeedYourHelp"])->name("need.your.help.store");
            Route::get("/delete-need-your-help/{id}", [TemplateController::class, "deleteNeedYourHelp"])->name("delete.need.your.help");
            Route::post("/update-need-your-help", [TemplateController::class, "updateNeedYourHelp"])->name("need.your.help.update");

            Route::post("/store-testimonial", [TemplateController::class, "storeTestimonial"])->name("testimonial.store");
            Route::get("/delete-testimonial/{id}", [TemplateController::class, "deleteTestimonial"])->name("delete.testimonial");
            Route::post("/update-testimonial", [TemplateController::class, "updateTestimonial"])->name("testimonial.update");

        });

        Route::group(["prefix" => "about"], function(){
            Route::get("/", [PagesController::class, "pageAbout"])->name("pages.about");
            Route::get("/about-foundation", [PagesController::class, "aboutFoundation"])->name("pages.about.foundation");
            Route::get("/amis-objectives", [PagesController::class, "aimsObjective"])->name("pages.about.aims.objective");
            Route::get("/vision", [PagesController::class, "vision"])->name("pages.about.vision");
            Route::get("/mission", [PagesController::class, "mission"])->name("pages.about.mission");
            Route::get("/core-value", [PagesController::class, "coreValue"])->name("pages.about.core.value");
            Route::get("/stratergy-method", [PagesController::class, "stratergyMethod"])->name("pages.about.stratergy.method");
            Route::get("/volunteers", [PagesController::class, "aboutVolunteers"])->name("pages.about.volunteers");
            Route::get("/volunteers/edit/{id}", [PagesController::class, "editVolunteersModal"]);


            Route::post("/update-about-foundation", [TemplateController::class, "updateAboutPageFoundation"])->name("update.about.foundation");
            Route::post("/update-aims-objectives", [TemplateController::class, "updateAimsObjective"])->name("update.about.aims.objective");
            Route::post("/update-vision", [TemplateController::class, "updateVision"])->name("update.about.vision");
            Route::post("/update-mission", [TemplateController::class, "updateMission"])->name("update.about.mission");
            Route::post("/update-core-values", [TemplateController::class, "updateCoreValues"])->name("update.about.core.values");
            Route::post("/update-stragergy-methods", [TemplateController::class, "updateStragergyMethod"])->name("update.about.stragergy.method");

            Route::post("/store-volunteers", [TemplateController::class, "storeAboutVolunteers"])->name("store.about.volunteers");
            Route::post("/update-volunteers", [TemplateController::class, "updateAboutVolunteers"])->name("update.about.volunteers");


            Route::get("/delete-volunteers/{id}", [TemplateController::class, "deleteVolunteers"])->name("delete.volunteers");

        });

        Route::group(["prefix" => "faq"], function(){
            Route::get("/", [PagesController::class, "pageFaq"])->name("pages.faq");
            Route::post("/store", [TemplateController::class, "storeFaq"])->name("store.faq");
            Route::get("/edit/{id}", [PagesController::class, "editFaqModal"]);
            Route::get("/delete/{id}", [TemplateController::class, "deleteFaq"])->name("delete.page.faq");
            Route::post("/update", [TemplateController::class, "updateFaq"])->name("update.faq");
        });

        Route::group(["prefix" => "contact"], function(){
            Route::get("/", [PagesController::class, "pageContact"])->name("pages.contact");
            Route::post("/store", [TemplateController::class, "storeContact"])->name("store.contact");
            Route::get("/edit/{id}", [PagesController::class, "editContactModal"]);
            Route::get("/delete/{id}", [TemplateController::class, "deleteContact"])->name("delete.page.contact");
            Route::post("/update", [TemplateController::class, "updateContact"])->name("update.contact");
        });

        Route::group(["prefix" => "terms"], function(){
            Route::get("/", [PagesController::class, "pageTerms"])->name("pages.terms");
            Route::post("/update", [TemplateController::class, "updateTerms"])->name("update.terms");
        });

        Route::group(["prefix" => "privacy"], function(){
            Route::get("/", [PagesController::class, "pagePrivacy"])->name("pages.privacy");
            Route::post("/update", [TemplateController::class, "updatePrivacy"])->name("update.privacy");
        });

    });

    Route::group(["prefix" => "company"], function() {
        Route::get("/", [PagesController::class, "company"])->name("company");
        Route::post("/update-company", [AccountController::class, "updateCompany"])->name("update.company");
    });

    Route::group(["prefix" => "portfolio"], function() {
        Route::get("/", [PagesController::class, "portfolio"])->name("portfolio");
    });
});
