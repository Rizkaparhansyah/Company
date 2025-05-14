<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'password' => bcrypt('123456'),
                'level' => 1,
                'email' => 'rzk@gmail.com'
            ],
            [
                'name' => 'User1',
                'username' => 'User1',
                'password' => bcrypt('123456'),
                'level' => 2,
                'email' => 'user1@gmail.com'
            ],
            [
                'name' => 'User2',
                'username' => 'User2',
                'password' => bcrypt('123456'),
                'level' => 3,
                'email' => 'user2@gmail.com'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
