<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WhyChooseUsSection;

class WhyChooseUsSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WhyChooseUsSection::updateOrCreate(
            ['id' => 1],
            [
                'section_title' => 'Why Choose Us',
                'section_subtitle' => 'Sk Solution Bangladesh is a leading experiential Event Management company in Bangladesh.',
            ]
        );
    }
}
