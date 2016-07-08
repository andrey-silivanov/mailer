<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GridGenerator;

class MailerController extends Controller
{
    public function __construct()
    {

    }

    public function getIndex()
    {
        $grid = GridGenerator::getAllMail();
        $userId = Auth::user()->id;
        Mail::where('user_id', $userId)->get();

        return view('main')->with(['title' => "Входящие",
            'grid' => $grid,
        ]);
    }

    public function oneMail(Request $request)
    {
        $mail = Mail::where('id', $request->id)->first();
        if (empty($mail)) {
            abort(404);
        } else {
            return view('oneLetter')->with(['title' => $mail->title,
                'mail' => $mail]);
        }
    }
}
