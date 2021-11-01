<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

// if user exit
Route::middleware("auth")->group(function () {
    Route::get("/posts", function () {
        $post = Post::all();
        return response()->json($post);
    });
    // home
    Route::get('/', [PageController::class, "index"])->name("home");

    // post
    Route::get("/user/create", [PageController::class, "createPost"])->name("createPost");
    Route::get('/posts/{id}', [PageController::class, "get_posts"])->name("get_posts");

    Route::get("/edit_post_form/{id}", [PageController::class, "edit_post_form"])->name("edit_post_form")->middleware("premium_user");
    Route::get("/delete_post/{id}", [PostController::class, "delete_post"])->name("delete_post")->middleware("premium_user");
    Route::post("/edit_post/{id}", [PostController::class, "edit_post"])->name("edit_post");
    Route::post("/user/create", [PostController::class, "post"])->name("post");

    // user
    Route::get("/user/userprofile", [PageController::class, "userProfile"])->name("userProfile");
    Route::post("/user/userprofile", [AuthController::class, "post_userProfile"])->name("post_userProfile");
    Route::get("/user/contactus", [PageController::class, "contactUs"])->name("contactUs");
    Route::post("/user/contactus", [ContactUsController::class, "post_contact_us"])->name("post_contact_us");

    // authnication
    Route::get("/logout", [AuthController::class, "logout"])->name("logout");

    Route::middleware("admin")->group(function () {
        // admin
        Route::get("/admin/index", [AdminController::class, "index"])->name("admin.home");
        Route::get("/admin/manage_premium_users", [AdminController::class, "manage_premium_users"])->name("admin.manage_premium_users");
        Route::get("/admin/manage_premium_user/delete/{id}", [AdminController::class, "delete_user"])->name("delete_user");
        Route::get("/admin/manage_premium_user/edit/{id}", [AdminController::class, "edit_user"])->name("edit_user");
        Route::post("/admin/manage_premium_user/update/{id}", [AdminController::class, "update_user"])->name("update_user");
        Route::get("/admin/contact_messages", [AdminController::class, "contact_messages"])->name("admin.contact_messages");
        Route::get("/admin/contact_messages/delete/{id}", [ContactUsController::class, "delete_contact_messages"])->name("admin.delete_contact_messages");
        Route::get("/admin/contact_messages/edit/{id}", [ContactUsController::class, "edit_contact_message"])->name("admin.edit_contact_messages");
        Route::post("/admin/contact_messages/update/{id}", [ContactUsController::class, "update_contact_message"])->name("update_message");
    });
});
// if user not exit (guest)
Route::middleware("guest")->group(function () {
    // authenication
    Route::get("/login", [AuthController::class, "login"])->name("login");
    Route::post("/login", [AuthController::class, "post_login"])->name("post_login");
    Route::get("/register", [AuthController::class, "register"])->name("register");
    Route::post("/register", [AuthController::class, "post_register"])->name("post_register");
});
