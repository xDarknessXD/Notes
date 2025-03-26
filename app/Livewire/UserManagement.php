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
    public $ipAddress = '';
    public $status = 'Offline';


    public $users;

    public function mount()
    {
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
            'ipAddress' => [ 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'status' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string',]
        ]);


        User::create($validate);
        $this->reset();
        // redirect()->route('user-management');
    }

    public function delete($id){
        $customer = \App\Models\User::find($id);
        $customer->delete();
        // $this->customers = \App\Models\Customer::all();
    }
}

