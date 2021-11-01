<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    function delete_post($id)
    {
        // get delete post by id
        $delete_post = Post::find($id);

        //delete post
        $delete_post->delete();

        // redirect to home page
        return redirect()->route("home");
    }
    function edit_post($id)
    {
        // get data from edit form
        $title = request("title");
        $content = request("content");
        $image = request("image");
        // get post data
        $post = Post::find($id);

        // overwrite update data
        $post->title = $title;
        $post->content = $content;

        // if user do not pick image
        if ($image) {
            $image_name = uniqid() . "_" . $image->getClientOriginalName();
            $image->move(public_path("images/posts/"), $image_name);
            $post->image = $image_name;
        }
        // update data
        $post->update();
        return redirect()->route("get_posts", ["id" => $id]);
    }
    function post()
    {
        $validation = request()->validate([
            "title" => "required",
            "content" => "required",
            "image" => "required",
        ]);
        if ($validation) {
            $title = request("title");
            $content = request("content");
            $image = request("image");
            $image_name = uniqid() . "_" . $image->getClientOriginalName(); // create image name
            $image->move(public_path("images/posts/"), $image_name); // move image to public path
            $user_id = auth()->user()->id; // get current user id 
            $post = new Post();
            $post->user_id = $user_id;
            $post->title = $title;
            $post->content = $content;
            $post->image = $image_name;
            $post->save();

            return redirect()->route("home")->with("message", "added post");
        } else {
            // return back with error
        }
    }
}
