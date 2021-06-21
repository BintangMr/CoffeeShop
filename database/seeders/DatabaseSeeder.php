<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@liberica.com';
        $user->email_verified_at = Carbon::now();
        $user->password = Hash::make('admin');
        $user->save();
    }
}
