<?php

namespace App\Jobs;

use App\Notifications\ProductCreatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class SendProductCreatedNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
{
    $email = config('products.email');

    Notification::send($email, new ProductCreatedNotification());
}

}
