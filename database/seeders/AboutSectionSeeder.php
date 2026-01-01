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
        'title' => 'MR SOLUTIONS-এ আপনাকে স্বাগতম',
        'description' => 'MR SOLUTIONS একটি প্রফেশনাল মাল্টিপল সার্ভিস কোম্পানি, যা আইটি সার্ভিস, ওয়েব ডেভেলপমেন্ট, অ্যাপ ডেভেলপমেন্ট, প্রিন্টিং সার্ভিস, কর্পোরেট গিফট আইটেম এবং ইভেন্ট অ্যাক্টিভেশন সার্ভিস প্রদান করে। আমরা ব্যক্তি ও কর্পোরেট ক্লায়েন্টদের জন্য আধুনিক, কার্যকর এবং নির্ভরযোগ্য সমাধান দিয়ে থাকি। আমাদের লক্ষ্য হলো ক্লায়েন্টের ব্যবসাকে ডিজিটাল ও ক্রিয়েটিভভাবে এগিয়ে নেওয়া। দক্ষ টিম, পরিকল্পিত কাজের ধারা এবং সময়নিষ্ঠ ডেলিভারি এবং একটি বিশ্বাসযোগ্য সার্ভিস ব্র্যান্ড হিসেবে পরিচিতি অর্জন করা। আপনি যদি একটি নির্ভরযোগ্য আইটি ও মাল্টিপল সার্ভিস পার্টনার খুঁজে থাকেন, MR SOLUTIONS আপনার সঠিক পছন্দ।',
        'image' => 'default.jpg',
        'status' => true,
        ]);
    }
}
