<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use Livewire\Component;

class Clock extends Component
{
    public string $currentTime;

    protected $listeners = ['clockEvent' => 'clockAction'];

    public function clockAction(): void
    {
        $this->currentTime = date('H:i:s');
    }

    public function render()
    {
        return view('livewire.clock');
    }
}
