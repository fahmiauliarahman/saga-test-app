<?php

namespace Database\Seeders;

use App\Models\ModelHasRole;
use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        default admin user
        $user = User::create([
            'name' => "Admin",
            'email' => "admin@yopmail.com",
            'password' => Hash::make('password'),
        ]);

        $role = Role::findByName('admin');
        ModelHasRole::create([
            'role_id' => $role->id,
            'model_uuid' => $user->id,
            'model_type' => User::class,
        ]);


        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
            ]);
            $role = Role::findByName('author');
            ModelHasRole::create([
                'role_id' => $role->id,
                'model_uuid' => $user->id,
                'model_type' => User::class,
            ]);
        }
    }
}
