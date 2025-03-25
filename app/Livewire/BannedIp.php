<?php

namespace App\Livewire;

use Livewire\Component;
// use App\Models\BannedIp;

class BannedIp extends Component
{
    public $link;
    public $ip;
    public $type;

    public function mount()
    {
        // $this->links = App\Models\BannedIp::all();
    }
    public function render()
    {
        return view('livewire.banned-ip');
    }

    public function banned()
    {
        // dd($this->all());
        $validate = $this->validate([
            'link' => ['required', 'string', 'max:255'],
            'ip' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
        ]);


        \App\Models\BannedIp::create($validate);
        // $this->reset();
        redirect()->route('banned-ip');
    }

}
