<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            [
                "id" => 1, "phone_code" => "+20", "flag_code" => "EG", "name" => ["en" => "Egypt", "ar" => "مصر"],
            ],
            [
                "id" => 2, "phone_code" => "+966", "flag_code" => "SA", "name" => ["en" => "Saudi Arabia", "ar" => "المملكة العربية السعودية"],
            ],
            [
                "id" => 3, "phone_code" => "+971", "flag_code" => "AE", "name" => ["en" => "United Arab Emirates", "ar" => "الإمارات العربية المتحدة"],
            ],
            [
                "id" => 4, "phone_code" => "+962", "flag_code" => "JO", "name" => ["en" => "Jordan", "ar" => "الأردن"],
            ],
            [
                "id" => 5, "phone_code" => "+965", "flag_code" => "KW", "name" => ["en" => "Kuwait", "ar" => "الكويت"],
            ],
        ];

        foreach ($countries as $country) {
            DB::table('countries')->insert([
                'id' => $country['id'],
                'phone_code' => $country['phone_code'],
                'flag_code' => $country['flag_code'],
                'name' => json_encode($country['name']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
