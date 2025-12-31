<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OurMission;

class OurMissionSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         OurMission::updateOrCreate(
        ['id' => 1],
        [
            'small_title'        => 'Our Journey',
            'title'              => 'Our Mission',
            'description'        => 'Our mission is to eliminate the fear of complicated processing systems for acquiring visa/travel permits from every international traveler and help every government to make efficient & informed visa decisions.',
            'top_left_image'          => 'top_left_image_default.jpg',
            'top_right_image'  => 'top_right_image_default.webp',
            'bottom_image' => 'bottom_image_default.png',
            'status'             => true,
        ]);
    }
}
