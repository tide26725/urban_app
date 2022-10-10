<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Register;
use App\Models\Course;
use App\Models\RegisterCourse;
use Illuminate\Support\Facades\DB;

class RegisterCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ตอนส่งมาจะส่งมาทีละรายการไหม
        $request->validate([
            'course_id' => 'required',
            'register_id' => 'required',
        ]);

        //ตรวจสอบข้อมูลผู้ลงทะเบียน
        $register_data = Register::where('register_id', $request->register_id)->first();
        if(!$register_data) {
            return abort(403);
        }

        //ข้อมูลคอร์สที่จะลงทะเบียน
        $course = Course::where('course_id', $request->course_id)->first();

        //นับจำนวนผู้ลงทะเบียนคอร์สนั้นๆ
        $count = RegisterCourse::where('course_id', $request->course_id)
            ->where('is_delete', 0)
            ->count();
           
        //ตรวจสอบว่าจำนวนคนลงทะเบียนเกินที่กำหนดหรือไม่
        if ($course->quota_max > $count) {

            $check_register_course = RegisterCourse::where('register_id', $request->register_id)
                ->where('is_delete', 0)
                ->get();

            /**ตรวจสอบว่ามีการลงทะเบียนซ้ำ */
            if ($check_register_course->contains('course_id', $request->course_id)) {

                return redirect()->route('register.show', $register_data->register_id)->with('error','ท่านได้ลงลงทะเบียนหลักสูตรนี้แล้วกรุณาเลือกใหม่');
            }

            /**ตรวจสอบว่ามีการสมัครครบ 2 หลักสูตรแล้วหรือยัง */
            if ($check_register_course->count() >= 2) {
                $response = [
                    'status' => 403,
                    'message' => "ลงทะเบียนครบ 2 หลักสูตรแล้ว!!"
                ];
                return response()->json($response);
            } else {

                /**เช็คว่าหลักสูตรที่จะลงทะเบียนเวลาตรงกับหลักสูตรที่เคยลงไว้ก่อนแล้วหรือไม่ 
                 * contain ปกติถ้าหาเจอจะ return true เลยใส่ ! เพื่อให้เป็น false จะได้นำคำสั่งมาทำใน if ได้
                 */
                if (!($check_register_course->contains('course_group', $course->course_group))) {
                    /**บันทึกการลงทะเบียนหลักสูตร */

                    $check1 = DB::table('register_courses')
                    ->where('register_id', $request->register_id)
                    ->where('is_delete', 0)
                    ->where(function($query) use($course) {
                        $query->where('start_time', $course->start_time)
                            ->orWhere('end_time', $course->end_time);
                    })
                    ->get();

                        
                    if($check1->count() > 0) {
                        $response = [
                            'status' => 403,
                            'message' => "เวลาซ้ำกับหลักสูตรอื่นที่ได้ลงทะเบียนแล้ว",
                        ];
    
                        return redirect()->route('register.show', $register_data->register_id)->with('error','เวลาซ้ำกับหลักสูตรอื่นที่ได้ลงทะเบียนแล้ว');
                    }

                    $data = [
                        'course_id' => $course->course_id,
                        'register_id' => $request->register_id,
                        'course_name' => $course->course_name,
                        'start_time' => $course->start_time,
                        'end_time' => $course->end_time,
                        'course_group' => $course->course_group,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ];

                    $register_course = RegisterCourse::create($data);

                    return redirect()->route('register.show', $register_data->register_id)->with('success','บันทึกข้อมูลเรียบร้อย');
                }

                return redirect()->route('register.show', $register_data->register_id)->with('error','เวลาซ้ำกับหลักสูตรอื่นที่ได้ลงทะเบียนแล้ว');
            }
        } else {

            return redirect()->route('register.show', $register_data->register_id)->with('error','หลักสูตรมีผู้ลงทะเบียนครบจำนวนแล้ว!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $register_id
     * @return \Illuminate\Http\Response
     */
    public function edit($register_id)
    /**รอสรุปวิธีการแก้ไข */
    {
        $register_course = RegisterCourse::where('register_id', $register_id)
            ->where('is_delete', 0)
            ->get();

        if (count($register_course)) {
            $response = [
                'status' => 200,
                'message' => "ค้นหาข้อมูลสำเร็จ",
                'register' => $register_course
            ];

            return response()->json($response);
        } else {
            $response = [
                'status' => 404,
                'message' => "ไม่พบข้อมูล"
            ];

            return response()->json($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $course = Course::where('course_id', $request->course_id)->first();

        // $data = [
        //     'course_id' => $course->course_id,
        //     'register_id' => $course->register_id,
        //     'course_name' => $course->course_name,
        //     'course_schedule' => $course->course_schedule,
        //     'course_group' => $course->course_group,
        //     'updated_at' => Carbon::now()
        // ];

        // $register_course = RegisterCourse::where('register_course_id',$request->register_id)->update($data);

        // if($register_course) {
        //     $response = [
        //         'status' => "200",
        //         'message' => "Data Updated"
        //     ];
        //     return response()->json($response, 200);
        // } else {
        //     $response = [
        //         'status' => "404",
        //         'message' => "Data Not Found"
        //     ];
        //     return response()->json($response, 404);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $register_course_id
     * @param  int  $register_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($register_id, $register_course_id)
    {
        $register_data = Register::where('register_id', $register_id)->first();
        if(!$register_data) {
            return abort(403);
        }
        $destroy = RegisterCourse::where('register_course_id', $register_course_id)
            ->where('register_id', $register_id)
            ->update([
                'is_delete' => 1,
                'deleted_by' => $register_id,
                'deleted_datetime' => Carbon::now()
            ]);

        if ($destroy) {
            return redirect()->route('register.show', $register_data->register_id)->with('success','ยกเลิกรายการสำเร็จ');
        } else {

            return redirect()->route('register.show', $register_data->register_id)->with('error','ไม่พบการลงทะเบียนหลังสูตรนี้');
        }
    }
}
