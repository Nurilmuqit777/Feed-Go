<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmailSubscription;

class NewsletterController extends Controller
{
    public function unsubscribe(string $email)
    {
        $subscription = EmailSubscription::where('email', $email)->first();

        if ($subscription) {
            $subscription->delete();
        }

        return view('emails.unsubscribed');
    }
}
