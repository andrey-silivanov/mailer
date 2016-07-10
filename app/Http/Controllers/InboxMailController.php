<?php

namespace App\Http\Controllers;

use App\Helpers\GridGenerator;
use Illuminate\Http\Request;

use App\Http\Requests;
use PhpImap\Mailbox;
use Krucas\Notification\Facades\Notification;
class InboxMailController extends Controller
{
    private $login;
    private $password;
    private $mailBox;
    public function __construct()
    {
        $this->middleware('auth');
        $this->password = env('MAIL_PASSWORD');
        $this->login = env('MAIL_USERNAME');
        $this->mailBox = new Mailbox('{imap.gmail.com:993/imap/ssl}INBOX', $this->login, $this->password, __DIR__);
    }

    public function getIndex()
    {
        $mailbox = $this->mailBox;

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
        $mailbox = $this->mailBox;
        $mail = $mailbox->getMail($request->id);
       return view('inbox.oneLetter')->with(['mail' => $mail,
       'title' => $mail->subject
       ]);
    }

    public function delete()
    {
        $mailbox = $this->mailBox;
        unset($_POST[0]);
        $error=[];
        foreach($_POST as $k => $v) {
            if(!$mailbox->deleteMail($v)) {
                $error[] = 1;
            }
        }

        if(count($error) == 0) {
            Notification::success('Письмо удалено');
        }
        else {
            Notification::error('Ошибка. Письмо не удалено');
        }
        return redirect()->back();

    }

}
