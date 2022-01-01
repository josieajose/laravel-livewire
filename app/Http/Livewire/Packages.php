<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Livewire\Component;

class Packages extends Component
{
    public $packages = [];
    protected $listeners = ['packageCreated' => 'packageCreatedSuccess', 'packageStatusUpdated' => 'packageUpdatedSuccess'];

    public function mount()
    {
        $this->packages = Package::orderBy('id', 'DESC')->take(10)->get();
    }

    private function refreshPackageList()
    {
        $this->packages = Package::orderBy('id', 'DESC')->take(10)->get();
    }

    public function packageCreatedSuccess()
    {
        $this->refreshPackageList();
        session()->flash('message', 'Package Created Successfully.');
    }

    public function packageUpdatedSuccess()
    {
        $this->refreshPackageList();
        session()->flash('message', 'Package Updated Successfully.');
    }

    public function render()
    {
        return view('livewire.packages');
    }
}
