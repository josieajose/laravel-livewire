<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;


class CreateUser extends ModalComponent
{
    public $name;
    public $email;
    public $credits;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'credits' => 'integer'
    ];

    public function store(User $user)
    {
        $this->validate();

        $user = new User();
        $user->email = $this->email;
        $user->name = $this->name;
        $user->purchased_credits = $this->credits;
        $user->password = bcrypt('october8');
        $user->save();

        $this->closeModalWithEvents([
            Users::getName() => 'userCreated',
        ]);
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
