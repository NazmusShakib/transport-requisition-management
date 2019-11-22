<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Admin is allowed to manage everything.'
            ],
            [
                'name' => 'staff',
                'display_name' => 'Staff',
                'description' => 'Staff is allowed to manage there corresponding subscriber and goods.'
            ],
            [
                'name' => 'subscriber',
                'display_name' => 'Subscriber',
                'description' => 'Subscriber is allowed to manage self information.'
            ]
        ]);


        /**
         * Create permissions
         */
        DB::table('permissions')->insert([
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Admin is allowed to manage everything.'
            ],
            [
                'name' => 'staff',
                'display_name' => 'Staff',
                'description' => 'Staff is allowed to manage there corresponding subscriber and goods.'
            ],
            [
                'name' => 'subscriber',
                'display_name' => 'Subscriber',
                'description' => 'Subscriber is allowed to manage self information.'
            ]
        ]);


        DB::table('permission_role')->insert([
                [
                    'permission_id' => DB::table('permissions')->where('name', 'admin')->first()->id,
                    'role_id' => DB::table('roles')->where('name', 'admin')->first()->id
                ],
                [
                    'permission_id' => DB::table('permissions')->where('name', 'staff')->first()->id,
                    'role_id' => DB::table('roles')->where('name', 'staff')->first()->id
                ],
                [
                    'permission_id' => DB::table('permissions')->where('name', 'subscriber')->first()->id,
                    'role_id' => DB::table('roles')->where('name', 'subscriber')->first()->id
                ],
            ]
        );


        DB::table('role_user')->insert([
            [
                'user_id' => DB::table('users')->where('email', 'admin@example.com')->first()->id,
                'role_id' => DB::table('roles')->where('name', 'admin')->first()->id
            ],
            [
                'user_id' => DB::table('users')->where('email', 'staff@example.com')->first()->id,
                'role_id' => DB::table('roles')->where('name', 'staff')->first()->id
            ],
            [
                'user_id' => DB::table('users')->where('email', 'subscriber@example.com')->first()->id,
                'role_id' => DB::table('roles')->where('name', 'subscriber')->first()->id
            ],
        ]);
    }
}
