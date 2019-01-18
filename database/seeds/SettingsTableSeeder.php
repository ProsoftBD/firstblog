<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     */
    public function run()
    {
        Setting::create([
            'favicon' => 'uploads/favicon/favicon.ico',
            'site_about'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum modi cumque perferendis, omnis aliquid neque voluptate autem enim fugit quae nemo molestias in officia nobis eos velit quis vitae. Deserunt',
            'site_name' => 'Laravel\'s Blog Site',
            'contact_number' => '01712121212',
            'contact_email' => 'support@blog.com',
            'available_time' => 'Mon-Fri 9am-6pm',
            'street_address' => 'Dattapara, Khagan',
            'address' => 'Ashulia, Dhaka',
        ]);
    }
}
