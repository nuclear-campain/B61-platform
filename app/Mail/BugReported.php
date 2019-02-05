<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class BugReported 
 * 
 * @package App\Mail
 */
class BugReported extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The variable that holds all the contact form data. 
     * 
     * @var array $inputs
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
     * @return BugReported ($this)
     */
    public function build(): BugReported
    {
        return $this->view('issues.email', ['data' => $this->inputs])
            ->subject('Someone reported a bug on ' . config('app.name'));
    }
}
