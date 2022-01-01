<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Package;
use App\Models\UserPackage;
use App\Services\UserPackageService;
use LivewireUI\Modal\ModalComponent;

class AssignPackage extends ModalComponent
{
    public $packages;
    public $packageId;
    public $userId;
    public $months;

    protected $rules = [
        'packageId' => 'required',
        'userId' => 'required',
        'months' => 'integer'
    ];

    public function mount()
    {
        $this->packages = Package::all();
    }

    public function assignPackage()
    {
        $this->validate();
        $userPackage = new UserPackageService();

        $package = Package::find($this->packageId);
        $user = User::find($this->userId);
        $purchasePrice = $package->credits * $this->months;

        if ($user->purchased_credits < $purchasePrice) {
            return session()->flash('error', "This user does not have enough credits to purchase this package");
        }

        if ($this->months < $package->commitment_period) {
            return session()->flash('error', "This package can only be purchase for {$package->commitment_period} months minimum");
        }

        if (count($package->userPackages) >= $package->sell_limit) {
            return session()->flash('error', 'This package has reached its maximum sell limit.');
        }

        if (!$package->enabled) {
            return session()->flash('error', 'This package cannot be assigned because it is disabled.');
        }

        if (!$user->enabled) {
            return session()->flash('error', 'This package cannot be assigned because the user is disabled.');
        }

        if ($userPackage->userPackageExists($this->userId, $this->packageId)) {
            return session()->flash('error', 'This user already has this package.');
        }

        $userPackage->createUserPackage($this->packageId, $this->userId, $this->months);

        $this->closeModalWithEvents([
            Users::getName() => 'userPackageAssigned',
        ]);
    }

    public function render()
    {
        return view('livewire.assign-package');
    }
}
