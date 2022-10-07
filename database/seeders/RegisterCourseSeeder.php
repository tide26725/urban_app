<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\RegisterCourse;

class RegisterCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('register_courses')->delete();

        $data = [
            [
                'course_id' => '2',
                'register_id' => '1',
                'number_sequence' => null,
                'course_name' => 'การเพาะต้นอ่อนผักงอกสำหรับคนเมือง',
                'start_time' => '09:30:00',
                'end_time' => '10:30:00',
                'course_group' => 2,
                'status' => 0,
                'approved_by' => null,
                'approved_datetime' => null,
                'canceled_by' => null,
                'canceled_datetime' => null,
                'is_delete' => 0,
                'deleted_by' => null,
                'deleted_datetime' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        RegisterCourse::insert($data);
    }
}
