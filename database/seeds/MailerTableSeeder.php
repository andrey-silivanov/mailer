<?php

use Illuminate\Database\Seeder;

class MailerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Mail::create(['user_id' => 1,
                'address' => 'mike@mail.com',
                'title' => 'seed',
                'body' => 'test yes tes test'
        ]);
        \App\Models\Mail::create(['user_id' => 1,
            'address' => 'mike@mail.com',
            'title' => 'seed',
            'body' => 'test yes tes test'
        ]);
        \App\Models\Mail::create(['user_id' => 1,
            'address' => 'tom@mail.com',
            'title' => 'seed1',
            'body' => 'test1 yes tes test'
        ]);
        \App\Models\Mail::create(['user_id' => 1,
            'address' => 'jo@mail.com',
            'title' => 'seed3',
            'body' => 'tes3t yes tes test'
        ]);
    }
}
