<?php

namespace App\Http\Controllers;

use App\Exports\RegisterCourseExport;
use App\Exports\SingleRegisterCourseExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class RegisterCourseExportController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function export()
    {
        return Excel::download(new RegisterCourseExport, 'register_course.xlsx');
        //return (new RegisterCourseExport())->download('register_course.xlsx');
        //return (new RegisterCourseExport())->download('register_course.pdf', \Maatwebsite\Excel\Excel::TCPDF);
        //return Excel::download(new RegisterCourseExport, 'register_course.pdf');
    }

    public function exportSingleCourse($course_id)
    {
        // $export = New RegisterCourseExport();
        // $get_export = $export->getSingleRegisterCourse($course_id);
        // $download = $get_export->download('register_single_course.xlsx');
return (new SingleRegisterCourseExport($course_id))->download('register_single_course.xlsx');
        //return (new RegisterCourseExport())->getSingleRegisterCourse($course_id)->download('register_single_course.xlsx');
        //return dd((new RegisterCourseExport())->getSingleRegisterCourse($course_id));
        //return Excel::download((new RegisterCourseExport)->getSingleRegisterCourse($course_id), 'register_single_course.xlsx');


    }
}
