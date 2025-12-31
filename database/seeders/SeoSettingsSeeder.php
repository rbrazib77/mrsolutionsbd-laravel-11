<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeoSetting;

class SeoSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            'home',
            'about',
            'services',
            'contact',
            'privacy-policy',
            'faq',
            'gallery',
        ];

        foreach ($pages as $page) {
            SeoSetting::updateOrCreate(
                ['page_name' => $page],
                [
                    'meta_title'       => ucfirst($page) . ' - My Website',
                    'meta_description' => 'This is the SEO description for ' . ucfirst($page) . ' page.',
                    'meta_keywords'    => $page . ', my website, best services',
                    'og_image'         => null,
                ]
            );
        }
    }
}
