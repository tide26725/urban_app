<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\RegisterCourse;
use Illuminate\Support\Facades\DB;

class SearchRegisterCourseController extends Controller
{
    public function index()
    {
        $user_registers = null;
        $course_id = null;
        $course_name = null;
        $start_time = null;
        $end_time = null;
        //$user_registers = $this->getRegisterInCourse($course_id == null);

        return view('search_register_course',compact('user_registers','course_id','course_name','start_time','end_time'));
    }

    public function getRegisterInCourse(Request $request) 
    {
        //dd($course_id);
        $user_registers =  DB::table('register_courses')
                            ->leftjoin('registers','registers.register_id','register_courses.register_id')
                            ->where('register_courses.course_id', $request->course_id)
                            ->where('register_courses.status', 1)
                            ->where('register_courses.is_delete', 0)
                            ->orderby('register_courses.created_at', 'asc')
                            ->select('registers.prefix','registers.firstname','registers.lastname')
                            ->get();

//dd($user_registers);
            $course = Course::where('course_id',$request->course_id)->select('course_name','course_id','start_time','end_time')->first();
            $course_name = $course->course_name;
            $course_id = $course->course_id;
            $start_time = $course->start_time;
            $end_time = $course->end_time;
            return view('search_register_course', compact('user_registers','course_id','course_name','start_time','end_time'));

        
    }
}
