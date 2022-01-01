<?php

namespace App\Http\Livewire;

use App\Models\Package;
use LivewireUI\Modal\ModalComponent;


class ChangePackageStatus extends ModalComponent
{

    public $packageId;
    public $package;

    public function mount($packageId)
    {
        $this->packageId = $packageId;
        $this->package = Package::find($this->packageId);
    }

    public function render()
    {
        return view('livewire.change-package-status');
    }

    public function changeStatus()
    {
        $this->package->enabled = !$this->package->enabled;
        $this->package->save();

        $this->closeModalWithEvents([
            Packages::getName() => 'packageStatusUpdated',
        ]);
    }
}
