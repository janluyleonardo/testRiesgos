<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Janluy Leonardo Moreno Coronado',
            'email' => 'janluy.moreno@gmail.com',
            'password' => Hash::make('1234567890')
        ]);
        for ($i = 0; $i < 10; $i++) {
            // $user = Str::random(10);
            $user = "Usuario_" . $i;
            DB::table('users')->insert([
                'name' => $user,
                'email' => $user . '@example.com',
                'password' => Hash::make('1234567890'),
            ]);
        }
    }
}
