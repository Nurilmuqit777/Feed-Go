<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\EmailSubscription;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsletterMail;

class Newsletters extends Component
{
    public $title = '';

    public $content = '';

    public $subscriberCount = 0;

    public function mount()
    {
        $this->subscriberCount = EmailSubscription::count();
    }

    public function sendNewsletter()
    {
        $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $subscribers = EmailSubscription::pluck('email');

        if ($subscribers->isEmpty()) {
            $this->addError(
                'title',
                'Belum ada subscriber yang terdaftar.'
            );

            return;
        }

        $newsletter = Newsletter::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        foreach ($subscribers as $email) {
            Mail::to($email)->send(
                new NewsLetterMail(
                    $this->title,
                    $this->content,
                    $email
                )
            );
        }

        $newsletter->update([
            'sent_at' => now(),
        ]);

        $this->reset([
            'title',
            'content',
        ]);

        session()->flash(
            'newsletter_success',
            'Newsletter berhasil dikirim kepada ' . $subscribers->count() . ' subscriber.'
        );

        $this->subscriberCount = EmailSubscription::count();
    }

    public function render()
    {
        return view('livewire.admin.newsletters');
    }
}
