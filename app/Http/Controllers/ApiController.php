<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function users()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function packages()
    {
        $packages = Package::all();
        return response()->json($packages);
    }

    public function userPackages()
    {
        $userPackages = UserPackage::all();
        return response()->json($userPackages);
    }
}
