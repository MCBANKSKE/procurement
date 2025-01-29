<?php

namespace App\Notifications;

use App\Models\PurchaseRequest;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PurchaseRequestNotification extends Notification
{
    protected $purchaseRequest;
    protected $status;

    public function __construct(PurchaseRequest $purchaseRequest, $status)
    {
        $this->purchaseRequest = $purchaseRequest;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['mail'];  // Sending via email directly
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Purchase Request ' . ucfirst($this->status))
            ->line('A purchase request has been ' . $this->status)
            ->line('Product: ' . $this->purchaseRequest->product->name)
            ->line('Quantity: ' . $this->purchaseRequest->quantity)
            ->line('Notes: ' . $this->purchaseRequest->notes)
            ->action('View Purchase Request', url('/purchase-requests/' . $this->purchaseRequest->id));
    }
}
