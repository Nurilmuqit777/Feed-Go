<?php

namespace App\Livewire\Actions;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CartBadge extends Component
{
    protected $listeners = ['cart-updated' => '$refresh'];

    public function render()
    {
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
        return view('livewire.actions.cart-badge',[
            'count' => $count,
        ]);
    }
}
