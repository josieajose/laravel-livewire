<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function login()
    {
        $this->validate();

        if (\Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->to('/');
        } else {
            session()->flash('error', 'Invalid Login Credentials.');
        }
    }
}
