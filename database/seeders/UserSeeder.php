<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {
        $user = new User([
            'name' => "admin",
            'last_name' => "super",
            'phone' => "3122222222",
            'address' => "cra 1 con 12-21 ",
            'email' => "admin@gmail.com",
            'password' => 'admin123',
            'remember_token' => Str::random(10),
        ]);
        $user->save();
        $user->assignRole('admin');
        $file = new File(['route' => '/storage/images/users/default.png']);
        $user->file()->save($file);
    }
}
