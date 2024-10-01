<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sent()
    {
        $mailTo = "ariyan0440@gmail.com";
        $subject = "Mail sent Successfully";
        $msg = "Assalamualaikum";

        Mail::to($mailTo)->send(new TestEmail($subject, $msg));

    }
}
