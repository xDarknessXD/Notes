<?php

namespace App\Livewire;

use Livewire\Component;

class BannedIp extends Component
{
    public $link;
    public $ip;
    public $type;

    public $links;

    public function mount()
    {
        $this->links = \App\Models\BannedIp::all();
    }

    public function render()
    {
        return view('livewire.banned-ip');
    }

    public function banned()
    {
        $this->validate([
            'link' => ['required', 'string', 'max:255'],
            'ip' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ]);

        \App\Models\BannedIp::create([
            'link' => $this->link,
            'ip' => $this->ip,
            'type' => $this->type,
        ]);

        $this->reset();
        $this->links = \App\Models\BannedIp::all();
    }
}

