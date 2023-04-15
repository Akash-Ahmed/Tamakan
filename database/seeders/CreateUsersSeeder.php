<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=CreateUsersSeeder
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'phone'=>'0147852369',
                'email'=>'rkakash46@gmail.com',
                'is_admin'=>'1',
                'email_verified_token'=>'656565',
                'status'=>'1',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User',
                'phone'=>'0147852369',
                'email'=>'user@gmail.com',
                'is_admin'=>'0',
                'email_verified_token'=>'1',
                'status'=>'0',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
