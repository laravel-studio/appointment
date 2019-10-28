<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$bjt3y0K9o6..hsLM9pGojOx7x0PFrTAjwsyvca7wfiIw6kqRtuIMO',
            'type' => 1,
            'status' => 1,
            'remember_token' => ''
        ]);
    }
}
