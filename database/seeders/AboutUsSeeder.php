<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('about_us')->truncate();
        AboutUs::create([
            'text' => 'test',
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
