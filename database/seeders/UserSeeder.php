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
            'avatar' => 'https://ui-avatars.com/api/?name=Admin',
        ]);

        $role = Role::findByName('admin');
        ModelHasRole::firstOrCreate(['model_uuid' => $user->id], [
            'role_id' => $role->id,
            'model_uuid' => $user->id,
            'model_type' => User::class,
        ]);


        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            $name = $faker->name;
            $user = User::create([
                'name' => $name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'avatar' => 'https://ui-avatars.com/api/?name=' . $name,
            ]);
            $role = Role::findByName('author');
            ModelHasRole::firstOrCreate(['model_uuid' => $user->id], [
                'role_id' => $role->id,
                'model_uuid' => $user->id,
                'model_type' => User::class,
            ]);
        }
    }
}
