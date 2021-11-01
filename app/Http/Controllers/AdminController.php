<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view("admin.index");
    }
    function manage_premium_users()
    {
        $users = User::all();
        return view("admin.manage-premium-users", ["users" => $users]);
    }
    function contact_messages()
    {
        $messages = ContactMessage::latest()->get();
        return view("admin.contact-messages", ["messages" => $messages]);
    }
    function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with("message", "deleted $user->name from user");
    }
    function edit_user($id)
    {
        $user = User::find($id);
        return view("admin.edit_user", ["user" => $user]);
    }
    function update_user($id)
    {
        $validation = request()->validate([
            "username" => "required",
            "email" => "required",
        ]);
        if ($validation) {
            $user = User::find($id);
            $user->name = request("username");
            $user->email = request("email");
            $user->is_admin = request("is_admin") ? "1" : "0";
            $user->is_premium = request("is_premium") ? "1" : "0";
            $user->update();
            return redirect()->route("admin.manage_premium_users")->with("message", "updated user");
        } else {
            return back()->withErrors($validation);
        }
    }
}
