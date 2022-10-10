@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h2 class="card-title lh-sm">ลงทะเบียนสมัครการอบรมฝึกอาชีพ “เกษตรในสังคมเมือง” ในงานวันที่ระลึกคล้ายวันสถาปนากรมส่งเสริมการเกษตร ประจำปี 2565 ครบรอบปีที่ 55</h2>
        </div>
    </div>
    @if(session("success"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session("error"))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{session('error')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card border-0 shadow-sm mt-3">
        <div class="card-header fs-5 fw-semibold">
            <label for="">ข้อมูลส่วนตัว</label>
            <a href="{{ route('register.edit', $register->register_id) }}" class="btn btn-dark"><i class="fa-solid fa-user-pen"></i> แก้ไข</a>
        </div>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label fs-5 fw-semibold">ชื่อ - นามสกุล :</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext fs-5">{{ $register->prefix }}{{ $register->firstname }} {{ $register->lastname }}</p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label fs-5 fw-semibold">ที่อยู่ปัจจุบัน :</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext fs-5">
                        บ้านเลขที่ {{ $register->address }}
                        {{ $register->moo ? 'หมู่ที่.'.$register->moo : 'หมู่ที่.- ' }}
                        {{ $register->village ? 'หมู่บ้าน.'.$register->village : 'หมู่บ้าน.- '}}
                        {{ $register->soi ? 'ซอย.'.$register->soi : 'ซอย.- '}}
                        {{ $register->road ? 'ถนน.'.$register->road : 'ถนน.- ' }}
                        ต.{{ $register->district_name }}
                        อ.{{ $register->amphure_name }}
                        จ.{{ $register->province_name }} {{ $register->zip_code }}
                    </p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label fs-5 fw-semibold">หมายเลขโทรศัพท์มือถือ :</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext fs-5">{{ $register->tel_no }}</p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label fs-5 fw-semibold">อีเมล :</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext fs-5">{{ $register->email }}</p>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="" class="col-sm-2 col-form-label fs-5 fw-semibold">อายุ :</label>
                <div class="col-sm-10 d-flex">
                    <p class="form-control-plaintext fs-5">{{ $register->age }} ปี</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 p-3 my-3">
        <div class="row">
            @if($count < 2) <div class="d-flex justify-content-center my-3">
                <button type="submit" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@getbootstrap">เลือกหลักสูตร</button>
        </div>

        <div class="modal fade" id="exampleModal1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">เลือกหลักสูตรที่ต้องการลงทะเบียน</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <strong class="text-primary m-1">ขอให้ท่านเดินทางมาถึงสถานที่การอบรมฝึกอาชีพ<br>ก่อนเวลาเข้ารับการอบรม 15 นาที</strong>

                        <form action="{{ route('register_course.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <select class="form-control  fs-5" name="course_id" required>
                                    <option value="">กรุณาเลือกหลักสูตร</option>
                                    <option value="" disabled>------รอบเช้า (09.30-12.00น.)------</option>
                                    <option value="1">การปลูกผักคนเมือง</option>
                                    <option value="" disabled>------รอบเช้า (09.30-10.30น.)------</option>
                                    <option value="2">การเพาะต้นอ่อนผักงอกสำหรับคนเมือง </option>
                                    <option value="3">น้ำเต้าหู้ทรงเครื่อง </option>
                                    <option value="4">การเพาะเห็ดฟางในตะกร้า </option>
                                    <option value="" disabled>------รอบเช้า (10.45-12.00น.)------</option>
                                    <option value="5">การเพาะต้นอ่อนผักงอกสำหรับคนเมือง</option>
                                    <option value="6">น้ำเต้าหู้ทรงเครื่อง</option>
                                    <option value="7">การเพาะเห็ดฟางในตะกร้า</option>
                                    <option value="" disabled>------รอบบ่าย (13.30-16.00 น.)------</option>
                                    <option value="8">การปลูกผักคนเมือง</option>
                                    <option value="" disabled>------รอบบ่าย (13.30-14.30 น.)------</option>
                                    <option value="9">การเพาะต้นอ่อนผักงอกสำหรับคนเมือง</option>
                                    <option value="10">ก๋วยเตี๋ยวลุยสวนจากผักงอก</option>
                                    <option value="11">การเพาะเห็ดฟางในตะกร้า</option>
                                    <option value="" disabled>------รอบบ่าย(14.45-16.00น.)------</option>
                                    <option value="12">การเพาะต้นอ่อนผักงอกสำหรับคนเมือง</option>
                                    <option value="13">ก๋วยเตี๋ยวลุยสวนจากผักงอก</option>
                                    <option value="14">การเพาะเห็ดฟางในตะกร้า</option>
                                </select>
                                <input type="hidden" name="register_id" value="{{ $register->register_id }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> ปิด</button>

                                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-check"></i> ยืนยัน</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        @endif
        @if(count($register_course) == 0)
        <div class="card-body text-center">
            <h5>กดปุ่ม เลือกหลักสูตร เพื่อทำการลงทะเบียนหลักสูตรที่ต้องเข้าร่วม โดยสามารถเข้าร่วมได้สูงสุดไม่เกิน 2 หลักสูตร</h5>
        </div>
        @else

        @foreach($register_course as $course)
        <p>หมายเหตุ **ขอให้ท่านเดินทางมาถึงสถานที่การอบรมฝึกอาชีพ ก่อนเวลาเข้ารับการอบรม 15 นาที**</p>
        <div class="col-md-6">
            <div class="card shadow border-0 m-1">
                <div class="card-body">
                    <h5>หลักสูตร</h5>
                    <h3>{{$course->course_name}}</h3>
                    <p>วันที่ 20 ตุลาคม 2565</p>
                    <p>เวลาเรียน : {{$course->start_time}} - {{$course->end_time}} น.</p>
                    <p>สถานะ :
                        @if($course->status == 0)
                        <span class="badge text-bg-secondary">รอการติดต่อจากเจ้าหน้าที่</span>
                        @elseif($course->status == 1)
                        <span class="badge text-bg-success">ตอบรับการเข้าร่วม</span>
                        @elseif($course->status == 2)
                        <span class="badge text-bg-danger">ผู้ลงทะเบียนปฏิเสธการเข้าร่วม</span>
                        @endif
                    </p>
                    @if($course->status == 0)

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $course->register_course_id }}">
                        <i class="fa-solid fa-xmark"></i> เปลี่ยน
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal2{{ $course->register_course_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">ต้องการยกเลิกหลักสูตรใช่หรือไม่</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('register_course.destroy', [$register->register_id, $course->register_course_id]) }}" class="btn btn-primary">ยืนยัน</a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @endforeach

        @endif

    </div>
</div>

<script>




</script>


@endsection