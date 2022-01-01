<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Package;
use App\Models\UserPackage;

class UserPackageService
{
    public function createUserPackage($packageId, $userId, $months): UserPackage
    {
        $package = Package::find($packageId);
        $purchasePrice = $package->credits * $months;

        $newPackage = new UserPackage();
        $newPackage->user_id = $userId;
        $newPackage->package_id = $packageId;
        $newPackage->start_date = Carbon::now();
        $newPackage->end_date = Carbon::now()->addMonths($months);
        $newPackage->save();

        $user = User::find($userId);
        $user->purchased_credits = $user->purchased_credits - $purchasePrice;
        $user->save();

        return $newPackage;
    }

    public function userPackageExists($userId, $packageId)
    {
        return UserPackage::where(['user_id' => $userId, 'package_id' => $packageId])->exists();
    }
}
