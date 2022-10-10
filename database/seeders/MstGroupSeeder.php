<?php

namespace Database\Seeders;

use App\Models\MstGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class MstGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_groups')->delete();

        $data = [
            [
               'mst_group_name' => 'ลักษณะที่พักอาศัย'
            ],
            [
                'mst_group_name' => 'พื้นที่ทำการเกษตร'
             ],
             [
                'mst_group_name' => 'ระดับการศึกษา'
             ],
             [
                'mst_group_name' => 'อาชีพ'
             ],
             [
                'mst_group_name' => 'รายได้ต่อเดือน'
             ],
             [
                'mst_group_name' => 'เหตุผลที่เข้ารับการฝึกอบรม'
             ],
            
        ];

        MstGroup::insert($data);
    }
}
