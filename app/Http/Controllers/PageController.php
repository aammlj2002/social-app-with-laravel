<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index()
    {
        $posts = Post::latest()->paginate(9); // reverse of     Post::all();
        return view('index', ["posts" => $posts]);
    }
    function createPost()
    {
        return view("user.create");
    }
    function userProfile()
    {
        return view("user.userprofile");
    }
    function contactUs()
    {
        return view("user.contactus");
    }
    function get_posts($id)
    {
        $post = Post::find($id);
        return view("user.showpost", ["post" => $post]);
    }
    function edit_post_form($id)
    {
        // get post data by id
        $post = Post::find($id);

        return view("user.edit_post", ["post" => $post]);
    }
}
