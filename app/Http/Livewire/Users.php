<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users = [];

    protected $listeners = ['userCreated' => 'userCreatedSuccessful', 'userStatusUpdated' => 'userUpdatedSuccessful', 'userPackageAssigned' => 'userPackageSuccessful'];

    public function mount()
    {
        $this->users = User::orderBy('id', 'DESC')->take(10)->get();
    }

    public function userPackageSuccessful()
    {
        $this->refreshUserList();
        session()->flash('message', 'Package Assigned to User Successfully.');
    }

    public function userCreatedSuccessful()
    {
        $this->refreshUserList();
        session()->flash('message', 'User Created Successfully.');
    }

    public function userUpdatedSuccessful()
    {
        $this->refreshUserList();
        session()->flash('message', 'User Status Changed Successfully.');
    }

    private function refreshUserList()
    {
        $this->users = User::orderBy('id', 'DESC')->take(10)->get();
    }

    public function render()
    {
        return view('livewire.users');
    }
}
