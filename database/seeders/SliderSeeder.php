<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->truncate();

        for ($i = 0, $ii = 3; $i < $ii; $i++) {
            Slider::create([
                'photo' => 'test',
                'name' => 'test',
                'notes' => 'notes',
            ]);
        }

    }
}
