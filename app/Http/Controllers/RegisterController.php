<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Register;
use App\Models\RegisterCourse;
use Illuminate\Support\Facades\DB;
use App\Models\Amphure;
use App\Models\District;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->tel_no) {

            return view('index');
        }

        $register = Register::where('tel_no', $request->tel_no)->first();

        if($register){
            return redirect()->route('register.show', $register->register_id);
        } else {

            $dropdown = new DropdownController;
            $provinces = $dropdown->index();

            return view('register_form', compact('register','provinces'));
        }
        
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
            // 'moo' => 'required',
            // 'village' => 'required',
            // 'soi' => 'required',
            // 'road' => 'required',
            'district_id' => 'required',
            'amphure_id' => 'required',
            'province_id' => 'required',
            'post_code' => 'required',
            'tel_no' => 'required|unique:registers',
            'tel_no_confirm' => 'required|same:tel_no',
            // 'email' => 'required',
            'age' => 'required',
        ]);


        $data = [
            'prefix' => $request->prefix,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'moo' => $request->moo,
            'village' => $request->village,
            'soi' => $request->soi,
            'road' => $request->road,
            'district_id' => $request->district_id,
            'amphure_id' => $request->amphure_id,
            'province_id' => $request->province_id,
            'post_code' => $request->post_code,
            'tel_no' => $request->tel_no,
            'email' => $request->email,
            'age' => $request->age,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        // dd($data);
        $register = Register::create($data);
        
        //return view('questionnaire', compact('register'));
        return redirect()->route('questionnaire.show', $register->register_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  @param  int  $tel_no
     * @return \Illuminate\Http\Response
     */
    public function show($register_id)
    {
        // if (!$request->tel_no) {

        //     return view('index');
        // }
        
        $register = DB::table('registers')
            ->where('register_id', $register_id)
            ->leftjoin('provinces', 'registers.province_id', 'provinces.id')
            ->leftjoin('amphures', 'registers.amphure_id', 'amphures.id')
            ->leftjoin('districts', 'registers.district_id', 'districts.id')
            ->select('registers.*','provinces.name_th as province_name','amphures.name_th as amphure_name','districts.name_th as district_name','districts.zip_code')
            ->first();

        if (!$register) {
            //dd($request->tel_no);
            return view('index');
        }

        $register_course = RegisterCourse::where('register_id', $register->register_id)
            ->where('is_delete', 0)
            ->get();


        $count = $register_course->count();
        if ($register) {

            if($register->residence_mst_id == null){
                
                return view('questionnaire', compact('register'));
            }

            return view('register_show', compact('register', 'register_course', 'count'));
        } else {
            return view('index');
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

        if ($register) {

            $provinces = Province::all();
            $amphures = Amphure::where('province_id', $register->province_id)->get();
            $districts = District::where('amphure_id', $register->amphure_id)->get();

            return view('register_edit', compact('register','provinces','amphures','districts'));
        } else {
            $response = [
                'status' => 404,
                'message' => "ไม่พบข้อมูล"
            ];

            return view('index');
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
        if(!$register_id){
            return view('index');
        }

        $request->validate([
            'prefix' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            // 'moo' => 'required',
            // 'village' => 'required',
            // 'soi' => 'required',
            // 'road' => 'required',
            'district_id' => 'required',
            'amphure_id' => 'required',
            'province_id' => 'required',
            'post_code' => 'required',
            'age' => 'required',
        ]);

        $data = [
            'prefix' => $request->prefix,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'moo' => $request->moo,
            'village' => $request->village,
            'soi' => $request->soi,
            'road' => $request->road,
            'district_id' => $request->district_id,
            'amphure_id' => $request->amphure_id,
            'province_id' => $request->province_id,
            'post_code' => $request->post_code,
            'email' => $request->email,
            'age' => $request->age,
            'updated_at' => Carbon::now()
        ];

        $register = Register::where('register_id', $register_id)->update($data);

        if ($register) {
            $response = [
                'status' => 200,
                'message' => "ปรับปรุงข้อมูลสำเร็จ"
            ];
            return redirect()->route('register.edit', $register_id)->with('success','ปรับปรุงข้อมูสำเร็จ');
        }

        $response = [
            'status' => 404,
            'message' => "ไม่พบข้อมูล"
        ];
        return redirect()->route('register.show', $register_id)->with('error','เกิดข้อผิดพลาดในการปรับปรุงข้อมูลส่วนตัว กรุณาลองใหม่');
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
