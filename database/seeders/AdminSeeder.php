<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::updateOrCreate(['name' => 'Joshua Ajose', 'email' => 'admin@gmail.com', 'password' => bcrypt('password'), 'photo' => 'https://randomuser.me/api/portraits/women/27.jpg']);
    }
}
