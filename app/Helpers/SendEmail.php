<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 09.07.2016
 * Time: 12:08
 */

namespace App\Helpers;

use Mail;
use Illuminate\Support\Facades\Auth;
use Krucas\Notification\Facades\Notification;

class SendEmail
{
    public static function send($request)
    {

        Mail::send('emails.layoutEmails', array('request' => $request), function ($message) use ($request) {

            $message->to($request->address, 'theme')->subject($request->title);
            $message->from(Auth::user()->email, Auth::user()->email);

        });

        
        $request['user_id'] = Auth::user()->id;

        if (\App\Models\Mail::create($request->all())) {

            return Notification::success('Письмо отправлено');
        } else {
            return Notification::error('Ошибка. Письмо не отправлено');
        }

    }

}