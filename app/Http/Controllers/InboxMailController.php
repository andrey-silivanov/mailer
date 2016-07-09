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
            $b[$k] = $mailbox->getMail($v);
        }

// Get the first message and save its attachment(s) to disk:
       // $mail = $mailbox->getMail('All');

       //echo $mail->textHtml;
        //echo "\n\n\n\n\n";
      //  dd($mailbox);

       return view('inbox.main')->with(['mails' => $b]);
    }
}
