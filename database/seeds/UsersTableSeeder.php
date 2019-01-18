<?php

use App\User;
use App\Profile;
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
        $user = User::create([
            'name' => 'Joyanto Kumar Sarkar',
            'email' => 'joyanto@gmail.com',
            'password' => bcrypt('joyanto'),
            'admin' => 1,
        ]);

        Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/avatar.png',
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.    Quibusdam dolor totam ipsum optio molestias.',
            'facebook' => 'http://www.facebook.com/joyanto/',
            'youtube' => 'http://www.youtube.com/joyanto/'
        ]);
    }
}
