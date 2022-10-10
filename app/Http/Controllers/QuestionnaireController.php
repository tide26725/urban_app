<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Illuminate\Support\Carbon;

class QuestionnaireController extends Controller
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
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $tel_no
     * @return \Illuminate\Http\Response
     */
    public function show($register_id)
    {
        $register = Register::where('register_id', $register_id)->select('register_id','tel_no')->first();

        if($register){
            return view('questionnaire', compact('register'));
        } else {
            return view('index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        
        $request->validate([
            'residence_mst_id' => 'required',
            'farmland_mst_id' => 'required',
            'education_lv_mst_id' => 'required',
            'career_mst_id' => 'required',
            'income_mst_id' => 'required',
            'reason_mst_id' => 'required',
        ]);


        $data = [
            'residence_mst_id' => $request->residence_mst_id,
            'farmland_mst_id' => $request->farmland_mst_id,
            'education_lv_mst_id' => $request->education_lv_mst_id,
            'career_mst_id' => $request->career_mst_id,
            'income_mst_id' => $request->income_mst_id,
            'reason_mst_id' => $request->reason_mst_id,
            'updated_at' => Carbon::now()
        ];

        
        Register::where('register_id', $request->register_id)
                            ->update($data);

        return redirect()->route('register.show', $request->register_id); 
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
