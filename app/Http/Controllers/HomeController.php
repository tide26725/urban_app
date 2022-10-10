<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $getAllUser = Register::all()->count();
        $courses = Course::all();

        $count_course = $courses->count();


        return view('home', compact('getAllUser','courses','count_course'));
    }


    
}
