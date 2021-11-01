<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login()
    {
        return view("auth.login");
    }
    function register()
    {
        return view("auth.register");
    }
    function post_register()
    {
        $validation = request()->validate([
            "username" => "required",
            "email" => "required",
            "password" => "required || min:8 || confirmed",
            "password_confirmation" => "required",
            "image" => "required",
        ]);
        if ($validation) {
            $image = request("image"); // save in public/images
            $image_name = uniqid() . "_" . $image->getClientOriginalName(); //save to database as name
            //                sad23432_imagename.jpg
            $image->move(public_path("images/profiles"), $image_name);
            $password = Hash::make($validation["password"]);
            $user = new User();
            $user->name = $validation["username"];
            $user->email = $validation["email"];
            $user->password = $password;
            $user->image = $image_name;
            $user->save();
            if (Auth::attempt(["email" => $validation['email'], "password" => $validation['password']])) {
                return redirect()->route("home");
            } else {
                return back()->with("error", "Something went wrong");
            }
        } else {
            return back()->withErrors($validation);
        }
    }
    function post_login()
    {
        // validate input field
        $validation = request()->validate([
            "email" => "required",
            "password" => "required"
        ]);

        if ($validation) {  // if validation success
            $auth = Auth::attempt(["email" => $validation['email'], "password" => $validation['password']]);
            if ($auth) { // if auth success
                return redirect()->route("home");
            } else { // if auth fail
                return back()->with("error", "Email or password is incorrect");
            }
        } else { // if validation fail
            return back()->withErrors($validation);
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }
    function post_userProfile()
    {
        $username = request("username");
        $email = request("email");
        $old_password = request("old_password");
        $new_password = request("new_password");
        $image = request("image");

        // if user not change email or name
        $id = auth()->user()->id; // get user id
        $current_user = User::find($id); // select user data with id
        $current_user->name = $username;
        $current_user->email = $email;

        if ($image) { // if user choose image
            // move file to public path
            $image_name = uniqid() . "_" . $image->getClientOriginalName();
            $image->move(public_path("images/profiles"), $image_name);

            // update image name to database
            $current_user->image = $image_name;
            $current_user->update();
            return back()->with("success", "Your profile updated successfully");
        }
        if ($old_password && $new_password) { // if user enter both old and new password\
            // check is old and new password match (with hash code)!!!
            if (Hash::check($old_password, $current_user->password)) { // Hash::check return true or false
                //             12345678  ,  23fd8uasdfq84urq(hash code form database)
                $current_user->password = Hash::make($new_password);
                $current_user->update();
                return back()->with("success", "Your profile updated successfully");
            } else {
                return back()->with("error", "old password and new password not match");
            }
        }
        $current_user->update();
        return back()->with("success", "Your profile updated successfully");
    }
}
