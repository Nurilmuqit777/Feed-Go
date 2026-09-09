<?php

namespace App\Livewire\Admin\Orders;

use Livewire\Component;
use App\Models\Shipping;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ChangeShippingStatus extends Component
{
    public bool $open = false;
    public ?int $shippingId = null;
    public string $tracking_number ='';
    public string $status = '';

    protected $listeners = [
        'open-change-shipping-status' => 'open',
        'close-shipping-status-modal' => 'close',
    ];

    public function open(int $shippingId)
    {
        $shipping = Shipping::findOrFail($shippingId);

        $this->shippingId = $shipping->id;
        $this->tracking_number = $shipping->tracking_number ?? '';

        $this->status = match ($shipping->status) {
            'submitted' => 'shipped',
            'shipped' => 'finished',
            default => $shipping->status,
        };

        $this->resetValidation();

        $this->open = true;
    }

    public function close()
    {
        $this->reset([
            'shippingId',
            'tracking_number',
            'status',
        ]);

        $this->resetValidation();

        $this->open = false;
    }


    public function save()
    {
        $shipping = Shipping::with('orderAddress.order')
            ->findOrFail($this->shippingId);

        if ($this->status === 'shipped') {
            $this->validate([
                'tracking_number' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('shippings', 'tracking_number')
                        ->ignore($shipping->id),
                ],
            ]);
        }

        DB::transaction(function () use ($shipping) {

            if ($this->status === 'shipped') {

                $shipping->update([
                    'tracking_number' => $this->tracking_number,
                    'status' => 'shipped',
                    'shipped_at' => now(),
                ]);

                $shipping->orderAddress->order->update([
                    'status' => 'delivered',
                ]);
            }

            elseif ($this->status === 'finished') {

                $shipping->update([
                    'status' => 'finished',
                ]);

                $shipping->orderAddress->order->update([
                    'status' => 'completed',
                ]);
            }
        });

        $this->close();

        $this->dispatch('shipping-status-changed');
    }

    public function render()
    {
        return view('livewire.admin.orders.change-shipping-status');
    }
}
