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
        App\User::create([
            'name' => 'Rudi Lee',
            'email' => 'lee@g.com',
            'password' => bcrypt('password'),
            'superadmin' => true,
            'author' => true
        ]);
    }
}
