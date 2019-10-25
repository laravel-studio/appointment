<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * declaring roles with name, display_name, description
         */
        $roles = [
            [
                'name' => 'super-admin',
                'display_name' => 'Super Admin',
                'description' => 'super admin, having all access of the entire system'
            ],

            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'admin, having permission of managing all customers and events'
            ],

            [
                'name' => 'customer',
                'display_name' => 'Customer',
                'description' => 'customer, having all permissions given by admin'
            ]
        ];

        /**
         * Creating Roles with name, display_name, 'description
         */

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
