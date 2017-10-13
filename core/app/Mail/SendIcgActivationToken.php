<?php

namespace App\Mail;

use App\Models\ICG\IcgActivation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendIcgActivationToken extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(IcgActivation $token)
    {
        $this->token = $token;
    }

    /**
     * 
     * Build the message.
     *
     * @return $this
     */
     public function build()
    {   
       
        return $this->subject('MiDigitalLife Account activation')->view('email.auth.icgActivation');
    }
}
