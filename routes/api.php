<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterCourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * จัดการข้อมูลส่วนตัว
 * */
/**แสดงข้อมูลส่วนตัว*/
Route::get('register/show/{tel_no}', [RegisterController::class, 'show']);

/**บันทึกข้อมูลส่วนตัว*/
Route::post('register/store', [RegisterController::class, 'store']);

/**แสดงข้อมูลส่วนตัวเพื่อเตรียมแก้ไข*/
Route::get('register/edit/{register_id}', [RegisterController::class, 'edit']);

/**แก้ไขข้อมูล*/
Route::put('register/update/{register_id}', [RegisterController::class, 'update']);


/**
 * จัดการคอร์สลงทะเบียน
 * */
/**บันทึกคอร์สที่ลงทะเบียน*/
Route::post('register_course/store', [RegisterCourseController::class, 'store']);

/**แสดงข้อมูลหลักสูตรเพื่อเตรียมแก้ไข*/
Route::get('register_course/edit/{register_id}', [RegisterCourseController::class, 'edit']);

/**เปลี่ยนหลักสูตร*/
//Route::put('register_course/update/{register_id?}', [RegisterCourseController::class, 'update']);

/**ยกเลิกหลักสูตรที่ได้ลงทะเบียนไว้*/
Route::put('register_course/destroy/{register_id}/{register_course_id}', [RegisterCourseController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
