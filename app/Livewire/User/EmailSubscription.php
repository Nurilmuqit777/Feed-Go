<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\EmailSubscription as EmailSubscriptionModel;

class EmailSubscription extends Component
{
    public string $email = '';

    public function subscribe()
    {
        $this->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $subscription = EmailSubscriptionModel::where('email', $this->email)->first();

        if ($subscription) {
            session()->flash('subscription_error', 'Email Anda sudah terdaftar.');
            return;
        }

        EmailSubscriptionModel::create([
            'email' => $this->email,
            'subscribed_at' => now(),
        ]);

        $this->reset('email');

        session()->flash(
            'subscription_success',
            'Terima kasih! Anda berhasil berlangganan informasi FeedGo.'
        );
    }

    public function render()
    {
        return view('livewire.user.email-subscription');
    }
}
