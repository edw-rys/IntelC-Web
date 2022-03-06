<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActiveUserMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    private $user;
    private $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.users.user-created')
            ->with('user', $this->user)
            ->with('password', $this->password)
            ->subject(config('app_intelc.email.active_user.subject'));
    }
}
