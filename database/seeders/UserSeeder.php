<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('users')->truncate();
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password'=> Hash::make(123456789),
            'is_admin'=> 1,
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password'=> Hash::make(123456789),
            'is_admin'=> 0,
        ]);

        Schema::enableForeignKeyConstraints();

    }
}
