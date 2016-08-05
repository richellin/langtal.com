<?php

namespace App\Listeners;

use App\Events\UserWasRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUserRegisterConfirmation implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserWasRegistered  $event
     * @return void
     */
    public function handle(UserWasRegistered $event)
    {
        $user = $event->user;
        $to = $user->email;
        $subject = 'Welcome to Langtal';
        $data = [
            'title' => 'Hi there',
            'body'  => 'This is the body of an email message',
            'user'  => $user
        ];
        
        \Mail::send('emails.welcome', $data, function($message) use($to, $subject) {
            $message->to($to)->subject($subject);
        });
        
        /*
        Mail::send('emails.register.confirm', ['user' => $user], function($m) use ($user) {
            $m->from('info@lang.com', 'サンプルアプリ');
            $m->to($user->email, $user->name)->subject('【サンプルアプリ】登録の確認');
        });
        */
    }
}
