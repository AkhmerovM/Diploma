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
        User::truncate();

        User::create([
            'name'     => 'Nuruzzaman Milon',
            'email'    => 'contact@milon.im',
            'ipAddress'    => '168.32.32.111',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);
        User::create([
            'name'     => 'Max',
            'ipAddress'    => '176.12.65.211',
            'email'    => 'cont1act@milon.im',
            'password' => bcrypt('password'),
            'is_admin' => true
        ]);
    }
}
