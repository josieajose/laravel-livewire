<?php

namespace App\Http\Livewire;

use App\Models\Package;
use LivewireUI\Modal\ModalComponent;

class NewPackage extends ModalComponent
{
    public $name;
    public $description;
    public $commitment_period;
    public $sell_limit;
    public $credits;

    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required|min:6',
        'commitment_period' => 'integer',
        'sell_limit' => 'integer',
        'credits' => 'integer',
    ];

    public function store(Package $package)
    {
        $this->validate();

        $user = new Package();
        $user->name = $this->name;
        $user->commitment_period = $this->commitment_period;
        $user->sell_limit = $this->sell_limit;
        $user->credits = $this->credits;
        $user->description = $this->description;
        $user->save();

        $this->closeModalWithEvents([
            Packages::getName() => 'packageCreated',
        ]);
    }

    public function render()
    {
        return view('livewire.new-package');
    }
}
