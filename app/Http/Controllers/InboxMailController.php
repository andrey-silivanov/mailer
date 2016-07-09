<?php

namespace App\Http\Controllers;

use App\Helpers\GridGenerator;
use Illuminate\Http\Request;

use App\Http\Requests;
use PhpImap\Mailbox;
class InboxMailController extends Controller
{
    private $login;
    private $password;
    public function __construct()
    {
        $this->middleware('auth');
        $this->password = env('MAIL_PASSWORD');
        $this->login = env('MAIL_USERNAME');
    }

    public function getIndex()
    {
        $mailbox = new Mailbox('{imap.gmail.com:993/imap/ssl}INBOX', $this->login, $this->password, __DIR__);

        $mailsIds = $mailbox->searchMailbox('ALL');
        if(!$mailsIds) {
            die('Mailbox is empty');
        }
        foreach($mailsIds as $k => $v) {
            $mails[$k] = $mailbox->getMail($v);
        }
        if(empty($mails)){
            $mails = " ";
        }

       return view('inbox.main')->with(['mails' => $mails,
       'title' => "Входящие"]);
    }

    public function getOneLetter(Request $request)
    {
        $mailbox = new Mailbox('{imap.gmail.com:993/imap/ssl}INBOX', $this->login, $this->password, __DIR__);
        $mail = $mailbox->getMail($request->id);
       return view('inbox.oneLetter')->with(['mail' => $mail,
       'title' => $mail->subject
       ]);
    }

}
