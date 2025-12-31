<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       AboutSection::updateOrCreate(
        ['id' => 1],
        [
            'small_title'        => 'About SK Solutions!',
            'title'              => 'What is SK Solutions',
            'description'        => 'SK Solutions Event Management is a full-service event planning company specializing  in delivering creative, customized, and seamless event experiences. From corporate gatherings and weddings to concerts and brand activations, we handle every detail with precision and passion to make your vision a reality.',
            'top_image'          => 'top_default.jpg',
            'bottom_left_image'  => 'bottom_left_default.jpg',
            'bottom_right_image' => 'bottom_right_default.jpg',
            'status'             => true,
        ]);
    }
}
