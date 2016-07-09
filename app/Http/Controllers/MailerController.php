<?php

namespace App\Http\Controllers;

use App\Models\Mail;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GridGenerator;
use App\Http\Requests\MailerRequest;
use Krucas\Notification\Facades\Notification;

class MailerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function oneLetter(Request $request)
    {
        $mail = Mail::where('id', $request->id)->first();
        if (empty($mail)) {
            abort(404);
        } else {
            return view('oneLetter')->with(['title' => $mail->title,
                'mail' => $mail]);
        }
    }

    public function newLetter()
    {
        return view('newLetter')->with(['title' => 'Новое письмо']);
    }

    public function sendLetter(MailerRequest $request)
    {
        $userId = Auth::user()->id;
        $request['user_id'] = $userId;
        if (Mail::create($request->all())) {
            Notification::success('Word added');
        } else {
            Notification::error('Error. Word has not been added');
        }

        return redirect()->back();
    }
}
