<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->delete();

        $data = [
            [
                'course_name' => 'การปลูกผักคนเมือง',
                'quota' => 55,
                'quota_max' => 65,
                'start_time' => '09:30:00',
                'end_time' => '12:00:00',
                'course_group' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'การเพาะต้นอ่อนผักงอกสำหรับคนเมือง',
                'quota' => 40,
                'quota_max' => 50,
                'start_time' => '09:30:00',
                'end_time' => '10:30:00',
                'course_group' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'น้ำเต้าหู้ทรงเครื่อง',
                'quota' => 35,
                'quota_max' => 45,
                'start_time' => '09:30:00',
                'end_time' => '10:30:00',
                'course_group' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'การเพาะเห็ดฟางในตะกร้า',
                'quota' => 35,
                'quota_max' => 45,
                'start_time' => '09:30:00',
                'end_time' => '10:30:00',
                'course_group' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'การเพาะต้นอ่อนผักงอกสำหรับคนเมือง',
                'quota' => 40,
                'quota_max' => 50,
                'start_time' => '10:45:00',
                'end_time' => '12:00:00',
                'course_group' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'น้ำเต้าหู้ทรงเครื่อง',
                'quota' => 35,
                'quota_max' => 45,
                'start_time' => '10:45:00',
                'end_time' => '12:00:00',
                'course_group' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'การเพาะเห็ดฟางในตะกร้า',
                'quota' => 35,
                'quota_max' => 45,
                'start_time' => '10:45:00',
                'end_time' => '12:00:00',
                'course_group' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'การปลูกผักคนเมือง',
                'quota' => 55,
                'quota_max' => 65,
                'start_time' => '13:30:00',
                'end_time' => '16:00:00',
                'course_group' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'การเพาะต้นอ่อนผักงอกสำหรับคนเมือง',
                'quota' => 40,
                'quota_max' => 50,
                'start_time' => '13:30:00',
                'end_time' => '14:30:00',
                'course_group' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'ก๋วยเตี๋ยวลุยสวนจากผักงอก',
                'quota' => 35,
                'quota_max' => 45,
                'start_time' => '13:30:00',
                'end_time' => '14:30:00',
                'course_group' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'การเพาะเห็ดฟางในตะกร้า',
                'quota' => 35,
                'quota_max' => 45,
                'start_time' => '13:30:00',
                'end_time' => '14:30:00',
                'course_group' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'การเพาะต้นอ่อนผักงอกสำหรับคนเมือง',
                'quota' => 40,
                'quota_max' => 50,
                'start_time' => '14:45:00',
                'end_time' => '16:00:00',
                'course_group' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'ก๋วยเตี๋ยวลุยสวนจากผักงอก',
                'quota' => 35,
                'quota_max' => 45,
                'start_time' => '14:45:00',
                'end_time' => '16:00:00',
                'course_group' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'course_name' => 'การเพาะเห็ดฟางในตะกร้า',
                'quota' => 35,
                'quota_max' => 45,
                'start_time' => '14:45:00',
                'end_time' => '16:00:00',
                'course_group' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Course::insert($data);
    }
}
