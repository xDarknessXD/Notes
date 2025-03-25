<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Session;
use Livewire\Component;
use Illuminate\Http\Request;

class UserManagement extends Component
{
    public $schoolID = '';
    public $type = 'user';
    public $name = '';
    public $email = '';
    public $password = 'STUD-';
    public $ipAddress;


    public $users = [];

    public function mount()
    {
        // $this->user = User::se
        $this->users = User::all();
        $this->ipAddress = request()->ip();
    }
    public function render()
    {
        return view('livewire.user-management');
    }


    public function addUser()
    {
        // dd($this->all());
        $validate = $this->validate([
            'schoolID' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string',]
        ]);


        User::create($validate);
        // $this->reset();
        redirect()->route('user-management');
    }
}
