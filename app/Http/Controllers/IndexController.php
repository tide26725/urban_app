<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\RegisterCourse;

class IndexController extends Controller
{
    public function index()
    {

        $register_course = $this->getRegisterCourse();

        $count_course_id_1 = $register_course->where('course_id', 1)->count();
        $count_course_id_2 = $register_course->where('course_id', 2)->count();
        $count_course_id_3 = $register_course->where('course_id', 3)->count();
        $count_course_id_4 = $register_course->where('course_id', 4)->count();
        $count_course_id_5 = $register_course->where('course_id', 5)->count();
        $count_course_id_6 = $register_course->where('course_id', 6)->count();
        $count_course_id_7 = $register_course->where('course_id', 7)->count();
        $count_course_id_8 = $register_course->where('course_id', 8)->count();
        $count_course_id_9 = $register_course->where('course_id', 9)->count();
        $count_course_id_10 = $register_course->where('course_id', 10)->count();
        $count_course_id_11 = $register_course->where('course_id', 11)->count();
        $count_course_id_12 = $register_course->where('course_id', 12)->count();
        $count_course_id_13 = $register_course->where('course_id', 13)->count();
        $count_course_id_14 = $register_course->where('course_id', 14)->count();

        $courses = Course::all();
        //dd($courses['0']->quota_max);

        return view('index', compact  (
            'count_course_id_1',
            'count_course_id_2',
            'count_course_id_3',
            'count_course_id_4',
            'count_course_id_5',
            'count_course_id_6',
            'count_course_id_7',
            'count_course_id_8',
            'count_course_id_9',
            'count_course_id_10',
            'count_course_id_11',
            'count_course_id_12',
            'count_course_id_13',
            'count_course_id_14',
            'courses'
            ));

    }

    public function getRegisterCourse()
    {
        return RegisterCourse::where('is_delete', 0)
        ->whereNotIn('status', [2])
        ->get('course_id');


    }


    // public function getCourse()
    // {
    //     return Course::all('course_id');
    // }

    // public function countRegisterCourse()
    // {
    //     $register_course = $this->getRegisterCourse();
    //     $courses = $this->getCourse();
    //     $all_course = collect();

    //     foreach ($courses as $course) {
    //         $course_count = collect();

    //         $filtered = $register_course->where('course_id', $course->course_id);
    //         $count = $filtered->count();

    //         $course_count->put('course_id', $course->course_id);
    //         $course_count->put('count', $count);

    //         $all_course->push($course_count);
    //     }

    //     return $all_course->all();
    // }


}
