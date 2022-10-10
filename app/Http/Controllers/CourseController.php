<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Register;
use App\Models\RegisterCourse;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($course_id)
    {
        $user_in_course = DB::table('register_courses')
            ->leftJoin('registers', 'register_courses.register_id', 'registers.register_id')
            ->where('register_courses.course_id', $course_id)
            ->where('is_delete', 0)
            ->select('register_courses.register_course_id', 'register_courses.status', 'register_courses.created_at', 'registers.firstname', 'registers.lastname', 'registers.tel_no', 'registers.age')
            ->orderby('register_courses.created_at','asc')
            ->get();

        /**รายละเอียดคอร์ส */
        $course_detail = Course::where('course_id', $course_id)->first();

        /**จำนวนผู้ลงทะเบียนคอร์สนี้ทั้งหมด */
        $count = $user_in_course->count();

        /**จำนวนผู้ยืนยันเข้าร่วม */
        $filtered_approve = $user_in_course->where('status', '==', 1);
        $count_approve = $filtered_approve->count();

        /**จำนวนผู้ยืนยันปฏิเสธ */
        $filtered_cancel = $user_in_course->where('status', '==', 2);
        $count_cancel = $filtered_cancel->count();


        return view('course', compact('user_in_course', 'count', 'course_detail', 'count_approve', 'count_cancel'));
    }

    public function confirm($register_course_id)
    {
        $data = [
            'status' => 1,
            'approved_by' => auth()->user()->id,
            'approved_datetime' => Carbon::now()
        ];

        $course_id = RegisterCourse::where('register_course_id', $register_course_id)->first();

        $course = Course::where('course_id', $course_id->course_id)->first();

        $count = RegisterCourse::where('course_id', $course_id->course_id)
                                ->where('is_delete', 0)
                                ->count();

        if ($count > $course->quota_max) {
            // dd($course->quota_max);
            return redirect()->route('course.view', $course_id->course_id)->with('error', 'ครบจำนวนที่กำหนด');
            
        } else {

            $result = RegisterCourse::where('register_course_id', $register_course_id)->update($data);

            if ($result) {
                return redirect()->route('course.view', $course_id->course_id)->with('success', 'อนุมัติรายการสำเร็จ');
            } else {
                return redirect()->route('course.view', $course_id->course_id)->with('error', 'ไม่สามารถอนุมัติรายการได้ กรุณาลองใหม่');
            }
        }
    }

    public function cancel($register_course_id)
    {
        $data = [
            'status' => 2,
            'canceled_by' => auth()->user()->id,
            'canceled_datetime' => Carbon::now()
        ];

        $course = RegisterCourse::where('register_course_id', $register_course_id)->first();
        $result = RegisterCourse::where('register_course_id', $register_course_id)->update($data);

        if ($result) {
            return redirect()->route('course.view', $course->course_id)->with('success', 'ปฏิเสธรายการสำเร็จ');
        } else {
            return redirect()->route('course.view', $course->course_id)->with('error', 'ไม่สามารถอนุมัติรายการได้ กรุณาลองใหม่');
        }
    }
}
