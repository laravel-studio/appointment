<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        /**
         * Creating Permissions Seeder
         */
        $this->call(PermissionsTableSeeder::class);

        /**
         * Creating User Types Seeder
         */
        $this->call(RolesTableSeeder::class);

        $this->call(ServicesTableSeeder::class);
    }
}
