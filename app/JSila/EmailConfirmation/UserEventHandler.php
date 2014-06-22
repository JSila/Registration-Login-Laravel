<?php

namespace JSila\EmailConfirmation;
use User;
use Mail;

class UserEventHandler {
    
    public function onCreate(User $user)
    {
        $user->activation_code = $this->generateActivationCode();
        $user->save();

        $this->sendEmailConfirmation($user);
    }

    public function generateActivationCode()
    {
        return substr(md5(uniqid(rand(), true)), -16, 16);
    }

    public function sendEmailConfirmation(User $user)
    {
        $name = isset($user->name) ? $user->name : $user->username;
        $activationUrl = route('confirm', ['code' => $user->activation_code]);

        Mail::send('emails.auth.confirm', compact('name', 'activationUrl'), function($message) use ($user, $name)
        {
            $message->to($user->email, $name)->subject("Account activation is needed!");
        });
    }
} 
