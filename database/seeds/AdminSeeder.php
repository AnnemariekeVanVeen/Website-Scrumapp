<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user                = new User();
        $user->name          = "Stephan Hoeksema";
        $user->email         = "s.hoeksema@windesheim.nl";
        $user->password      = Hash::make('Stephan1234');
        $user->is_admin      = true;
        $user->save();
    }
}
