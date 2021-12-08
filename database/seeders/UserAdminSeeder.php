<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where(['name' => 'admin'])->first()) {
            User::insert([
                'name' => 'admin',
                'email' => 'vic-design@bk.ru',
                'password' => Hash::make('12345qwe'),
                'email_verified_at' => Carbon::now()
            ]);
        }
    }
}
