<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Session;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserManagement extends Component
{
    public $schoolID = '';
    public $type = 'user';
    public $name = '';
    public $email = '';
    public $password = 'STUD-';
    public $ipAddress = '';
    public $status = 'Offline';

    public $pass = 'password';

    protected $rules = [ // Make sure this property exists
        'name' => 'required|string|max:255',
        'email' => 'required|email',
    ];

    public $users = [];

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
        $validate = $this->validate([
            'schoolID' => ['required', 'string', 'max:255'],
            'ipAddress' => ['string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'status' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string',]
        ]);


        User::create($validate);
        $this->reset();
        $this->users = User::all();

        // redirect()->route('user-management');
    }

    public function togglePassword()
    {
        if ($this->pass == 'password') {
            $this->pass = 'text';
        } else {
            $this->pass = 'password';
        }
    }

    public $userID;

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userID = $user->id;
        $this->schoolID = $user->schoolID;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    }


    public function update()
    {
        // dd($this->all());
        // $validate = $this->validate([
        //     'schoolID' => [ 'string', 'max:255'],
        //     'name' => [ 'string', 'max:255'],
        //     'email' => [ 'string', 'lowercase', 'email', 'max:255' ],
        // ]);

        $this->validate();

        User::where('id', $this->userID)->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'User Updated Successfully');
        redirect()->route('user-management');

    }



    public function delete($id)
    {
        // dd($this->all());
        $users = User::find($id);
        $users->delete();
        // $this->customers = \App\Models\Customer::all();
    }
}

