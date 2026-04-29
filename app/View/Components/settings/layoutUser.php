<?php

namespace App\View\Components\settings;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class layoutUser extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.settings.layout-user');
    }
}
