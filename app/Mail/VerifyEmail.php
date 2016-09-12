<?php

namespace ZeroIssues\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use ZeroIssues\Email;
use ZeroIssues\User;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $email;
    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Email $email)
    {
        $this->user = $user;
        $this->email = $email;
        $this->link = route('auth.emails.verify', [$user->id, $email->email, $email->token]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('emails.auth.verify-email.subject', ['app-name'=>config('app.name')]))->view('emails.auth.verify-email');
    }
}
