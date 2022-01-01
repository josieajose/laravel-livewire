<?php

namespace App\Http\Livewire;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;


class ChangeUserStatus extends ModalComponent
{
    public $userId;
    public $user;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($this->userId);
    }

    public function changeStatus()
    {
        if (count($this->user->userPackages) > 0 && $this->user->enabled == 1) {
            return session()->flash('error', 'Only Users without a package can be disabled.');
        }

        $this->user->enabled = !$this->user->enabled;
        $this->user->save();

        $this->closeModalWithEvents([
            Users::getName() => 'userStatusUpdated',
        ]);
    }

    public function render()
    {
        return view('livewire.change-user-status');
    }
}
