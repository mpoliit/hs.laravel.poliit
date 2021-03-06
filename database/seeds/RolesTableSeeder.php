<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = config('roles');

        if(!empty($roles)){
           foreach ($roles as $role){
               $createRoles[] = ['name' => $role];
           }

           DB::table('roles')->insert($createRoles);
        }
    }
}
