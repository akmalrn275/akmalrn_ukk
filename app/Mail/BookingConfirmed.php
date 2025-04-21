<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $service;
     public $pdfContent;
     public $qrPath;

    public function __construct($service, $pdfContent, $qrPath)
    {
        $this->service = $service;
        $this->pdfContent = $pdfContent;
        $this->qrPath = $qrPath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Booking Confirmed',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Konfirmasi Booking Anda')
            ->view('frontend.booking-confirmed')
            ->attachData($this->pdfContent, 'Booking_' . $this->service->id . '.pdf', [
                'mime' => 'application/pdf',
            ])
            ->attach($this->qrPath, [
                'as' => 'QR_Booking_' . $this->service->id . '.png',
                'mime' => 'image/png',
            ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
