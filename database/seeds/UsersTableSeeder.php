<?php

use App\Profile;
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $users = [
            [
                'email' => 'admin@example.com',
                'name' => 'Admin User',
            ],
            [
                'email' => 'staff@example.com',
                'name' => 'Staff Account',
            ],
            [
                'email' => 'subscriber@example.com',
                'name' => 'Subscriber Account',
            ],
        ];

        foreach ($users as $user) {
            $userObj = User::updateOrCreate([
                'email' => $user['email']
            ], [
                'name' => $user['name'],
                'phone' => $faker->e164PhoneNumber,
                'password' => bcrypt('123456'),
            ]);

            $profile = new Profile();
            $profile->dob = $faker->date('Y-m-d');
            $profile->bio = $faker->realText(150);
            $profile->address = $faker->address;

            $userObj->profile()->save($profile);
        }
    }
}
