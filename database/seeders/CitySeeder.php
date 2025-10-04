<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            // Egypt - Cairo
            ['id' => 1, 'name' => ['en' => 'Nasr City', 'ar' => 'مدينة نصر'], 'governorate_id' => 1],
            ['id' => 2, 'name' => ['en' => 'Heliopolis', 'ar' => 'مصر الجديدة'], 'governorate_id' => 1],
            ['id' => 3, 'name' => ['en' => 'Maadi', 'ar' => 'المعادي'], 'governorate_id' => 1],
            ['id' => 4, 'name' => ['en' => 'Zamalek', 'ar' => 'الزمالك'], 'governorate_id' => 1],
            ['id' => 5, 'name' => ['en' => 'New Cairo', 'ar' => 'القاهرة الجديدة'], 'governorate_id' => 1],

            // Egypt - Giza
            ['id' => 6, 'name' => ['en' => 'Dokki', 'ar' => 'الدقي'], 'governorate_id' => 2],
            ['id' => 7, 'name' => ['en' => '6th of October', 'ar' => 'السادس من أكتوبر'], 'governorate_id' => 2],
            ['id' => 8, 'name' => ['en' => 'Sheikh Zayed', 'ar' => 'الشيخ زايد'], 'governorate_id' => 2],
            ['id' => 9, 'name' => ['en' => 'Haram', 'ar' => 'الهرم'], 'governorate_id' => 2],
            ['id' => 10, 'name' => ['en' => 'Faisal', 'ar' => 'فيصل'], 'governorate_id' => 2],

            // Egypt - Alexandria
            ['id' => 11, 'name' => ['en' => 'Sidi Gaber', 'ar' => 'سيدي جابر'], 'governorate_id' => 3],
            ['id' => 12, 'name' => ['en' => 'Montaza', 'ar' => 'المنتزة'], 'governorate_id' => 3],
            ['id' => 13, 'name' => ['en' => 'Agami', 'ar' => 'العجمي'], 'governorate_id' => 3],
            ['id' => 14, 'name' => ['en' => 'Borg El Arab', 'ar' => 'برج العرب'], 'governorate_id' => 3],
            ['id' => 15, 'name' => ['en' => 'Miami', 'ar' => 'ميامي'], 'governorate_id' => 3],

            // Egypt - Gharbia
            ['id' => 16, 'name' => ['en' => 'Tanta', 'ar' => 'طنطا'], 'governorate_id' => 4],
            ['id' => 17, 'name' => ['en' => 'Mahalla', 'ar' => 'المحلة الكبرى'], 'governorate_id' => 4],
            ['id' => 18, 'name' => ['en' => 'Kafr El Zayat', 'ar' => 'كفر الزيات'], 'governorate_id' => 4],
            ['id' => 19, 'name' => ['en' => 'Zifta', 'ar' => 'زفتى'], 'governorate_id' => 4],
            ['id' => 20, 'name' => ['en' => 'Samanoud', 'ar' => 'سمنود'], 'governorate_id' => 4],

            // Egypt - Dakahlia
            ['id' => 21, 'name' => ['en' => 'Mansoura', 'ar' => 'المنصورة'], 'governorate_id' => 5],
            ['id' => 22, 'name' => ['en' => 'Talkha', 'ar' => 'طلخا'], 'governorate_id' => 5],
            ['id' => 23, 'name' => ['en' => 'Mit Ghamr', 'ar' => 'ميت غمر'], 'governorate_id' => 5],
            ['id' => 24, 'name' => ['en' => 'Dekernes', 'ar' => 'دكرنس'], 'governorate_id' => 5],
            ['id' => 25, 'name' => ['en' => 'Aga', 'ar' => 'أجا'], 'governorate_id' => 5],

            // Saudi Arabia - Riyadh
            ['id' => 26, 'name' => ['en' => 'Riyadh City', 'ar' => 'مدينة الرياض'], 'governorate_id' => 6],
            ['id' => 27, 'name' => ['en' => 'Diriyah', 'ar' => 'الدرعية'], 'governorate_id' => 6],
            ['id' => 28, 'name' => ['en' => 'Al Kharj', 'ar' => 'الخرج'], 'governorate_id' => 6],
            ['id' => 29, 'name' => ['en' => 'Dawadmi', 'ar' => 'الدوادمي'], 'governorate_id' => 6],
            ['id' => 30, 'name' => ['en' => 'Al Majmaah', 'ar' => 'المجمعة'], 'governorate_id' => 6],

            // Saudi Arabia - Makkah
            ['id' => 31, 'name' => ['en' => 'Mecca', 'ar' => 'مكة'], 'governorate_id' => 7],
            ['id' => 32, 'name' => ['en' => 'Jeddah', 'ar' => 'جدة'], 'governorate_id' => 7],
            ['id' => 33, 'name' => ['en' => 'Taif', 'ar' => 'الطائف'], 'governorate_id' => 7],
            ['id' => 34, 'name' => ['en' => 'Rabigh', 'ar' => 'رابغ'], 'governorate_id' => 7],
            ['id' => 35, 'name' => ['en' => 'Khulais', 'ar' => 'خليص'], 'governorate_id' => 7],

            // Saudi Arabia - Eastern Province
            ['id' => 36, 'name' => ['en' => 'Dammam', 'ar' => 'الدمام'], 'governorate_id' => 8],
            ['id' => 37, 'name' => ['en' => 'Khobar', 'ar' => 'الخبر'], 'governorate_id' => 8],
            ['id' => 38, 'name' => ['en' => 'Dhahran', 'ar' => 'الظهران'], 'governorate_id' => 8],
            ['id' => 39, 'name' => ['en' => 'Jubail', 'ar' => 'الجبيل'], 'governorate_id' => 8],
            ['id' => 40, 'name' => ['en' => 'Qatif', 'ar' => 'القطيف'], 'governorate_id' => 8],

            // Saudi Arabia - Madinah
            ['id' => 41, 'name' => ['en' => 'Medina', 'ar' => 'المدينة المنورة'], 'governorate_id' => 9],
            ['id' => 42, 'name' => ['en' => 'Yanbu', 'ar' => 'ينبع'], 'governorate_id' => 9],
            ['id' => 43, 'name' => ['en' => 'Badr', 'ar' => 'بدر'], 'governorate_id' => 9],
            ['id' => 44, 'name' => ['en' => 'Al Ula', 'ar' => 'العلا'], 'governorate_id' => 9],
            ['id' => 45, 'name' => ['en' => 'Khaybar', 'ar' => 'خيبر'], 'governorate_id' => 9],

            // Saudi Arabia - Asir
            ['id' => 46, 'name' => ['en' => 'Abha', 'ar' => 'أبها'], 'governorate_id' => 10],
            ['id' => 47, 'name' => ['en' => 'Khamis Mushait', 'ar' => 'خميس مشيط'], 'governorate_id' => 10],
            ['id' => 48, 'name' => ['en' => 'Bisha', 'ar' => 'بيشة'], 'governorate_id' => 10],
            ['id' => 49, 'name' => ['en' => 'Muhayil', 'ar' => 'محايل'], 'governorate_id' => 10],
            ['id' => 50, 'name' => ['en' => 'Sarat Abidah', 'ar' => 'سراة عبيدة'], 'governorate_id' => 10],

            // UAE - Dubai
            ['id' => 51, 'name' => ['en' => 'Dubai City', 'ar' => 'دبي'], 'governorate_id' => 11],
            ['id' => 52, 'name' => ['en' => 'Deira', 'ar' => 'ديرة'], 'governorate_id' => 11],
            ['id' => 53, 'name' => ['en' => 'Bur Dubai', 'ar' => 'بر دبي'], 'governorate_id' => 11],
            ['id' => 54, 'name' => ['en' => 'Jumeirah', 'ar' => 'جميرا'], 'governorate_id' => 11],
            ['id' => 55, 'name' => ['en' => 'Dubai Marina', 'ar' => 'دبي مارينا'], 'governorate_id' => 11],

            // UAE - Abu Dhabi
            ['id' => 56, 'name' => ['en' => 'Abu Dhabi City', 'ar' => 'أبو ظبي'], 'governorate_id' => 12],
            ['id' => 57, 'name' => ['en' => 'Al Ain', 'ar' => 'العين'], 'governorate_id' => 12],
            ['id' => 58, 'name' => ['en' => 'Ruwais', 'ar' => 'الرويس'], 'governorate_id' => 12],
            ['id' => 59, 'name' => ['en' => 'Madinat Zayed', 'ar' => 'مدينة زايد'], 'governorate_id' => 12],
            ['id' => 60, 'name' => ['en' => 'Liwa', 'ar' => 'ليوا'], 'governorate_id' => 12],

            // UAE - Sharjah
            ['id' => 61, 'name' => ['en' => 'Sharjah City', 'ar' => 'الشارقة'], 'governorate_id' => 13],
            ['id' => 62, 'name' => ['en' => 'Kalba', 'ar' => 'كلباء'], 'governorate_id' => 13],
            ['id' => 63, 'name' => ['en' => 'Khorfakkan', 'ar' => 'خورفكان'], 'governorate_id' => 13],
            ['id' => 64, 'name' => ['en' => 'Dibba Al-Hisn', 'ar' => 'دبا الحصن'], 'governorate_id' => 13],
            ['id' => 65, 'name' => ['en' => 'Dhaid', 'ar' => 'الذيد'], 'governorate_id' => 13],

            // UAE - Ajman
            ['id' => 66, 'name' => ['en' => 'Ajman City', 'ar' => 'عجمان'], 'governorate_id' => 14],
            ['id' => 67, 'name' => ['en' => 'Manama', 'ar' => 'مصفوت'], 'governorate_id' => 14],
            ['id' => 68, 'name' => ['en' => 'Masfout', 'ar' => 'المنامة'], 'governorate_id' => 14],
            ['id' => 69, 'name' => ['en' => 'Al Nuaimia', 'ar' => 'النعيمية'], 'governorate_id' => 14],
            ['id' => 70, 'name' => ['en' => 'Al Rashidiya', 'ar' => 'الراشدية'], 'governorate_id' => 14],

            // UAE - Ras Al Khaimah
            ['id' => 71, 'name' => ['en' => 'Ras Al Khaimah City', 'ar' => 'رأس الخيمة'], 'governorate_id' => 15],
            ['id' => 72, 'name' => ['en' => 'Digdaga', 'ar' => 'دقداقة'], 'governorate_id' => 15],
            ['id' => 73, 'name' => ['en' => 'Khatt', 'ar' => 'خت'], 'governorate_id' => 15],
            ['id' => 74, 'name' => ['en' => 'Rams', 'ar' => 'رمس'], 'governorate_id' => 15],
            ['id' => 75, 'name' => ['en' => 'Dhayah', 'ar' => 'الضياح'], 'governorate_id' => 15],

            // Jordan - Amman
            ['id' => 76, 'name' => ['en' => 'Amman City', 'ar' => 'عمان'], 'governorate_id' => 16],
            ['id' => 77, 'name' => ['en' => 'Wadi Al-Seer', 'ar' => 'وادي السير'], 'governorate_id' => 16],
            ['id' => 78, 'name' => ['en' => 'Sahab', 'ar' => 'سحاب'], 'governorate_id' => 16],
            ['id' => 79, 'name' => ['en' => 'Al-Jizah', 'ar' => 'الجيزة'], 'governorate_id' => 16],
            ['id' => 80, 'name' => ['en' => 'Naur', 'ar' => 'ناعور'], 'governorate_id' => 16],

            // Jordan - Zarqa
            ['id' => 81, 'name' => ['en' => 'Zarqa City', 'ar' => 'الزرقاء'], 'governorate_id' => 17],
            ['id' => 82, 'name' => ['en' => 'Russeifa', 'ar' => 'الرصيفة'], 'governorate_id' => 17],
            ['id' => 83, 'name' => ['en' => 'Hashimiyah', 'ar' => 'الهاشمية'], 'governorate_id' => 17],
            ['id' => 84, 'name' => ['en' => 'Azraq', 'ar' => 'الأزرق'], 'governorate_id' => 17],
            ['id' => 85, 'name' => ['en' => 'Dhlail', 'ar' => 'الضليل'], 'governorate_id' => 17],

            // Jordan - Irbid
            ['id' => 86, 'name' => ['en' => 'Irbid City', 'ar' => 'إربد'], 'governorate_id' => 18],
            ['id' => 87, 'name' => ['en' => 'Ramtha', 'ar' => 'الرمثا'], 'governorate_id' => 18],
            ['id' => 88, 'name' => ['en' => 'Mafraq', 'ar' => 'المفرق'], 'governorate_id' => 18],
            ['id' => 89, 'name' => ['en' => 'Ajloun', 'ar' => 'عجلون'], 'governorate_id' => 18],
            ['id' => 90, 'name' => ['en' => 'Jerash', 'ar' => 'جرش'], 'governorate_id' => 18],

            // Jordan - Aqaba
            ['id' => 91, 'name' => ['en' => 'Aqaba City', 'ar' => 'العقبة'], 'governorate_id' => 19],
            ['id' => 92, 'name' => ['en' => 'Quweira', 'ar' => 'القويرة'], 'governorate_id' => 19],
            ['id' => 93, 'name' => ['en' => 'Wadi Rum', 'ar' => 'وادي رم'], 'governorate_id' => 19],
            ['id' => 94, 'name' => ['en' => 'Disah', 'ar' => 'ديسة'], 'governorate_id' => 19],
            ['id' => 95, 'name' => ['en' => 'Al-Durra', 'ar' => 'الدرة'], 'governorate_id' => 19],

            // Jordan - Balqa
            ['id' => 96, 'name' => ['en' => 'Salt', 'ar' => 'السلط'], 'governorate_id' => 20],
            ['id' => 97, 'name' => ['en' => 'Fuheis', 'ar' => 'الفحيص'], 'governorate_id' => 20],
            ['id' => 98, 'name' => ['en' => 'Shuneh', 'ar' => 'الشونة'], 'governorate_id' => 20],
            ['id' => 99, 'name' => ['en' => 'Deir Alla', 'ar' => 'دير علا'], 'governorate_id' => 20],
            ['id' => 100, 'name' => ['en' => 'Mahis', 'ar' => 'ماحص'], 'governorate_id' => 20],

            // Kuwait - Capital
            ['id' => 101, 'name' => ['en' => 'Kuwait City', 'ar' => 'مدينة الكويت'], 'governorate_id' => 21],
            ['id' => 102, 'name' => ['en' => 'Shuwaikh', 'ar' => 'الشويخ'], 'governorate_id' => 21],
            ['id' => 103, 'name' => ['en' => 'Dasman', 'ar' => 'دسمان'], 'governorate_id' => 21],
            ['id' => 104, 'name' => ['en' => 'Sharq', 'ar' => 'شرق'], 'governorate_id' => 21],
            ['id' => 105, 'name' => ['en' => 'Kaifan', 'ar' => 'كيفان'], 'governorate_id' => 21],

            // Kuwait - Hawalli
            ['id' => 106, 'name' => ['en' => 'Hawalli City', 'ar' => 'حولي'], 'governorate_id' => 22],
            ['id' => 107, 'name' => ['en' => 'Salmiya', 'ar' => 'السالمية'], 'governorate_id' => 22],
            ['id' => 108, 'name' => ['en' => 'Rumaithiya', 'ar' => 'الرميثية'], 'governorate_id' => 22],
            ['id' => 109, 'name' => ['en' => 'Jabriya', 'ar' => 'الجابرية'], 'governorate_id' => 22],
            ['id' => 110, 'name' => ['en' => 'Mishref', 'ar' => 'مشرف'], 'governorate_id' => 22],

            // Kuwait - Farwaniya
            ['id' => 111, 'name' => ['en' => 'Farwaniya City', 'ar' => 'الفروانية'], 'governorate_id' => 23],
            ['id' => 112, 'name' => ['en' => 'Jleeb Al-Shuyoukh', 'ar' => 'جليب الشيوخ'], 'governorate_id' => 23],
            ['id' => 113, 'name' => ['en' => 'Abdullah Al-Mubarak', 'ar' => 'عبدالله المبارك'], 'governorate_id' => 23],
            ['id' => 114, 'name' => ['en' => 'Khaitan', 'ar' => 'خيطان'], 'governorate_id' => 23],
            ['id' => 115, 'name' => ['en' => 'Andalous', 'ar' => 'الأندلس'], 'governorate_id' => 23],

            // Kuwait - Ahmadi
            ['id' => 116, 'name' => ['en' => 'Ahmadi City', 'ar' => 'الأحمدي'], 'governorate_id' => 24],
            ['id' => 117, 'name' => ['en' => 'Fahaheel', 'ar' => 'الفحيحيل'], 'governorate_id' => 24],
            ['id' => 118, 'name' => ['en' => 'Mangaf', 'ar' => 'المنقف'], 'governorate_id' => 24],
            ['id' => 119, 'name' => ['en' => 'Abu Halifa', 'ar' => 'أبو حليفة'], 'governorate_id' => 24],
            ['id' => 120, 'name' => ['en' => 'Sabah Al-Ahmad', 'ar' => 'صباح الأحمد'], 'governorate_id' => 24],

            // Kuwait - Jahra
            ['id' => 121, 'name' => ['en' => 'Jahra City', 'ar' => 'الجهراء'], 'governorate_id' => 25],
            ['id' => 122, 'name' => ['en' => 'Qasr', 'ar' => 'القصر'], 'governorate_id' => 25],
            ['id' => 123, 'name' => ['en' => 'Taima', 'ar' => 'تيماء'], 'governorate_id' => 25],
            ['id' => 124, 'name' => ['en' => 'Sulaibiya', 'ar' => 'الصليبية'], 'governorate_id' => 25],
            ['id' => 125, 'name' => ['en' => 'Amghara', 'ar' => 'أمغرة'], 'governorate_id' => 25],
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert([
                'id' => $city['id'],
                'name' => json_encode($city['name']),
                'governorate_id' => $city['governorate_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
