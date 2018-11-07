<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class SendContactMail
 * 
 * @package App\Mail
 */
class SendContactMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    /**
     * The variable that holds all the contact form data.
     *
     * @var ContactValidator $inputs
     */
    public $inputs;
    
    /**
     * Create a new message instance.
     *
     * @param  array $inputs The contact form data
     * @return void
     */
    public function __construct(array $inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * Build the message.
     *
     * @return SendContactMail ($this)
     */
    public function build(): SendContactMail
    {
        return $this->markdown('contacts.contact-mail', ['data' => $this->inputs])
            ->subject('Contact form has been filled in from ' . config('app.name'))
            ->replyTo($this->inputs['email'], "{$this->inputs['firstname']} {$this->inputs['lastname']}");
    }
