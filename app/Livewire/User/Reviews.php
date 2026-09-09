<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\OrderDetail;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class Reviews extends Component
{
    public ?OrderDetail $orderDetail = null;

    public int $rating = 5;
    public string $review = '';
    public bool $open = false;

    public ?Review $existingReview = null;
    public bool $viewOnly = false;

    protected $rules = [
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'nullable|string|max:1000',
    ];

    protected $listeners = [
        'open-product-reviews' => 'open',
    ];

    protected $messages = [
        'rating.required' => 'Silakan pilih nilai produk.',
        'rating.min' => 'Silakan pilih minimal 1 bintang.',
        'rating.max' => 'Nilai produk maksimal 5 bintang.',
        'review.max' => 'Ulasan maksimal 1000 karakter.',
    ];

    public function setRating(int $rating)
    {
        $this->rating = $rating;
    }

    public function open($orderDetailId)
    {
        $this->orderDetail = OrderDetail::with('product.category', 'review')
        ->whereHas('order', function ($query) {
            $query->where('user_id', Auth::id())
                  ->where('status', 'completed');
        })->findOrFail($orderDetailId);

        $this->existingReview = $this->orderDetail->review;

        if ($this->existingReview) {
            $this->rating = $this->existingReview->rating;
            $this->review = $this->existingReview->review_text ?? '';
            $this->viewOnly = true;
        } else {
            $this->rating = 5;
            $this->review = '';
            $this->viewOnly = false;
        }

        $this->resetValidation();

        $this->open = true;
    }

    public function close()
    {
        $this->open = false;
        $this->orderDetail = null;
        $this->existingReview = null;

        $this->rating = 5;
        $this->review = '';
        $this->viewOnly = false;

        $this->resetValidation();
    }

    public function submit()
    {
        if ($this->viewOnly) {
        return;
        }

        $this->validate();

        if (!$this->orderDetail) {
            return;
        }

        if ($this->orderDetail->review()->exists()) {
            $this->close();
            return;
        }

        Review::create([
            'user_id' => Auth::id(),
            'order_detail_id' => $this->orderDetail->id,
            'review_text' => $this->review,
            'rating' => $this->rating,
        ]);

        $this->close();

        $this->dispatch('review-submitted');
    }

    public function skip()
    {
        $this->close();
    }


    public function render()
    {
        return view('livewire.user.reviews');
    }
}
