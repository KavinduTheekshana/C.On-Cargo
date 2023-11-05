<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPdfMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdf;

    public function __construct($pdf)
    {
        $this->pdf = $pdf;
    }

    public function build()
    {
        return $this->view('emails.pdf') // Specify your email view
            ->subject('Your PDF Invoice')
            ->attachData(base64_decode($this->pdf), 'invoice.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
