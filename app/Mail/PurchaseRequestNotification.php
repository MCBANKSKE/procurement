<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\PurchaseRequest;

class PurchaseRequestNotification extends Mailable
{
    use SerializesModels;

    public $request;
    public $status;

    public function __construct(PurchaseRequest $request, $status)
    {
        $this->request = $request;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Purchase Request ' . ucfirst($this->status))
            ->view('emails.purchase-request')
            ->with([
                'request' => $this->request,
                'status' => $this->status,
            ]);
    }
}