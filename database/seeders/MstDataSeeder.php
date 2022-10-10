<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\MstData;

class MstDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_data')->delete();

        $data = [
            [
                'mst_group_id' => 1,
                'mst_name' => 'บ้านเดี่ยว'
            ],
            [
                'mst_group_id' => 1,
                'mst_name' => 'ทาวน์โฮม /ทาว์เฮ้าส์'
            ],
            [
                'mst_group_id' => 1,
                'mst_name' => 'ห้องพัก/คอนโด/อพาร์ทเม้นท์'
            ],
            [
                'mst_group_id' => 2,
                'mst_name' => 'ไม่เกิน 50 ตารางเมตร'
            ],
            [
                'mst_group_id' => 2,
                'mst_name' => 'มากกว่า 50 ตารางเมตร'
            ],
            [
                'mst_group_id' => 2,
                'mst_name' => 'ไม่มี(ปลูกในกระถาง)'
            ],
            [
                'mst_group_id' => 3,
                'mst_name' => 'ปริญญาตรีหรือสูงกว่า'
            ],
            [
                'mst_group_id' => 3,
                'mst_name' => 'มัธยมศึกษาตอนต้น'
            ],
            [
                'mst_group_id' => 3,
                'mst_name' => 'ประถมศึกษา'
            ],
            [
                'mst_group_id' => 3,
                'mst_name' => 'ต่ำกว่าประถมศึกษา'
            ],
            [
                'mst_group_id' => 4,
                'mst_name' => 'เกษตรกร'
            ],
            [
                'mst_group_id' => 4,
                'mst_name' => 'ค้าขาย/ธุรกิจส่วนตัว'
            ],
            [
                'mst_group_id' => 4,
                'mst_name' => 'รับจ้าง/ใช้แรงงาน'
            ],
            [
                'mst_group_id' => 4,
                'mst_name' => 'งานประจำ'
            ],
            [
                'mst_group_id' => 4,
                'mst_name' => 'นักเรียน/นักศึกษา'
            ],
            [
                'mst_group_id' => 4,
                'mst_name' => 'ว่างงาน'
            ],
            [
                'mst_group_id' => 5,
                'mst_name' => 'ไม่มีรายได้'
            ],
            [
                'mst_group_id' => 5,
                'mst_name' => 'ไม่เกิน 9,000 บาท'
            ],
            [
                'mst_group_id' => 5,
                'mst_name' => '9,001 - 20,000 บาท'
            ],
            [
                'mst_group_id' => 5,
                'mst_name' => 'มากกว่า 20,001 บาท'
            ],
            [
                'mst_group_id' => 6,
                'mst_name' => 'ต้องการประกอบอาชีพอิสระ'
            ],
            [
                'mst_group_id' => 6,
                'mst_name' => 'ต้องการมีอาชีพเสริม นอกเหนืออาชีพการงานประจำ'
            ],
            [
                'mst_group_id' => 6,
                'mst_name' => 'เพื่อสำหรับใช้ในชีวิตประจำวัน'
            ],
            [
                'mst_group_id' => 6,
                'mst_name' => 'เพื่อศึกษาหาความรู้'
            ],

        ];

        MstData::insert($data);
    }
}
