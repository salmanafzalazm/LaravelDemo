<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{


    function showForm(){
        return view('mail.sendform');
    }

    function sendEmail(Request $request){

        $request->validate(['email' => 'required|email']);

        $to = $request->input('email');
        $subject = "Welcome Email";
        $message = "This is a welcome message from salman Demo";
        Mail::to($to)->send(new WelcomeEmail($message, $subject));

        return back()->with('status', "Email sent to $to");
    }




}
