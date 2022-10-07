<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Register;
use App\Models\RegisterCourse;

class RegisterController extends Controller
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

        $request->validate([
            'prefix' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'district_id' => 'required',
            'amphure_id' => 'required',
            'province_id' => 'required',
            'post_code' => 'required',
            'tel_no' => 'required|unique:registers',
            'email' => 'required',
            'age' => 'required',
            'residence_mst_id' => 'required',
            'farmland_mst_id' => 'required',
            'education_lv_mst_id' => 'required',
            'career_mst_id' => 'required',
            'income_mst_id' => 'required',
            'reason_mst_id' => 'required',
        ]);

        
        $data = [
                'prefix' => $request->prefix,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'district_id' => $request->district_id,
                'amphure_id' => $request->amphure_id,
                'province_id' => $request->province_id,
                'post_code' => $request->post_code,
                'tel_no' => $request->tel_no,
                'email' => $request->email,
                'age' => $request->age,
                'residence_mst_id' => $request->residence_mst_id,
                'farmland_mst_id' => $request->farmland_mst_id,
                'education_lv_mst_id' => $request->education_lv_mst_id,
                'career_mst_id' => $request->career_mst_id,
                'income_mst_id' => $request->income_mst_id,
                'reason_mst_id' => $request->reason_mst_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
        ];


        $register = Register::create($data);

        $response = [
            "status" => "201",
            "message" => "บันทึกข้อมูลสำเร็จ",
            'register_id' => $register->register_id
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  @param  int  $tel_no
     * @return \Illuminate\Http\Response
     */
    public function show($tel_no)
    {
        if(!$tel_no){
            $response = [
                'status' => 404,
                'message' => 'ไม่พบข้อมูล'
            ];
            return response()->json($response);
        }

        $register = Register::where('tel_no' , $tel_no)->first();

        if(!$register){
            $response = [
                'status' => 404,
                'message' => 'ไม่พบข้อมูล'
            ];
            return response()->json($response);
        }

        $register_course = RegisterCourse::where('register_id' , $register->register_id)
                                        ->where('is_delete', 0)
                                        ->get();

        if($register){

            $response = [                
                'status' => 200,
                'message' => "ค้นหาข้อมูลสำเร็จ",
                'register' => $register,
                'register_course' => $register_course,
            ];

            return response()->json($response);
            
        } else {
            $response = [
                'status' => 404,
                'message' => 'ไม่พบข้อมูล'
            ];
            return response()->json($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
    * @param  int  $register_id
     * @return \Illuminate\Http\Response
     * 
     */
    public function edit($register_id)
    {
        $register = Register::where('register_id', $register_id)->first();
        
        if($register) {
            $response = [
                'status' => 200,
                'message' => "ค้นหาข้อมูลสำเร็จ",
                'register' => $register
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
     * @param  int  $register_id
     * @return \Illuminate\Http\Response
     */
    public function update($register_id, Request $request)
    {
        $data = [
            'prefix' => $request->prefix,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'district_id' => $request->district_id,
            'amphure_id' => $request->amphure_id,
            'province_id' => $request->province_id,
            'post_code' => $request->post_code,
            'tel_no' => $request->tel_no,
            'email' => $request->email,
            'age' => $request->age,
            'residence_mst_id' => $request->residence_mst_id,
            'farmland_mst_id' => $request->farmland_mst_id,
            'education_lv_mst_id' => $request->education_lv_mst_id,
            'career_mst_id' => $request->career_mst_id,
            'income_mst_id' => $request->income_mst_id,
            'reason_mst_id' => $request->reason_mst_id,
            'updated_at' => Carbon::now()
        ];

        $register = Register::where('register_id', $register_id)->update($data);

        if($register) {
            $response = [
                'status' => 200,
                'message' => "ปรับปรุงข้อมูลสำเร็จ"
            ];
            return response()->json($response);
        }

        $response = [
            'status' => 404,
            'message' => "ไม่พบข้อมูล"
        ];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
