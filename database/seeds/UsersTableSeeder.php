<?php

use App\User;
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
        User::create([
            'name' =>'test',
            'email' => 'testtest@gmail.com',
            'password'=> bcrypt('testtest'),
        ]);
        User::create([
            'name' =>'milan',
            'email' => 'milancomi96@gmail.com',
            'password'=> bcrypt('12341234'),
        ]);


    User::create([
        'name' =>'test2',
        'email' => 'testtest2@gmail.com',
        'password'=> bcrypt('testtest'),
    ]);
}

}
