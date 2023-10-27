<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Controllers\RoleController;


class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            // 'username'=>'admin_test',
            // 'phone'=>'12121',
            'name' => 'Admin',
            'email' => 'email@esprit.tn',
            'password' => bcrypt('123456')
            ]);
            $role = Role::create(['name' => 'Admin']);
            $permissions = Permission::pluck('id','id')->all();
            $role->syncPermissions($permissions);
            $user->assignRole([$role->id]);
    }
}
