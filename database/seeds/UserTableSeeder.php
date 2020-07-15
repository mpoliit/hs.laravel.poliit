<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\Role::where('name', '=', config('roles.admin'))->first();
        \App\Models\User::create([
            'role_id'       => $admin->id,
            'name'          => 'Admin',
            'surname'       => 'Admin',
            'email'         => env('ADMIN_EMAIL'),
            'password'      => env('ADMIN_PASS'),
            'birth_date'    => '1994-01-01',
            'phone'         => env('ADMIN_PHONE')
        ]);

        factory(\App\Models\User::class, 10)->create();

    }
}
