<?php

namespace App\Jobs;

use App\Events\OrderMailEvent;
use App\Mail\PlaceOrders;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class OrderMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $recent_order;
    public $email_send;
    public function __construct($recent_order,$email_send)
    {
        $this->recent_order = $recent_order;
        $this->email_send = $email_send;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email_send)->send(new PlaceOrders($this->recent_order));
    }
}
