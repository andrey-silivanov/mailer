<?php

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
        User::create(['id' => 1,
        'name' => 'test',
        'email' => 'test.mailer2016.laravel@gmail.com',
        'password' => '$2y$10$Z5S/6DUUph3av2kkbL2k..q2lpNlCZ7umPAf9m/65kiJ5Q8P5LXsW'
        ]);
    }
}
