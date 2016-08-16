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
        $nikolay = new User();
        $nikolay->first_name = 'Nikolay';
        $nikolay->last_name = 'Naydenov';
        $nikolay->name = 'nick1697';
        $nikolay->email = 'nikolayynayydenov@gmail.com';
        $nikolay->password = bcrypt('qwerty');
        $nikolay->avatar = 'default.png';
        $nikolay->save();

        $sevgin = new User();
        $sevgin->first_name = 'Sevgin';
        $sevgin->last_name = 'Mustafov';
        $sevgin->name = 'sMustafov';
        $sevgin->email = 'sevgin95@gmail.com';
        $sevgin->password = bcrypt('qwerty');
        $sevgin->avatar = 'default.png';
        $sevgin->save();

        $yovcho = new User();
        $yovcho->first_name = 'Yovcho';
        $yovcho->last_name = 'Kalev';
        $yovcho->name = 'YovchoKalev';
        $yovcho->email = 'yovchokalev@gmail.com';
        $yovcho->password = bcrypt('qwerty');
        $yovcho->avatar = 'default.png';
        $yovcho->save();
    }
}
