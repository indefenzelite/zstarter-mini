<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Laratrust\Models\LaratrustRole;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::firstOrCreate(
            [
            'first_name' => 'Admin',
            'last_name' => 'Defenzelite',
            'email' => 'admin@test.com',
            'phone' => '8085122017',
            'password' => bcrypt(1234),
            ]
        );
        

        $admin->syncRoles([LaratrustRole::where('name', 'admin')->first()]);
    }
}
