<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\QuestionnaireController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterCourseController;
use App\Models\RegisterCourse;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('index');
})->name('index');


/**แสดงข้อมูลส่วนตัว*/
Route::get('register/index/{tel_no?}', [RegisterController::class, 'index'])->name('register.index');
Route::get('register/show/{register_id}', [RegisterController::class, 'show'])->name('register.show');

/**บันทึกข้อมูลส่วนตัว*/
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');

/**แก้ไขข้อมูลส่วนตัว */
Route::get('register/edit/{register_id}', [RegisterController::class, 'edit'])->name('register.edit');
Route::get('register/update/{register_id}', [RegisterController::class, 'update'])->name('register.update');

/**แบบสอบถาม */
Route::get('questionnaire/show/{register_id}', [QuestionnaireController::class, 'show'])->name('questionnaire.show');
Route::get('questionnaire/update/{register_id}', [QuestionnaireController::class, 'update'])->name('questionnaire.update');


/**จัดการคอร์สลงทะเบียน*/
/**บันทึกคอร์สที่ลงทะเบียน*/
Route::post('register_course/store', [RegisterCourseController::class, 'store'])->name('register_course.store');

/**ยกเลิกหลักสูตรที่ได้ลงทะเบียนไว้*/
Route::get('register_course/destroy/{register_id}/{register_course_id}', [RegisterCourseController::class, 'destroy'])->name('register_course.destroy');


/**
 * Dropdown fetch
 */
Route::post('dropdown/fetch_amphure', [DropdownController::class, 'fetch_amphure'])->name('dropdown.fetch_amphure');
Route::post('dropdown/fetch_district', [DropdownController::class, 'fetch_district'])->name('dropdown.fetch_district');
Route::post('dropdown/fetch_postcode', [DropdownController::class, 'fetch_postcode'])->name('dropdown.fetch_postcode');

Auth::routes();



/**Admin*/
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('course/view/{course_id}', [CourseController::class, 'index'])->name('course.view');

Route::get('verify/confirm/{register_course_id}', [CourseController::class, 'confirm'])->name('verify.confirm');
Route::get('verify/cancel/{register_course_id}', [CourseController::class, 'cancel'])->name('verify.cancel');
