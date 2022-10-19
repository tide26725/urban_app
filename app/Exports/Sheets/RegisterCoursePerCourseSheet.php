<?php

namespace App\Exports\Sheets;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\RegisterCourse;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;

use Maatwebsite\Excel\Concerns\WithColumnWidths;


class RegisterCoursePerCourseSheet implements FromCollection, WithTitle, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{

    private $course_id;
    protected $index = 0;

    public function __construct(int $course_id, string $course_name, $course_start_time, $course_end_time)
    {
        $this->course_id = $course_id;
        $this->course_name = $course_name;
        $this->course_start_time = $course_start_time;
        $this->course_end_time = $course_end_time;
        
        //dd($this->course_id = $course_id);
    }

    public function startCell(): string
    {
        return 'A5';
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 30,
            'C' => 20,
            'D' => 40,
            'E' => 10,
            'F' => 20,

        ];
    }


    public function registerEvents(): array {
        
        return [
            AfterSheet::class => function(AfterSheet $event) {
                /** @var Sheet $sheet */
                $sheet = $event->sheet;

                $sheet->mergeCells('A1:E1');
                $sheet->setCellValue('A1', "แบบลงทะเบียนรับสมัครฝึกอาชีพ “เกษตรในสังคมเมือง”");

                $sheet->mergeCells('A2:E2');
                $sheet->setCellValue('A2', "ในงานวันคล้ายวันสถาปนากรมส่งเสริมการเกษตร ประจำปี 2565 ครบรอบปีที่ 55");

                $sheet->mergeCells('A3:E3');
                $sheet->setCellValue('A3', "ในวันที่ 20 ตุลาคม 2565 ณ อาคาร 7 กรมส่งเสริมการเกษตร");

                $sheet->mergeCells('A4:E4');
                $sheet->setCellValue('A4', 'หลักสูตร ' . $this->course_name . ' เวลา: '. $this->course_start_time.' ถึง '. $this->course_end_time .' น.');
                
                $styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ];
                
                $cellRange = 'A1:E4'; // All headers
                
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray($styleArray);
            },
        ];
    }



    public function headings(): array
    {

        return [
            [
                'แบบลงทะเบียนรับสมัครฝึกอาชีพ “เกษตรในสังคมเมือง”'
            ],
            [
                'ในงานวันคล้ายวันสถาปนากรมส่งเสริมการเกษตร ประจำปี 2565 ครบรอบปีที่ 55'
            ],
            [
                'ในวันที่ 20 ตุลาคม 2565 ณ อาคาร 7 กรมส่งเสริมการเกษตร'
            ],
            [
                'หลักสูตร ' . $this->course_name . ' เวลา: '. $this->course_start_time.' ถึง '. $this->course_end_time .' น.'
            ],
             [
                'ลำดับที่',
                'ชื่อ - นามสกุล',
                'ที่อยู่',
                'หมายเลขโทรศัพท์',
                'ลายมือชื่อ'
             ]
        ];
    }

    public function title(): string
    {
        return 'หลักสูตร ' . $this->course_name;
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('register_courses')
            ->leftjoin('registers', 'register_courses.register_id', 'registers.register_id')
            ->leftjoin('provinces', 'registers.province_id', 'provinces.id')
            ->leftjoin('amphures', 'registers.amphure_id', 'amphures.id')
            ->leftjoin('districts', 'registers.district_id', 'districts.id')
            ->where('register_courses.course_id', $this->course_id)
            ->where('register_courses.is_delete', 0)
            ->where('register_courses.status', 1)
            ->orderBy('register_courses.created_at', 'asc')
            ->select(

                'registers.register_id as register_id',
                'registers.prefix as prefix',
                'registers.firstname as firstname',
                'registers.lastname as lastname',
                'registers.address as address',
                'registers.moo as moo',
                'registers.village as village',
                'registers.soi as soi',
                'registers.road as road',
                'provinces.name_th as province_th',
                'amphures.name_th as amphure_th',
                'districts.name_th as district_th',
                'registers.post_code as post_code',
                'registers.tel_no as tel_no'
            )
            ->get();

            //dd($b);
            
    }

    public function map($data): array
    {
        
        return [
            
            //$data->register_id
            ++$this->index,
            $data->prefix . $data->firstname . ' ' . $data->lastname,
            'บ้านเลขที่ ' . $data->address . ' ' . ($data->moo ? 'หมู่'. $data->moo : '') . ' ' . ($data->village ?  'หมู่บ้าน'.$data->village : '') . ' ' . ($data->soi ? 'ซอย'.$data->soi : '') . ' ' . ($data->road ? 'ถนน'.$data->road : '') . ' ตำบล/แขวง ' . $data->district_th . ' อำเภอ/เขต ' . $data->amphure_th . ' จังหวัด ' . $data->province_th . ' ' . $data->post_code,
            $data->tel_no,
            ''
        ];
        
        
    }
}
