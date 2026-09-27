<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{


    function sendEmail(){


     $to = "salman.afzal@azm.dev";
     $subject = "Welcome Email";
     $message = "This is a welcome message from salman Demo";


     Mail::to($to)->send(new WelcomeEmail($message, $subject));

    }



}
