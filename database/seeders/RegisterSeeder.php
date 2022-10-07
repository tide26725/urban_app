<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Register;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('registers')->delete();

        $data = [
            [
                'prefix' => 'นาย',
                'firstname' => 'ธนวัฒน์',
                'lastname' => 'ลำใย',
                'address' => '4 ม.3 ต.บางกะดี อ.เมือง จ.ปทุมธานี 12000',
                'district_id' => '130112',
                'amphure_id' => '66',
                'province_id' => '13',
                'post_code' => '12000',
                'tel_no' => '0890009999',
                'email' => 'tide@mail.com',
                'age' => 30,
                'residence_mst_id' => 1,
                'farmland_mst_id' => 4,
                'education_lv_mst_id' => 9,
                'career_mst_id' => 13,
                'income_mst_id' => 18,
                'reason_mst_id' => 22,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        Register::insert($data);
    }
}
