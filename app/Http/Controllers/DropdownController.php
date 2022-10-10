<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class DropdownController extends Controller
{
    public function index() {
        return $provinces = Province::all();
    }

    public function fetch_amphure(Request $request) {
        $id = $request->get('select');
        $result = array();
        $query = DB::table('provinces')
                    ->join('amphures','provinces.id','=','amphures.province_id')
                    ->select('amphures.*')
                    ->where('provinces.id',$id)
                    ->get();
                    $output='<option value=""><--เลือกอำเภอ--></option>';
                    foreach ($query as $row){
                        $output.='<option value="'.$row->id.'">'.$row->name_th.'</option>';
                    }
                    echo $output;
    }

    public function fetch_district(Request $request) {
        $id = $request->get('select');
        $result = array();
        $query = DB::table('amphures')
                    ->join('districts','amphures.id','=','districts.amphure_id')
                    ->select('districts.*')
                    ->where('amphures.id',$id)
                    ->get();
                    $output='<option value=""><--เลือกตำบล--></option>';
                    foreach ($query as $row){
                        $output.='<option value="'.$row->id.'">'.$row->name_th.'</option>';

                    }

                    echo $output;
    }

    public function fetch_postcode(Request $request) {
        $id = $request->get('select');
        $result = array();
        $query = DB::table('districts')
                    ->where('districts.id',$id)
                    ->first('zip_code');

                    //$output='<input value="'.$query->zip_code.'"></input>';
                    echo $query->zip_code;
    }
}
