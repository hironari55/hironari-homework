<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,3) as $num) {
            $user = new User();
            $user->name = 'hironari' . $num;
            $user->email = 'hironari@hironari' . $num;
            $user->password = 'bonnbonn' . $num;
            $user->save();
        }

    }
}
