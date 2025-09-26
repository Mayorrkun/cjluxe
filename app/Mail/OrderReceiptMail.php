<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
class OrderReceiptMail extends Mailable
{
    use Queueable, SerializesModels;


    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        $pdf = Pdf::loadView('orders.receipt', ['order' => $this->order]);

        return $this->subject('Your CJLuxury Order Receipt')
            ->view('emails.order-receipt')
            ->attachData($pdf->output(), 'receipt-'.$this->order->id.'.pdf');
    }

    /**
     * Get the message envelope.
     */

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
