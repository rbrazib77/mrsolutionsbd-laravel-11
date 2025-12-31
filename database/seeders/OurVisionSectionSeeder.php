<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OurVision;

class OurVisionSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OurVision::updateOrCreate(
        ['id' => 1],
        [
            'small_title'        => 'Our Journey',
            'title'              => 'Our Vision',
            'description'        => 'Our Vision is to significantly minimize human intervention, maximize virtual       communications, and include computerized service processes in the travel document acquisition system. We believe it will create a borderless travel experience for every international traveler.',
            'top_image'          => 'top_default.jpg',
            'bottom_left_image'  => 'bottom_left_default.jpg',
            'bottom_right_image' => 'bottom_right_default.jpg',
            'status'             => true,
        ]);
    }
}
