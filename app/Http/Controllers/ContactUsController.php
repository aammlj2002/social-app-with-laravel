<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function post_contact_us()
    {
        // validate data
        $validation = request()->validate([
            "username" => "required",
            "email" => "required",
            "message" => "required",
        ]);
        if ($validation) {
            $username = request("username");
            $email = request("email");
            $message = request("message");
            $contact_message = new ContactMessage();
            $contact_message->username = $username;
            $contact_message->email = $email;
            $contact_message->message = $message;
            $contact_message->save();
            return back();
        } else {
            return back()->withErrors("error", $validation);
        }
        // get data from contact us page

        // save in database
    }
    function delete_contact_messages($id)
    {
        // find delete data in database with id
        $message = ContactMessage::find($id);

        // delete data
        $message->delete();

        // return back
        return back()->with("message", "message deleted");
    }
    function edit_contact_message($id)
    {
        $message = ContactMessage::find($id);
        return view("admin.edit_contact_message", ["message" => $message]);
    }
    function update_contact_message($id)
    {
        $validation = request()->validate([
            "username" => "required",
            "email" => "required",
            "message" => "required",
        ]);
        if ($validation) {
            $message = ContactMessage::find($id);
            $message->username = request("username");
            $message->email = request("email");
            $message->message = request("message");
            $message->update();
            return redirect()->route("admin.contact_messages")->with("message", "updated message");
        } else {
            return back()->withErrors($validation);
        }
    }
}
