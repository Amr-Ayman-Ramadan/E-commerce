<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GovernorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $governorates = [
            // Egypt
            ['id' => 1, 'name' => ['en' => 'Cairo', 'ar' => 'القاهرة'], 'country_id' => 1],
            ['id' => 2, 'name' => ['en' => 'Giza', 'ar' => 'الجيزة'], 'country_id' => 1],
            ['id' => 3, 'name' => ['en' => 'Alexandria', 'ar' => 'الإسكندرية'], 'country_id' => 1],
            ['id' => 4, 'name' => ['en' => 'Gharbia', 'ar' => 'الغربية'], 'country_id' => 1],
            ['id' => 5, 'name' => ['en' => 'Dakahlia', 'ar' => 'الدقهلية'], 'country_id' => 1],

            // Saudi Arabia
            ['id' => 6, 'name' => ['en' => 'Riyadh', 'ar' => 'الرياض'], 'country_id' => 2],
            ['id' => 7, 'name' => ['en' => 'Makkah', 'ar' => 'مكة المكرمة'], 'country_id' => 2],
            ['id' => 8, 'name' => ['en' => 'Eastern Province', 'ar' => 'المنطقة الشرقية'], 'country_id' => 2],
            ['id' => 9, 'name' => ['en' => 'Madinah', 'ar' => 'المدينة المنورة'], 'country_id' => 2],
            ['id' => 10, 'name' => ['en' => 'Asir', 'ar' => 'عسير'], 'country_id' => 2],

            // United Arab Emirates
            ['id' => 11, 'name' => ['en' => 'Dubai', 'ar' => 'دبي'], 'country_id' => 3],
            ['id' => 12, 'name' => ['en' => 'Abu Dhabi', 'ar' => 'أبو ظبي'], 'country_id' => 3],
            ['id' => 13, 'name' => ['en' => 'Sharjah', 'ar' => 'الشارقة'], 'country_id' => 3],
            ['id' => 14, 'name' => ['en' => 'Ajman', 'ar' => 'عجمان'], 'country_id' => 3],
            ['id' => 15, 'name' => ['en' => 'Ras Al Khaimah', 'ar' => 'رأس الخيمة'], 'country_id' => 3],

            // Jordan
            ['id' => 16, 'name' => ['en' => 'Amman', 'ar' => 'عمان'], 'country_id' => 4],
            ['id' => 17, 'name' => ['en' => 'Zarqa', 'ar' => 'الزرقاء'], 'country_id' => 4],
            ['id' => 18, 'name' => ['en' => 'Irbid', 'ar' => 'إربد'], 'country_id' => 4],
            ['id' => 19, 'name' => ['en' => 'Aqaba', 'ar' => 'العقبة'], 'country_id' => 4],
            ['id' => 20, 'name' => ['en' => 'Balqa', 'ar' => 'البلقاء'], 'country_id' => 4],

            // Kuwait
            ['id' => 21, 'name' => ['en' => 'Capital', 'ar' => 'العاصمة'], 'country_id' => 5],
            ['id' => 22, 'name' => ['en' => 'Hawalli', 'ar' => 'حولي'], 'country_id' => 5],
            ['id' => 23, 'name' => ['en' => 'Farwaniya', 'ar' => 'الفروانية'], 'country_id' => 5],
            ['id' => 24, 'name' => ['en' => 'Ahmadi', 'ar' => 'الأحمدي'], 'country_id' => 5],
            ['id' => 25, 'name' => ['en' => 'Jahra', 'ar' => 'الجهراء'], 'country_id' => 5],
        ];

        foreach ($governorates as $governorate) {
            DB::table('governorates')->insert([
                'id' => $governorate['id'],
                'name' => json_encode($governorate['name']),
                'country_id' => $governorate['country_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
