<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name )
    {
        //
        $this->name=$name;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url=url('/').'/users/verifyuser/';
        return $this->view('email.confirmation')
                    ->subject('Successfull Registraton')
                    ->from('info@dd.com')
                    ->with('name',$this->name->name)
                    ->with('url',$url)
                    ->with('id',$this->name->id);

                    
    }
}
