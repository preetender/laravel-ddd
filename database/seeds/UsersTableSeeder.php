<?php

use Illuminate\Database\Seeder;

use App\Domain\Auth\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'César Augusto',
            'email' => 'cesinhagutierres@gmail.com',
            'type' => 'dev',
            'password' => 123456
        ]);

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'type' => 'client',
            'password' => 123456
        ]);
    }
}
