<?php

namespace App\Exports;

use App\Models\RegisterCourse;
use App\Models\Course;
use App\Exports\Sheets\RegisterCoursePerCourseSheet;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SingleRegisterCourseExport implements WithMultipleSheets
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    public function __construct(int $course_id)
    {
        $this->course_id = $course_id;
    }
    public function sheets(): array
    {
        $sheets = [];

        $courses = Course::where('course_id', $this->course_id)->get();
        //dd($courses);
        foreach ($courses as $course) {
            $sheets[] = new RegisterCoursePerCourseSheet($course->course_id, $course->course_name, $course->start_time, $course->end_time);
        }

        return $sheets;
    }
}
