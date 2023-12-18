<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();

        for ($i = 0, $ii = 3; $i < $ii; $i++) {
            Category::create([

                'name' => 'test',

            ]);
        }
        Schema::enableForeignKeyConstraints();


    }
}
