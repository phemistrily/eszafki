<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin')
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('adminadmin')
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}
