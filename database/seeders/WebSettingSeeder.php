<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;
class WebSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebsiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'main_logo' => 'upload/settings/1767050676.png',
                'footer_logo' => 'upload/settings/1767050510.png',
                'favicon' => 'upload/settings/1767050537.png',
                'footer_description' => 'MR SOLUTIONS একটি প্রফেশনাল মাল্টিপল সার্ভিস কোম্পানি, যা আইটি সার্ভিস, ওয়েব ডেভেলপমেন্ট, অ্যাপ ডেভেলপমেন্ট, প্রিন্টিং সার্ভিস, কর্পোরেট গিফট আইটেম এবং ইভেন্ট অ্যাক্টিভেশন সার্ভিস প্রদান করে। আমরা ব্যক্তি ও কর্পোরেট ক্লায়েন্টদের জন্য আধুনিক, কার্যকর এবং নির্ভরযোগ্য সমাধান দিয়ে থাকি। আমাদের লক্ষ্য হলো ক্লায়েন্টের ব্যবসাকে ডিজিটাল ও ক্রিয়েটিভভাবে এগিয়ে নেওয়া। দক্ষ টিম, পরিকল্পিত কাজের ধারা এবং সময়নিষ্ঠ ডেলিভারি এবং একটি বিশ্বাসযোগ্য সার্ভিস ব্র্যান্ড হিসেবে পরিচিতি অর্জন করা। আপনি যদি একটি নির্ভরযোগ্য আইটি ও মাল্টিপল সার্ভিস পার্টনার খুঁজে থাকেন, MR SOLUTIONS আপনার সঠিক পছন্দ।',
                'phone_one' => '+8801734268063',
                'phone_two' => '+880 1977083357',
                'email_one' => 'mrsolutionsbd77@gmail.com',
                'email_two' => 'info@company.com',
                'address' => 'Dhaka, Bangladesh',
                'map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7299.910300657538!2d90.36870314490125!3d23.820193829443316!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1451deb3685%3A0x382345c39c5a6beb!2sMirpur%2011%2FC%20(%20Tara%20medical)%20panir%20pump!5e0!3m2!1sen!2sbd!4v1763926142441!5m2!1sen!2sbd',
                'copy_right' => 'Copyright © 2025 MR Solutions BD. All right reserved.'
            ]
        );
    }
}
