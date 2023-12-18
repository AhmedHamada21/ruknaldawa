<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        Setting::create([
            'name' => 'test',
            'address' => 'test',
            'phone' => 'test',
            'email' => 'test@test.com',
            'facebook' =>'facebook',
            'linkedin' => 'linkedin',
            'twitter' => 'twitter',
            'logo' => 'logo',
        ]);
    }
}
